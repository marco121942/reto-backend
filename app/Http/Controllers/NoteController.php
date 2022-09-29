<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\NotificationNote;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Image;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    private function ImageUpload($image, $path = 'images/upload/')
    {

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = $path;
        $image_url = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        return $image_url;
    }


    public function addNote(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'group_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'images' => 'sometimes|array'
        ]);

        $valdiateUser = User::find($request->user_id);
        if (!$valdiateUser) {
            return response()->json([
                'success' => false,
                'message' => 'No existe el usuario ingresado',
                'data' => null
            ], 400);
        }
        $dataGroup = Group::find($request->group_id);
        if (!$dataGroup) {
            return response()->json([
                'success' => false,
                'message' => 'No existe el grupo',
                'data' => null
            ], 400);
        }

        $userJoinGroup = GroupUser::where('user_id', $request->user_id)->where('group_id', $request->group_id)->first();


        if (!$userJoinGroup) {
            return response()->json([
                'success' => false,
                'message' => 'No es parte del grupo',
                'data' => null
            ], 400);
        }
        try {
            $dataNote = Note::create([
                'user_id' => $request->user_id,
                'group_id' => $request->group_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $collectImage = [];
            if ($request->images && is_array($request->images)) {
                foreach ($request->images as $image) {

                    $urlImage =  $this->ImageUpload($image);
                    $dataImage = Image::create([
                        'note_id' => $dataNote->id,
                        'url' => $urlImage,
                    ]);
                    array_push($collectImage, $dataImage);
                }
            }
            $dataUserGroup = Group::where('id', $request->group_id)->with('users')->first();

            $dataUser = User::find($request->user_id);

            $emailUser = [];
            foreach ($dataUserGroup->users as $data) {
                array_push($emailUser, $data->email);
            }

            SendEmail::dispatch($emailUser, $dataNote, $dataUser, $dataUserGroup, count($collectImage));

            return response()->json([
                'success' => true,
                'message' => 'Acabas de registrar una Nota,se notificara a los miembros del grupo',
                'data' => $dataNote,
                'img' => $collectImage
            ], 200);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                'success' => false,
                'message' => 'Lo sentimos ha ocurrido un error',
                'data' => null
            ], 500);
        }
    }

    public function filterNote(Request $request)
    {

        $dateInitial = Carbon::now()->startOfDay();
        if ($request->query('date_initial')) {
            $dateInitial =  Carbon::createFromFormat('Y-m-d', $request->query('date_initial'))->startOfDay();
        }
        $dateFinal = Carbon::now()->endOfDay();
        if ($request->query('date_final')) {
            $dateFinal = Carbon::createFromFormat('Y-m-d', $request->query('date_final'))->endOfDay();
        }

        $hasImage = $request->query('has_image');

        $query = Note::query();
        $query->whereBetween('created_at', [$dateInitial, $dateFinal]);

        if ($hasImage == '1') {
            $query->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('images')
                    ->whereColumn('images.note_id', 'notes.id');
            })->with('images');
        }
        $result = $query->get();




        return response()->json([
            'success' => true,
            'message' => 'Resultados del filtrado',
            'data' =>  $result
        ], 200);
    }
}

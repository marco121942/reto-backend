<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroup()
    {
        $dataGroup = Group::all();

        return response()->json([
            'success' => true,
            'message' => 'Grupos que Exiten',
            'data' => $dataGroup
        ], 200);
    }

    public function addUserGroup(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'group_id' => 'required',
        ]);

        $dataGroup = Group::find($request->group_id);
        if (!$dataGroup) {
            return response()->json([
                'success' => false,
                'message' => 'No existe el grupo',
                'data' => null
            ], 400);
        }

        try {
            $dataGroup->users()->sync([$request->user_id]);
            return response()->json([
                'success' => true,
                'message' => 'Te acabas de unir al grupo',
                'data' => $dataGroup
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Lo sentimos ha ocurrido un error',
                'data' => null
            ], 500);
        }
    }
}

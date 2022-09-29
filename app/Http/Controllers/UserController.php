<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {


        try {
            $dataUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Te registraste con éxito, ahora puedes iniciar sesión:',
                'data' => $dataUser
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Lo sentimos ha ocurrido un error',
                'data' => null
            ], 500);
        }
    }
    public function login(loginRequest $request)
    {

        $dataUser = User::where('email', $request->email)->first();

        if (!$dataUser) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas',
                'data' => null
            ], 400);
        }

        if (!Hash::check($request->password, $dataUser->password)) {

            return
                response()->json([
                    'success' => false,
                    'message' => 'Credenciales incorrectas',
                    'data' => null
                ], 400);
        }

        return
            response()->json([
                'success' => true,
                'message' => 'Bienvenido, Acabas de iniciar sesión.',
             'data' => $dataUser
            ], 200);
    }

    public function perfil(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
        ]);
        $dataUser = User::where('id', $request->user_id)->with('groups')->first();

        return
            response()->json([
                'success' => true,
                'message' => 'Tu perfil:',
                'data' => $dataUser
            ], 200);
    }
}

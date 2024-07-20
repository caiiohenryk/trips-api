<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() : JsonResponse {
        $users = User::orderBy("id","DESC")->paginate(10);
        return response()->json([
            'status' => true,
            'users' => $users, ]
            , 200);
    }

    public function show(User $user) : JsonResponse {
        return response()->json([
            'status' => true,
            'users' => $user, ]
            , 200);
    }

    public function store(UserRequest $request) : JsonResponse {
    DB::beginTransaction();
    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request -> password)
            ]);

        DB::commit();

        return response()->json([
            'status' => true,
            'user' => $user,
            'message' => "Usuário cadastrado com sucesso!"
            ], 201);
    } catch(Exception $e) {
        DB::rollBack();
        return response()->json([
            'status' => false,
            'message' => "Erro ao inserir usuário no banco de dados"
            ], 400);
        
    }
    }
    
    public function update(UserRequest $request, User $user) : JsonResponse {

        // Iniciar a transação
        DB::beginTransaction();
        try {
            // Editar o usuário no banco de dados
            $user->update([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request -> password)
            ]);
            DB::commit();

            return response()->json([
                'status'=> true,
                'user'=> $user,
                'message'=> 'Usuário editado com sucesso.'
            ], 200);

            } catch(Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => "Usuário não foi editado."
                ], 400);
        }
    }

    public function destroy(User $user) : JsonResponse {
        DB::beginTransaction();
        try {
            $user->delete();
        } catch(Exception $e) {
            return response()->json([
                "status"=> true,
                "message"=> "Usuário não foi deletado."
            ], 400);
        }
        
        DB::commit();
        return response()->json([
            "status"=> true,
            "message"=> "Usuário deletado com sucesso."
        ], 200);
    }

}

    

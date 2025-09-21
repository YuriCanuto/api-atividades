<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Validators\Autenticacao\CadastroUsuarioValidator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CadastrarUsuarioController extends Controller
{
    public function __invoke(
        Request $request
    ) {

        app(CadastroUsuarioValidator::class)->validated($request->input());

        try {

            $user = User::create([
                'name' => Arr::get($request, 'name'),
                'email' => Arr::get($request, 'email'),
                'password' => bcrypt(Arr::get($request, 'password')),
            ]);

            $return = [
                'access_token' => $user->createToken('API')->plainTextToken,
            ];

            return response()->json([
                'success' => true,
                'mensagem' => "Usuário cadastrado com sucesso", 
                'data' => $return
            ], Response::HTTP_CREATED);

        } catch (\Throwable $e) {
            Log::error(__CLASS__, ['mensagem' => $e->getMessage()]);

            return response()->json(['success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

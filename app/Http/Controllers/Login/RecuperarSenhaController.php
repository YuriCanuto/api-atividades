<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Validators\Autenticacao\RecuperarSenhaValidator;
use App\Mail\ResetPasswordMail;
use App\Models\RecuperarSenha;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RecuperarSenhaController extends Controller
{
    public function __invoke(
        Request $request
    ) {

        try {

            app(RecuperarSenhaValidator::class)->validate($request->input());

            RecuperarSenha::where('email', $request->email)->delete();

            $token = Str::random(64);

            RecuperarSenha::create([
                'email'      => $request->email,
                'token'      => Hash::make($token),
                'created_at' => now(),
            ]);

            // Envia o email com o token
            // Em produção, dispare um Mailable ou Notification aqui
            Mail::to($request->email)->send(
                new ResetPasswordMail($token, $request->email)
            );

            return response()->json([
                'message' => 'Link de recuperação enviado para o e-mail.',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error(__CLASS__, $e->errors());
            return response()->json($e->errors(), Response::HTTP_NOT_FOUND);
        } catch (\Throwable $e) {
            Log::error(__CLASS__, ['mensagem' => $e->getMessage()]);
            return response()->json(['success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

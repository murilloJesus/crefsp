<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Mail\RecuperarSenha;

class RecuperarSenhaController extends Controller
{
    public function submit(Request $request)
    {
        $email = $this->checkEmail($request->get('email'));

        if ($email) {
            return $this->token($email);
        }
        return redirect('admin/login')->with('naoExiste', 'Email não encontrado!');
    }

    private function checkEmail($email)
    {
        return User::where('email', '=', $email)->get()->first();
    }

    private function token($email)
    {

        $token = md5($email->email);

        $update = User::where('email', '=', $email->email)->update(['token' => $token]);
        $user = $this->checkEmail($email->email);
        return $this->EnviaEmail($user);
    }

    private function EnviaEmail($user)
    {
        $email = $user->email;
        $token = $user->token;

        Mail::to($email)->send(new RecuperarSenha($token, $email));
        return redirect('admin/login')->with('passwordReset', 'Link para alteração de senha foi enviado para o email informado!');
    }

    public function novaSenha(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);
        
        $email = $this->checkEmail($request->get('email'));
        User::where('id', $email->id)->update(
                    [
                        'password' => Hash::make($request->get('password')),
                        'token' => ''
                    ]);

        return redirect('admin/login')->with('passwordUpdated', 'Sua senha foi atualizada com sucesso!');
    }

    public function checkUserByToken($token)
    {
        $email = User::where('token', $token)->get()->first();

        if ($email) {
            return view('auth.nova-senha')->with('email', $email);
        }

        return redirect('admin/login')->with('erro', 'A requisição para alterar senha já foi atendida!');
    }
}

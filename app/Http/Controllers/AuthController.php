<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function toHome()
    {
        return redirect('admin');
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        $email = $request->get('email');
        $userCount = User::where('email', $email)->count();
    
        if ($userCount>0) {
            // TODO
            return ['status' => '400','user' => 'exists'];
        }
        
        $password = $request->get('password');
        $hashed_password = Hash::make($password);

        $insert = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permissoes' => $request->get('permissoes'),
            'password' => $hashed_password
        ];

        User::create($insert);
        
        return ['status' => '200'];
    }

    public function show($id)
    {
        return User::where('id', $id)->get()->first();
    }

    public function update(Request $request)
    {

        $email = $request->get('email');
        $user_email = User::where('email', $email)->get()->first();

        $id = $request->get('id');
        $user_id = User::where('id', $id)->get()->first();

        if ($user_id->email == $user_email->email) {
            
            $update = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'permissoes' => $request->get('permissoes')
            ];
            $user_id->update($update);

            return ['status' => '200'];
        }
        return ['status' => '404'];
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->get()->first();
        if ($user) {
            $user->delete();
            return ['status' => '200'];
        }
        return ['status' => '404'];
    }

    public function login(Request $request)
    {
        // session()->flush();      
        $input = $request->all();
        $user = User::where('email', '=', $input['email'])->first();
        if (is_null($user) || $user->count() == 0) {
            return redirect('admin/login')->with('naoExiste', 'Email não cadastrado');
        }
        if (Hash::check($input['password'], $user->password)) {
            // $request->session(['logged_user' => $user->email]);
            $request->session()->put('logged_user', $user->email);
            $request->session()->put('permissoes', $user->_permissoes);
            $request->session()->put('nome', $user->name);
            $request->session()->put('last_loggin', $user->updated_at);

            // dd($request->session()->get('logged_user'));
            // dd($request->session()->get('logged_user'));
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect('admin');
        } 

        return redirect('admin/login')->with('loginIncorreto', 'Email ou senha incorretos!');
    }
    
    public function mudarSenha()
    {
        $usuario = User::where('email', session('logged_user'))->get()->first();

        if ($usuario) {
            return view('auth.nova-senha')->with('email', $usuario);
        }

        return redirect('admin/login')->with('erro', 'Você não tem permissão para realizar essa ação!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('admin/login');
    }
}

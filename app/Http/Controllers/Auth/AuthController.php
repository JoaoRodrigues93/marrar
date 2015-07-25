<?php namespace App\Http\Controllers\Auth;

use App\Estudante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{


    public function post(Request $request)
    {

        if ($request->has('opLogin')) {
            return $this->login($request);
        } elseif ($request->has('opRegisto')) {

            return $this->registar($request);
        }

    }

    public function login(Request $request)
    {
        $email = $request->input('login-email');
        $password = $request->input('login-password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }

    }

    public function registar(Request $request)
    {
        $nome = $request->input('nome');
        $apelido = $request->input('apelido');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = Hash::make($password);
        $estudante = new Estudante();

        $estudante->nome = $nome;
        $estudante->apelido = $apelido;
        $estudante->username = $username;
        $estudante->email = $email;
        $estudante->password = $password;
        $estudante->save();

        return "<h1>$estudante->nome foste registado com sucesso!</h1>" .
        "<h2>Clique <a href='/login'>Aqui</a> para voltar</h2>";
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // $user->token;
    }
}

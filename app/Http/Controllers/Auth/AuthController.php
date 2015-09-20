<?php namespace App\Http\Controllers\Auth;

use App\Estudante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function logout (){
        Auth::logout();
        return redirect('/');
    }

    public function post(Request $request)
    {

        if ($request->has('opLogin')) {
            return $this->authenticate($request);
        } elseif ($request->has('opRegisto')) {

            return $this->registar($request);
        }

    }

    public function loginValido(Request $request){

    }

    public function authenticate(Request $request)
    {
        $email = $request->input('login-email');
        $password = $request->input('login-password');
        if (Auth::attempt(['email' => $email, 'password' => $password],true) ||

            Auth::attempt(['username'=>$email,'password'=>$password],true)) {
            // Authentication passed...
            return redirect()->intended('/home');
        }

       else {
           $error =true;
           $mensagem = "Os dados fornecidos para Login não conferem";
           
           if($request->has('mobile'))
           return view('inicio', ['errorMobile' => $error, "mensagem" => $mensagem]);
           else    
           return view('inicio', ['error' => $error, "mensagem" => $mensagem]);
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

        Auth::login($estudante,true);
        return redirect('/home');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $userData = Socialite::driver($provider)->user();

        if($provider=="facebook"){
            return $this->loginFacebook($userData);
        }
        elseif ($provider=="google"){
            return $this->loginGoogle($userData);
        }
    }

    public function loginFacebook($userData){
        $user = $userData->user;
        $nome = $user['first_name'];
        $apelido = $user['last_name'];

        $sexo = $user['gender'];
        $sexo = ($sexo=='male')? "Masculino": "Femenino";
        $username = $userData->id;
        $foto = $userData->avatar;

        $estudante = Estudante::firstOrCreate(['nome'=>$nome,'apelido'=>$apelido,
            'sexo'=>$sexo,'username'=>$username,'foto'=>$foto]);
        Auth::login($estudante,true);
        return redirect('/home');
    }

    public function loginGoogle ($userData){
        $user = $userData->user;
        $name = $user['name'];
        $nome = $name['givenName'];
        $apelido = $name['familyName'];

        $sexo = $user['gender'];
        $sexo = ($sexo=='male')? "Masculino": "Femenino";
        $email = $userData->email;
        //Ver isto Mais tarde...
        $username = $userData->id;
        $foto = $userData->avatar;
        $estudante = Estudante::firstOrCreate(['nome'=>$nome,'apelido'=>$apelido,
            'sexo'=>$sexo,'username'=>$username,'foto'=>$foto]);
        Auth::login($estudante,true);
        return redirect('/home');
    }
}

<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Estudante;

class LoginController extends Controller {


	public function registar(Request $request)
	{
		$nome = $request->input('nome');
        $apelido = $request->input('apelido');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = md5($password);

        $estudante = new Estudante();

        $estudante->nome = $nome;
        $estudante->apelido = $apelido;
        $estudante->username = $username;
        $estudante->email = $email;
        $estudante->password = $password;
        $estudante->save();

        return "<h1>$estudante->nome foste registado com sucesso!</h1>".
        "<h2>Clique <a href='/login'>Aqui</a> para voltar</h2>";
	}

    public function entrar (Request $request){
        $username = $request->input('login-username');
        $password = $request->input('login-password');

    }
}

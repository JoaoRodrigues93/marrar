<?php namespace App\Http\Controllers;

use App\Estudante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller {

    public function buscarPerfil($id) {
        $perfil = Estudante::find($id);
        return view('perfileditar')->with(array('perfil'=>$perfil));

    }

    public function EditarPerfil(Request $request){

        $id= $request->input('id');
        $perfil = Estudante::find($id);
        $perfil -> username = $request -> input('nome-do-utilizador');
        $perfil-> dataNascimento = $request -> input('date');
        $perfil -> nome  = $request -> input('nome-completo');
        $perfil -> telefone  = $request -> input('telefone');
        $perfil -> email  = $request -> input('email');
        $perfil -> cidade  = $request -> input('provincia');
        $perfil -> escola  = $request -> input('escola');

        $perfil ->save();

        return redirect('perfil/'.$id);

    }

    public function CriarPerfil(Request $request){

        //Works
        $perfil = new Estudante;

        $perfil -> username = $request -> input('nome-do-utilizador');
        $perfil-> dataNascimento = $request -> input('date');
        $perfil -> nome  = $request -> input('nome-completo');
        $perfil -> telefone  = $request -> input('telefone');
        $perfil -> email  = $request -> input('email');
        $perfil -> cidade  = $request -> input('cidade');
        $perfil -> escola  = $request -> input('escola');

        $perfil ->save();

        return redirect('perfil/'.$perfil->id);

    }

}

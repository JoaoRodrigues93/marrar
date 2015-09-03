<?php namespace App\Http\Controllers;
session_start();

use App\Estudante;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Input;
use Input;
use Validator;

use App\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller {

    public function buscarPerfil() {
        $perfil = Auth::user();
        return view('perfil')->with(array('perfil'=>$perfil));

    }

    public function buscarEditPerfil() {
        $perfil = Auth::user();
        return view('editar-perfil')->with(array('perfil'=>$perfil));

    }

    public function HabilitarEditarPerfil(Request $request) {
        return redirect('editar-perfil/');
    }

    public function EditarPerfil(Request $request){

        $id= $request->input('id');
        $perfil = Estudante::find($id);
        $perfil -> nome  = $request -> input('nome');
        $perfil -> apelido  = $request -> input('apelido');
        //Not Used Anymore for Showing Purposes and Saving...
        //$perfil -> username = $request -> input('nome-do-utilizador');
        //$perfil -> password = $request -> input('password');
        $perfil -> email  = $request -> input('email');
        $perfil -> telefone  = $request -> input('telefone');
        $perfil -> cidade  = $request -> input('provincia');
        $perfil -> escola  = $request -> input('escola');
        $perfil-> dataNascimento = $request -> input('date');
        $perfil -> sexo  = $request -> input('sexo');
        $perfil -> descricao  = $request -> input('descricao');

        if ($request->hasFile('image')) {

            $imgName = $perfil->username . '.' .
                $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/images/catalog/', $imgName
            );

            $perfil -> foto  = "http://localhost:8000/images/catalog/".$imgName;
        }

        $perfil ->save();

        return redirect('perfil/');

    }
}

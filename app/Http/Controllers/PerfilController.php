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

    public function EditarPerfil(Request $request){

        $id= $request->input('id');
        $perfil = Estudante::find($id);
        $perfil -> nome  = $request -> input('nome');
        $perfil -> apelido  = $request -> input('apelido');
        //Not Used Anymore for Showing Purposes and Saving.
        //$perfil -> username = $request -> input('nome-do-utilizador');
        //$perfil -> password = $request -> input('password');
        $perfil -> email  = $request -> input('email');
        $perfil -> telefone  = $request -> input('telefone');
        $perfil -> cidade  = $request -> input('provincia');
        $perfil -> escola  = $request -> input('escola');
        $perfil-> dataNascimento = $request -> input('date');
        $perfil -> sexo  = $request -> input('sexo');
        $perfil -> descricao  = $request -> input('descricao');

        //$perfil -> foto = $request->input('imagem');
/*
        $input = array('image' => Input::file('image'));

        // Within the ruleset, make sure we let the validator know that this
        // file should be an image
        $rules = array(
            'image' => 'image'
        );

        // Now pass the input and rules into the validator
        $validator = Validator::make($input, $rules);
*/
        // Check to see if validation fails or passes
        /*
        if ($validator->fails())
        {*/

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

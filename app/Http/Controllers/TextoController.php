<?php namespace App\Http\Controllers;

use App\Texto;
use Illuminate\Support\Facades\Session;
use Request;
use Input;



/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 14-10-2015
 * Time: 10:45 PM
 */

class TextoController extends Controller
{
    public function inicializaTexto(){

        return view('texto');

}

    public function InicializaTexto_list()
    {

        $texto= Texto::all();

        return view('texto_list')->with('textos', $texto);
    }

    public function GravarTexto()
    {

        $texto =new Texto();
        $data = Input::all();

        if(Request::ajax()) {
            $texto->texto=$data['textoCompleto'];
            $texto->titulo=$data['titulo'];
            $texto->save();
  }


    }

    public function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('texto_editar')->with(['textos' => $texto]);
    }


    public function editar()
    { $data = Input::all();

        if(Request::ajax()){

            $id = $data['id'];
            $texto = Texto::find($id);
            $texto->titulo=$data['titulo'];
            $texto->texto=$data['textoCompleto'];
            $texto->save();


        } return Redirect('texto_list');}


    public function deleteTexto($id)
    {
        Texto::find($id)->delete();
        Session::flash('message', 'Texto removidos com sucesso');
        return redirect('texto_list');

    }
}
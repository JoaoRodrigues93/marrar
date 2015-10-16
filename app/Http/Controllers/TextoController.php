<?php namespace App\Http\Controllers;

use App\Texto;
use Illuminate\Support\Facades\Input;
use Request;


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


}
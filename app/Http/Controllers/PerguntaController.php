<?php namespace App\Http\Controllers;
use App\Disciplina;
/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 9-07-2015
 * Time: 2:45 PM
 */


class PerguntaController extends Controller {


    public function Registarpergunta()
    {

    }

public function InicializaPergunta(){
    $disciplinas = Disciplina::lists('nome', 'id');
    return view('pergunta')->with('disciplinas',$disciplinas);
}



}
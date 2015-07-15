<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Controllers\PerguntaController;

class ExameController extends Controller {

    public function show(){
        $examesJSON=null;


        $perguntas = PerguntaController::buscarExame("História");

        return View('exame')->with(array("perguntas"=>$perguntas));
    }

}
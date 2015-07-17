<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Controllers\PerguntaController;

class ExameController extends Controller
{

    public static function showExame($disciplina)
    {

        $perguntas = PerguntaController::buscarExame("matematica");


            return View('exame')->with(array("perguntas" => $perguntas,"disciplina"=>$disciplina));
        }

    public function show(){
        return $this->showExame("História");
    }
}
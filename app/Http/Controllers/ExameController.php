<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Controllers\PerguntaController;

class ExameController extends Controller
{

    public function showExame($disciplina)
    {
        $perguntaController = new PerguntaController();
        $perguntas = $perguntaController->buscarExame($disciplina);


            return View('exame')->with(array("perguntas" => $perguntas,"disciplina"=>$disciplina));
        }

    public function show(){
        return $this->showExame("Matematica");
    }
}
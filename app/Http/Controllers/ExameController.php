<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Controllers\PerguntaController;

class ExameController extends Controller
{

    public function show()
    {
        $examesJSON = "{\"perguntas\": [ ";
        $perguntas = PerguntaController::buscarExame("História");
        $results = 'Nao passou';
        $nrPerguntas =0;

        foreach ($perguntas as $pergunta) {
             if (strlen($examesJSON) < 20) {
                 $examesJSON .= "{\"questao\":\"$pergunta->questao\"," .
                     "\"opcao1\":\"$pergunta->opcao1\" " .
                     ",\"opcao2\":\"$pergunta->opcao2\" " .
                     ",\"opcao3\":\"$pergunta->opcao3\" " .
                     ",\"opcao4\":\"$pergunta->opcao4\" " .
                     ",\"opcao5\":\"$pergunta->opcao5\" }";

             } else if(strlen($examesJSON)>20) {
                 $examesJSON .= ",{\"questao\":\"$pergunta->questao\"," .
                     "\"opcao1\":\"$pergunta->opcao1\" " .
                     ",\"opcao2\":\"$pergunta->opcao2\" " .
                     ",\"opcao3\":\"$pergunta->opcao3\" " .
                     ",\"opcao4\":\"$pergunta->opcao4\" " .
                     ",\"opcao5\":\"$pergunta->opcao5\" }";
             }

            $nrPerguntas++;

        }

        $examesJSON.=" ] }";

            return View('exame')->with(array("examesJSON" => $examesJSON,"nrPerguntas"=>$nrPerguntas));
        }

}
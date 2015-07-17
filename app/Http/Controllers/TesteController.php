<?php namespace App\Http\Controllers;
use App\Pergunta;
session_start();
/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 13-07-2015
 * Time: 11:59 AM
 */

class TesteController extends Controller{

public function inicializaTeste(){


    $perguntas=Pergunta::all();
    $_SESSION['perguntas']=$perguntas;

    return view('teste')->with(array('perguntas'=>$perguntas));
}

    public function validaTeste(){

       $testeJson = "{\"perguntas\":[ ";
       $perguntas = $_SESSION['perguntas'];
        $nrPerguntas =0;

        foreach ($perguntas as $pergunta) {
             if (strlen($testeJson) < 20) {
                 $testeJson .= "{\"questao\":\"$pergunta->questao\"," .
                     "\"id\":\"$pergunta->id\"" .
                     ",\"opcao1\":\"$pergunta->opcao1\"" .
                     ",\"opcao2\":\"$pergunta->opcao2\"" .
                     ",\"opcao3\":\"$pergunta->opcao3\"" .
                     ",\"opcao4\":\"$pergunta->opcao4\"" .
                     ",\"opcao5\":\"$pergunta->opcao5\"".
                     ",\"opcaoCorrecta\":\"$pergunta->opcaoCorrecta\"}";

             } else if(strlen($testeJson)>20) {
                 $testeJson .= ",{\"questao\":\"$pergunta->questao\"," .
                     "\"id\":\"$pergunta->id\"" .
                     ",\"opcao1\":\"$pergunta->opcao1\"" .
                     ",\"opcao2\":\"$pergunta->opcao2\"" .
                     ",\"opcao3\":\"$pergunta->opcao3\"" .
                     ",\"opcao4\":\"$pergunta->opcao4\"" .
                     ",\"opcao5\":\"$pergunta->opcao5\"".
                     ",\"opcaoCorrecta\":\"$pergunta->opcaoCorrecta\"}";
             }

            $nrPerguntas++;

        }

        $testeJson.=" ]}";


        return $testeJson;
    }


}
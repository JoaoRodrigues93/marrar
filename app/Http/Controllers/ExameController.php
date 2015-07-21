<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Controllers\PerguntaController;
use Illuminate\Http\Request;


session_start();

class ExameController extends Controller
{

    public function showExame($disciplina)
    {
        $perguntaController = new PerguntaController();
        $perguntas = $perguntaController->buscarExame($disciplina);
        $nrPerguntas = $perguntas->count();
        $_SESSION["exame"] = $perguntas;

            return View('exame')->with(array("perguntas" => $perguntas,"disciplina"=>$disciplina,"nrPerguntas"=>$nrPerguntas));
        }

    public function show(){
        return $this->showExame("História");
    }

    public function corrigeExame(Request $request){
        $exame = $_SESSION['exame'];
        $pergunta = $exame[0];
        $repostaEscolhida="";
        $idPergunta=0;
        $respostaCorrecta="";
        $nrRepostasCertas=0;
        $nrRepostasErradas =0;
        $nrPerguntaActual=1;
        $relatorio="";

        foreach ($exame as $pergunta){
            $idPergunta = $request->input("pergunta".$nrPerguntaActual);
            $repostaEscolhida = $request->input("resposta".$nrPerguntaActual);
            $respostaCorrecta = $pergunta->opcaoCorrecta;

            if($repostaEscolhida==$respostaCorrecta){
                $relatorio.="ID da pergunta: ".$idPergunta."  Resposta Escolhida: ".$repostaEscolhida.
                    "  Resposta Correcta: ".$respostaCorrecta." ***RESPONDEU CORRECTAMENTE***\n";
                $nrRepostasCertas++;
            }

            else{
                    $relatorio.="ID da pergunta: ".$idPergunta."  Resposta Escolhida: ".$repostaEscolhida.
                        "  Resposta Correcta: ".$respostaCorrecta." ***RESPONDEU ERRADAMENTE***\n";
                    $nrRepostasErradas++;
            }

            $nrPerguntaActual++;
        }



        return $relatorio.$pergunta->questao;
    }

}
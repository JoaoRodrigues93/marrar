<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\ExameNormal;
use App\Http\Controllers\PerguntaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


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
        $disciplinaActual = $_SESSION['disciplinaActual'];
        return $this->showExame($disciplinaActual->nome);
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

        $estudante = $_SESSION['estudante'];

        foreach ($exame as $pergunta){
            $idPergunta = $request->input("pergunta".$nrPerguntaActual);
            $repostaEscolhida = $request->input("resposta".$nrPerguntaActual);
            $respostaCorrecta = $pergunta->opcaoCorrecta;

            if($repostaEscolhida==$respostaCorrecta){
                /*$relatorio.="ID da pergunta: ".$idPergunta."  Resposta Escolhida: ".$repostaEscolhida.
                    "  Resposta Correcta: ".$respostaCorrecta." ***RESPONDEU CORRECTAMENTE***\n";*/
                $nrRepostasCertas++;
            }

            else{
                    /*$relatorio.="ID da pergunta: ".$idPergunta."  Resposta Escolhida: ".$repostaEscolhida.
                        "  Resposta Correcta: ".$respostaCorrecta." ***RESPONDEU ERRADAMENTE***\n";*/
                    $nrRepostasErradas++;
            }

            $nrPerguntaActual++;
        }

        $nrPerguntaActual--;
        /*
        $table->dateTime('dataRealização');
        $table->integer('duracao')->unsigned();
        $table->decimal('nota',2,2);
        $table->smallInteger('respostasCertas')->unsigned();
        $table->smallInteger('respostasErradas')->unsigned();
        $table->smallInteger('nrPerguntas')->unsigned();
        $table->integer('estudante_id')->unsigned();
        */

        $nota = ($nrRepostasCertas/$nrPerguntaActual)*20;

        $examenormal = new ExameNormal();
        $examenormal->nota =$nota;
        $examenormal->duracao =60;
        $examenormal->respostasCertas = $nrRepostasCertas;
        $examenormal->respostasErradas = $nrRepostasErradas;
        $examenormal->nrPerguntas = $nrPerguntaActual;
        $examenormal->dataRealizacao = date_create();
        $examenormal->estudante_id = $estudante->id;

        $examenormal->save();
        return View('exameResultado',['examenormal'=>$examenormal]);
    }

}
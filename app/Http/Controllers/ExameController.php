<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\ExameColectivo;
use App\ExameNormal;
use App\Http\Controllers\PerguntaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


session_start();

class ExameController extends Controller
{

    public function showExameNormal($disciplina)
    {
        $perguntaController = new PerguntaController();
        $perguntas = $perguntaController->buscarExame($disciplina->nome);
        $nrPerguntas = $perguntas->count();
        $_SESSION["exame"] = $perguntas;

            return View('exame')->with(array("perguntas" => $perguntas,"disciplina"=>$disciplina,"nrPerguntas"=>$nrPerguntas));
        }



    public function showNormal(){
        $disciplinaActual = $_SESSION['disciplinaActual'];
        return $this->showExameNormal($disciplinaActual);
    }

    public function showColectivo () {
        $disciplinaActual = $_SESSION['disciplinaActual'];
        $perguntaController = new PerguntaController();
        $dateTIme = getdate();
        $perguntas =null;
        if($dateTIme['mon']<10)
        $data = $dateTIme['year']."-0".$dateTIme['mon']."-".$dateTIme['mday'];
        else
        $data = $dateTIme['year']."-".$dateTIme['mon']."-".$dateTIme['mday'];
        $examecolectivo = ExameColectivo::all()->where('dataCriacao',$data,true)->first();

        if($examecolectivo){

            $perguntas = $examecolectivo->perguntas()->getResults();
            $nrPerguntas = $perguntas->count();
        }
        else
        {

            $perguntas = $perguntaController->buscarExame($disciplinaActual->nome);
            $nrPerguntas = $perguntas->count();
            $examecolectivo = new ExameColectivo();
            $examecolectivo->dataCriacao = date_create();
            $examecolectivo->tempoRealizacao = 60;
            $examecolectivo->nrPerguntas = $nrPerguntas;
            $examecolectivo->save();

            foreach ($perguntas as $pergunta){
                $examecolectivo->perguntas()->save($pergunta);
            }


        }


        $_SESSION["exame"] = $perguntas;
        return View('exame')->with(array("perguntas" => $perguntas,"disciplina"=>$disciplinaActual,"nrPerguntas"=>$nrPerguntas));

    }

    public function corrigeExameNormal(Request $request){
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
                $nrRepostasCertas++;
            }

            else{
                    $nrRepostasErradas++;
            }

            $nrPerguntaActual++;
        }

        $nrPerguntaActual--;

        $nota = ($nrRepostasCertas/$nrPerguntaActual)*20;

        $uri = $request->path();
        if($uri=='examecolectivo'){
            return "Exame Colectivo";
        }
        elseif($uri=='examenormal') {
            $examenormal = new ExameNormal();
            $examenormal->nota = $nota;
            $examenormal->duracao = 60;
            $examenormal->respostasCertas = $nrRepostasCertas;
            $examenormal->respostasErradas = $nrRepostasErradas;
            $examenormal->nrPerguntas = $nrPerguntaActual;
            $examenormal->dataRealizacao = date_create();
            $examenormal->estudante_id = $estudante->id;

            $examenormal->save();
            return View('exameResultado', ['examenormal' => $examenormal]);

        }
    }

}
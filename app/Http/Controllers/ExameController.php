<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Estudante;
use App\ExameColectivo;
use App\ExameNormal;
use App\GestorRanking;
use App\Http\Controllers\PerguntaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


session_start();

class ExameController extends Controller
{

    public function showExameNormal($disciplina)
    {
        $perguntaController = new PerguntaController();
        $perguntas = $perguntaController->buscarExame($disciplina->nome);
        $nrPerguntas = collect( $perguntas)->count();
        $_SESSION["exame"] = $perguntas;

        $action = 'examenormal';
            return View('exame')->with(array("action"=>$action,"perguntas" => $perguntas,"disciplina"=>$disciplina,"nrPerguntas"=>$nrPerguntas));
        }



    public function showNormal(){
        $disciplinaActual = $_SESSION['disciplinaActual'];
        return $this->showExameNormal($disciplinaActual);
    }

    public function showColectivo () {
        $disciplinaActual = $_SESSION['disciplinaActual'];
        $perguntaController = new PerguntaController();
        $dateTIme = getdate();
        $user = Auth::user();
        $already = false;
        $perguntas =null;

        $dia = $dateTIme['mday'];
        $mes = $dateTIme['mon'];
        $ano = $dateTIme['year'];

        $dia = ($dia>9)? $dia : "0".$dia;
        $mes = ($mes>9)? $mes : "0".$mes;

        $data = $ano."-".$mes."-".$dia;
        $examecolectivo = ExameColectivo::all()->where('dataCriacao',$data,true)->first();


        if($examecolectivo){
            $estudantes = $examecolectivo->estudantes()->getResults();
            foreach($estudantes as $estudante ){
                if($estudante->id == $user->id){
                    $already = true;
                }
            }
            $perguntas = $examecolectivo->perguntas()->getResults();
            $nrPerguntas = $perguntas->count();
            if($already==true)
                return View('exameRealizado');
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

        $action = 'examecolectivo';


        $_SESSION["exame"] = $perguntas;
        $_SESSION['examecolectivo'] = $examecolectivo;
        return View('exame')->with(array("action"=>$action,"perguntas" => $perguntas,"disciplina"=>$disciplinaActual,"nrPerguntas"=>$nrPerguntas));

    }

    public function corrigeExame(Request $request){
        $exame = $_SESSION['exame'];
        $disciplina = $_SESSION['disciplinaActual'];
        $pergunta = $exame[0];
        $repostaEscolhida="";
        $idPergunta=0;
        $respostaCorrecta="";
        $nrRepostasCertas=0;
        $nrRepostasErradas =0;
        $nrPerguntaActual=1;
        $relatorio="";
        $duracao = 60;

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
            $examecolectivo = $_SESSION['examecolectivo'];
            $estudante = Auth::user();
            $estudante->examescolectivos()->save($examecolectivo,['nota'=>$nota,"respostasCertas"=>$nrRepostasCertas,
                "respostasErradas"=>$nrRepostasErradas,"duracao"=>$duracao]);

            $dadosExame = ['nota'=>$nota,"respostasCertas"=>$nrRepostasCertas,
                "respostasErradas"=>$nrRepostasErradas,"duracao"=>$duracao];
            $gestorRanking = new GestorRanking();
            $gestorRanking->guardaRanking($disciplina->id,$estudante->id,$nota,$estudante->nome,$disciplina->nome);
            return View('exameColectivoResultado',["dadosExame"=>$dadosExame,"nrPerguntas"=>$nrPerguntaActual]);
        }
        elseif($uri=='examenormal') {
            $examenormal = new ExameNormal();
            $examenormal->nota = $nota;
            $examenormal->duracao = $duracao;
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
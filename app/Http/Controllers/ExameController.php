<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Estudante;
use App\ExameColectivo;
use App\ExameNormal;
use App\GestorRanking;
use App\Http\Controllers\PerguntaController;
use App\Texto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

session_start();

class ExameController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function showExameNormal($disciplina) {

        $perguntaController = new PerguntaController();

        $nome= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $disciplina->nome ) );
        $nome=strtolower($nome);

        if($nome=='portugues') {

            $texto = Texto::orderByRaw("RAND()")->first();

            if(!$texto){
                $perguntas = $perguntaController->buscarExame($disciplina->id);
            }
            else{

            $perguntasTexto = $perguntaController->buscarPerguntasTexto($texto->id);
            if($perguntasTexto->count()==0)
            {
                $texto=false;
            }
            $perguntas = $perguntaController->buscarExame($disciplina->id);

            for ($i = 0; $i < collect($perguntas)->count(); $i++) {

                $perguntasTexto[$perguntasTexto->count()] = $perguntas[$i];
            }
            $perguntas=$perguntasTexto;
            }


        }

        else{
            $texto=false;
            $perguntas = $perguntaController->buscarExame($disciplina->id);

        }

        $action = 'examenormal';
        $nrPerguntas = collect($perguntas)->count();
        $_SESSION["exame"] = $perguntas;
        return View('exame')->with(array("action" => $action,"texto"=>$texto, "perguntas" => $perguntas, "disciplina" => $disciplina, "nrPerguntas" => $nrPerguntas));

    }

    public function showNormal() {
        $disciplinaActual = $_SESSION['disciplinaActual'];
        return $this->showExameNormal($disciplinaActual);
    }

    public function showColectivo() {
        $disciplinaActual = $_SESSION['disciplinaActual'];
        $perguntaController = new PerguntaController();
        $dateTIme = getdate();
        $user = Auth::user();
        $already = false;
        $perguntas = null;

        $dia = $dateTIme['mday'];
        $mes = $dateTIme['mon'];
        $ano = $dateTIme['year'];

        $dia = ($dia > 9) ? $dia : "0" . $dia;
        $mes = ($mes > 9) ? $mes : "0" . $mes;

        $data = $ano . "-" . $mes . "-" . $dia;
        $examecolectivo = ExameColectivo::all()->where('dataCriacao', $data, true)->where('disciplina_id',$disciplinaActual->id)->first();



        $nome= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $disciplinaActual->nome ) );
        $nome=strtolower($nome);


        if ($examecolectivo) {
            $estudantes = $examecolectivo->estudantes()->getResults();
            foreach ($estudantes as $estudante) {
                if ($estudante->id == $user->id) {
                    $already = true;
                }
            }



            $perguntas = $examecolectivo->perguntas()->getResults();

            $texto=Texto::find($examecolectivo->texto_id);


            $nrPerguntas = $perguntas->count();
            if ($already == true)
                return View('exameRealizado');
        }
        else {

            if($nome=='portugues') {

                $texto = Texto::orderByRaw("RAND()")->first();

                if(!$texto){
                    $perguntas = $perguntaController->buscarExame($disciplinaActual->id);
                }
                else{
                $perguntasTexto = $perguntaController->buscarPerguntasTexto($texto->id);
                if($perguntasTexto->count()==0)
                {
                    $texto=false;
                }
                $perguntas = $perguntaController->buscarExame($disciplinaActual->id);

                for ($i = 0; $i < collect($perguntas)->count(); $i++) {

                    $perguntasTexto[$perguntasTexto->count()] = $perguntas[$i];
                }
                $perguntas=$perguntasTexto;}
            }

            else{
                $texto=false;
                $perguntas = $perguntaController->buscarExame($disciplinaActual->id);

            }

             $nrPerguntas = count($perguntas);
            $examecolectivo = new ExameColectivo();
            $examecolectivo->dataCriacao = date_create();
            $examecolectivo->tempoRealizacao = 60;
            $examecolectivo->nrPerguntas = $nrPerguntas;
            $examecolectivo->disciplina_id=$disciplinaActual->id;

            if($nome=='portugues'){

                if(!$texto)
                $examecolectivo->texto_id =0;
                else
                    $examecolectivo->texto_id=$texto->id;
            }

            else{

                $examecolectivo->texto_id = 0;
            }

            if(count($perguntas)!=0){
            $examecolectivo->save();


            foreach ($perguntas as $pergunta) {
                $examecolectivo->perguntas()->save($pergunta);
            }
            }



        }

        $action = 'examecolectivo';


        $_SESSION["exame"] = $perguntas;
        $_SESSION['examecolectivo'] = $examecolectivo;




       return View('exame')->with(array("action" => $action, 'texto'=>$texto,"perguntas" => $perguntas, "disciplina" => $disciplinaActual, "nrPerguntas" => $nrPerguntas));
    }

    public function corrigeExame(Request $request) {
        $exame = $_SESSION['exame'];
        $disciplina = $_SESSION['disciplinaActual'];
        $pergunta = $exame[0];
        $repostaEscolhida = "";
        $idPergunta = 0;
        $respostaCorrecta = "";
        $nrRepostasCertas = 0;
        $nrRepostasErradas = 0;
        $nrPerguntaActual = 1;
        $relatorio = "";
        $duracao = 60;

        $estudante = $_SESSION['estudante'];

        foreach ($exame as $pergunta) {
            $idPergunta = $request->input("pergunta" . $nrPerguntaActual);
            $repostaEscolhida = $request->input("resposta".$nrPerguntaActual);

            $respostaCorrecta = $request->input("correcta".$nrPerguntaActual);;

            if ($repostaEscolhida == $respostaCorrecta) {
                $nrRepostasCertas++;
            } else {
                $nrRepostasErradas++;
            }

            $nrPerguntaActual++;
        }

        $nrPerguntaActual--;

        $nota = ($nrRepostasCertas / $nrPerguntaActual) * 20;
        $nota = round($nota, 1);

        $uri = $request->path();
        if ($uri == 'examecolectivo') {
            $examecolectivo = $_SESSION['examecolectivo'];
            $estudante = Auth::user();
            $estudante->examescolectivos()->save($examecolectivo, ['nota' => $nota, "respostasCertas" => $nrRepostasCertas,
                "respostasErradas" => $nrRepostasErradas, "duracao" => $duracao]);

            $dadosExame = ['nota' => $nota, "respostasCertas" => $nrRepostasCertas,
                "respostasErradas" => $nrRepostasErradas, "duracao" => $duracao];
            $gestorRanking = new GestorRanking();
            $gestorRanking->guardaRanking($disciplina->id, $estudante->id, $nota, $estudante->nome, $disciplina->nome);
            return View('exameColectivoResultado', ["dadosExame" => $dadosExame, "nrPerguntas" => $nrPerguntaActual]);
        } elseif ($uri == 'examenormal') {
            $examenormal = new ExameNormal();
            $examenormal->nota = $nota;
            $examenormal->duracao = $duracao;
            $examenormal->respostasCertas = $nrRepostasCertas;
            $examenormal->respostasErradas = $nrRepostasErradas;
            $examenormal->nrPerguntas = $nrPerguntaActual;
            $examenormal->dataRealizacao = date_create();
            $examenormal->estudante_id = $estudante->id;

            //$examenormal->save();
            return View('exameResultado', ['examenormal' => $examenormal]);
        }
    }

    public function devolveQuestoes(){

    $questoes=$_SESSION["exame"];

        $questoes=json_encode($questoes);

        return $questoes;

    }
}



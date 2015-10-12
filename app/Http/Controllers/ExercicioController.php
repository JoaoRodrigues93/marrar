<?php namespace App\Http\Controllers;

use App\Capitulo;
use App\Pergunta;
use App\Tema;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Helper\ProgressBar;

session_start();

class ExercicioController extends Controller{

    public function showJogo () {
        $tema = Tema::find(1);
        $perguntas=$tema->perguntas();

        /*$perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.id','=',3)
            ->select('perguntas.*')
            ->get();*/

     $nrPerguntas=$perguntas->count();
        $pergunta = $perguntas->first();
        $_SESSION['perguntas'] = $perguntas;
        return view('exercicio1')->with(array('caminho'=>$tema->nome,'pergunta'=>$pergunta,"perguntas"=>$perguntas,'nrPerguntas'=>$nrPerguntas));

    }

  /*  public function doPergunta (Request $request){
        $respostaCerta =$request-> input('respostaCerta');
        $respostaEscolhida = $request->input('respostaEscolhida');

        if($respostaEscolhida==$respostaCerta)
            return "Parabens: Acertaste a pergunta.";
        else
            return "Infelizmente a resposta está errada. A resposta certa é: $respostaCerta";

    }*/

    public function showExercicio($disciplina,$capitulo,$tema)
    {
        $perguntaController = new PerguntaController();

        $temaActual=Tema::join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
                        ->where('capitulos.id','=',$capitulo->id)
                        ->where('temas.nome','=',$tema)
                        ->Select('temas.*')->get()->first();
        $temaId=$temaActual->id;
        $quantidade=10;
        $perguntas = $perguntaController->buscarExercicios($temaId,10);
        $nrPerguntas=$perguntas->count();
        $pergunta = $perguntas->first();
        $perguntaActual =-1;
        $_SESSION['perguntas'] = $perguntas;
        $_SESSION['perguntaActual'] = $perguntaActual;
        $_SESSION['nrPerguntas'] = $nrPerguntas;


        $_SESSION['caminho']="teoria/$disciplina->id/$capitulo->id/$tema.html";


        return view('estudar')->with(array('caminho'=>$tema,"perguntas" => $perguntas,"disciplina"=>$disciplina->nome,"capitulo"=>$capitulo->nome,"tema"=>$tema, 'pergunta'=>$pergunta, 'nrPerguntas'=>$nrPerguntas));
    }

    public function teoria(){

        $teoria=  $_SESSION['caminho'];

        return file_get_contents($teoria);

    }

    public function show($idCapitulo,$tema){
        $tema = str_replace("%20", " ", $tema);


        $capitulo=Capitulo::find($idCapitulo);

       // $tema=$capitulo->tema()->where('temas.nome',$tema)->first();

       $disciplina=$capitulo->disciplina()->first();

       return $this->showExercicio($disciplina,$capitulo,$tema);
    }

    public  function  respostaCorrecta(){
        //$pergunta = Pergunta::find($id);
        $perguntaActual = $_SESSION['perguntaActual'];
        $perguntas = $_SESSION['perguntas'];
        $pergunta = $perguntas[$perguntaActual];
        return "$pergunta->opcaoCorrecta";

    }

    public function estudar(){
        return view('estudar');
    }


    public  function  respostaProximo(){
        $_SESSION['perguntaActual']++;

        $perguntaActual = $_SESSION['perguntaActual'];
        $testeJson="";
        $perguntas = $_SESSION['perguntas'];
        $nrPerguntas = $_SESSION["nrPerguntas"];


        if($perguntaActual<$nrPerguntas){
            $pergunta = $perguntas[$perguntaActual];
            $testeJson =json_encode($pergunta);
        }

        /*foreach ($perguntas as $pergunta) {
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

        }*/

        //$testeJson.=" ]";

        if($testeJson=="" || $testeJson==null)
            return "vazio";
            else
        return $testeJson;
    }

}
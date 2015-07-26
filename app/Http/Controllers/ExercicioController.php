<?php namespace App\Http\Controllers;

use App\Pergunta;
use App\Tema;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Helper\ProgressBar;

session_start();

class ExercicioController extends Controller{

  /*  public function showJogo () {
        $tema = Tema::find(3);
        $perguntas=$tema->perguntas();*/

        /*$perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.id','=',3)
            ->select('perguntas.*')
            ->get();*/

   /*  $nrPerguntas=$perguntas->count();
        $pergunta = $perguntas->first();
        $_SESSION['perguntas'] = $perguntas;
        return view('exercicio')->with(array('caminho'=>$tema->nome,'pergunta'=>$pergunta,"perguntas"=>$perguntas,'nrPerguntas'=>$nrPerguntas));

    }*/

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
        $perguntas = $perguntaController->buscarExercicios($disciplina,$capitulo,$tema);
        $nrPerguntas=$perguntas->count();
        $pergunta = $perguntas->first();
        $perguntaActual =0;
        $_SESSION['perguntas'] = $perguntas;
        $_SESSION['perguntaActual'] = $perguntaActual;
        $_SESSION['nrPerguntas'] = $nrPerguntas;
        return View('exercicio')->with(array('caminho'=>$tema,"perguntas" => $perguntas,"disciplina"=>$disciplina,"capitulo"=>$capitulo,"tema"=>$tema, 'pergunta'=>$pergunta, 'nrPerguntas'=>$nrPerguntas));
    }

    public function show(){
        return $this->showExercicio("Frances","ABC","Aprender o ABC");
    }

    public  function  respostaCorrecta(){
        //$pergunta = Pergunta::find($id);
        $perguntaActual = $_SESSION['perguntaActual'];
        $perguntas = $_SESSION['perguntas'];
        $pergunta = $perguntas[$perguntaActual];
        return "$pergunta->opcaoCorrecta";
    }


    public  function  respostaProximo(){
        $_SESSION['perguntaActual']++;
        $perguntaActual = $_SESSION['perguntaActual'];
        $testeJson = "";
        $perguntas = $_SESSION['perguntas'];
        $nrPerguntas = $_SESSION["nrPerguntas"];
// create a new progress bar (50 units)

       // $progress = new ProgressBar($output, $nrPerguntas);
        //$this->output->progressStart($nrPerguntas);

// start and displays the progress bar
     //   $progress->start();

       // $i = 0;
        //while ($i++ < $nrPerguntas) {
            // ... do some work

            // advance the progress bar 1 unit
         //   $this->output->progressAdvance();

            // you can also advance the progress bar by more than 1 unit
            // $progress->advance(3);
      //  }

// ensure that the progress bar is at 100%
       // $this->output->progressFinish();

        if($perguntaActual<$nrPerguntas){
            $pergunta = $perguntas[$perguntaActual];
            $testeJson .= "{\"questao\":\"$pergunta->questao\",".
                "\"id\":\"$pergunta->id\"".
                ",\"opcao1\":\"$pergunta->opcao1\"" .
                ",\"opcao2\":\"$pergunta->opcao2\"" .
                ",\"opcao3\":\"$pergunta->opcao3\"" .
                ",\"opcao4\":\"$pergunta->opcao4\"" .
                ",\"opcao5\":\"$pergunta->opcao5\"".
                ",\"opcaoCorrecta\":\"$pergunta->opcaoCorrecta\"}";
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
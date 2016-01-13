<?php namespace App\Http\Controllers;
use App\Capitulo;
use App\Disciplina;
use App\Pergunta;
use App\PerguntaTexto;
use App\Tema;
use App\Texto;
use Request;
use Input;
session_start();

/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 9-07-2015
 * Time: 2:45 PM
 */


class PerguntaTextoController extends Controller {


    public function InicializaPerguntaTexto(){
        $titulos = Texto::lists('titulo', 'id');


        $disciplina=Disciplina::where('nome','Português')->first();
        $capitulo=Capitulo::where('nome','PerguntaTexto')->first();
        $tema=Tema::where('nome','PerguntaTexto')->first();


        if(!$disciplina){

            $disciplina=new Disciplina();

            $disciplina->nome = 'Português';
            $disciplina->save();


            $capitulo=new Capitulo();
            $capitulo->nome = "PerguntaTexto";
            $capitulo->disciplina_id = $disciplina->id;
            $capitulo->save();

            $tema=new Tema();
            $tema->nome = "PerguntaTexto";
            $tema->capitulo_id = $capitulo->id;
            $tema->save();


            $_SESSION['tema']=$tema;
  }

        elseif(!$capitulo){

            $capitulo=new Capitulo();
            $capitulo->nome = "PerguntaTexto";
            $capitulo->disciplina_id = $disciplina->id;
            $capitulo->save();

            $tema=new Tema();
            $tema->nome = "PerguntaTexto";
            $tema->capitulo_id = $capitulo->id;
            $tema->save();


            $_SESSION['tema']=$tema;

        }

        elseif(!$tema){

            $tema=new Tema();
            $tema->nome = "PerguntaTexto";
            $tema->capitulo_id = $capitulo->id;
            $tema->save();


            $_SESSION['tema']=$tema;
        }

        else{

            $_SESSION['tema']=$tema;

        }


        return view('perguntaTexto')->with(array('titulos'=>$titulos));
    }


    public function GravarPerguntaTexto()
    {


        $pergunta=new Pergunta();
        $data = Input::all();

        if(Request::ajax()) {
            $pergunta->questao = $data['questao'];
            $pergunta->opcao1 = $data['opcao1'];
            $pergunta->opcao2 = $data['opcao2'];
            $pergunta->opcao3 = $data['opcao3'];
            $pergunta->opcao4 = $data['opcao4'];
            $pergunta->opcao5 = $data['opcaoCorrecta'];
            $pergunta->opcaoCorrecta = $data['opcaoCorrecta'];
            $string1=strstr($pergunta -> opcao1,'<img');

            if($string1!=false)
            {
                $pergunta -> imagem=true;
            }
            else {
                $string2 = strstr($pergunta->opcao2, '<img');
                if ($string2 != false) {
                    $pergunta->imagem = true;

                } else {
                    $string3 = strstr($pergunta->opcao3, '<img');
                    if ($string3 != false) {
                        $pergunta->imagem = true;

                    } else {
                        $pergunta->imagem = false;
                    }

                }

            }


            $tema= $_SESSION['tema'];

           $pergunta = $tema->perguntas()->save($pergunta);
            $perguntaTexto= PerguntaTexto::firstOrCreate(['texto_id'=>$data['titulos'],'pergunta_id'=>$pergunta->id]);
            $perguntaTexto->save();

        }

  }

}
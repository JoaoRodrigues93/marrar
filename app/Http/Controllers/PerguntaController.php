<?php namespace App\Http\Controllers;
use App\Capitulo;
use App\Disciplina;
use App\Pergunta;
use App\Tema;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 9-07-2015
 * Time: 2:45 PM
 */


class PerguntaController extends Controller {


    public function Registarpergunta()
    {

    }

public function InicializaPergunta(){
    $disciplinas = Disciplina::lists('nome', 'id');
    $capitulos = Capitulo::lists('nome', 'id');
    $tema = Tema::lists('nome','id');
    return view('pergunta')->with(array('disciplinas'=>$disciplinas,'capitulos'=>$capitulos,'tema'=>$tema));
}

public function registaPerguntas(Request $request){
    $pergunta =new Pergunta();

    $pergunta -> questao = $request -> input('questao');
    $pergunta -> opcao1  = $request -> input('opcao1');
    $pergunta -> opcao2  = $request -> input('opcao2');
    $pergunta -> opcao3  = $request -> input('opcao3');
    $pergunta -> opcao4  = $request -> input('opcao4');
    $pergunta -> opcao5  = $request -> input('opcaoCorrecta');
    $pergunta -> opcaoCorrecta = $request -> input('opcaoCorrecta');

$tema = Tema::find($request -> input('tema'));
$pergunta = $tema->perguntas()->save($pergunta);


}


}
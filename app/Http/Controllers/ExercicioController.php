<?php namespace App\Http\Controllers;

use App\Pergunta;
use App\Tema;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ExercicioController extends Controller{

    public function showJogo () {
        $tema = Tema::all()->first()->nome;
$pergunta=Pergunta::find(6);

        return view('exercicio')->with(array('caminho'=>$tema,'pergunta'=>$pergunta));

    }

    public function doPergunta (Request $request){
        $respostaCerta =$request-> input('respostaCerta');
        $respostaEscolhida = $request->input('respostaEscolhida');

        if($respostaEscolhida==$respostaCerta)
            return "Parabens: Acertaste a pergunta.";
        else
            return "Infelizmente a resposta está errada. A resposta certa é: $respostaCerta";

    }


}
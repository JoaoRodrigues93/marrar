<?php namespace App\Http\Controllers;
use App\Disciplina;
/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 9-07-2015
 * Time: 2:45 PM
 */


class PerguntaController extends Controller
{


    public function Registarpergunta()
    {

    }

    public function InicializaPergunta()
    {
        $disciplinas = Disciplina::lists('nome', 'id');
        return view('pergunta')->with('disciplinas', $disciplinas);
    }








    /*motor de peruntas começa aqui
    aqui se encontraram os metodos que serão chamados para devoler as perguntas
    tanto para o exame, como para testes assim como para exercicios
    */
    public function buscarExame($disciplina){
        //metodo que retorna o array de perguntas do exame baseando se no unico paramentro que é a disciplina
    }

    public function buscarTeste($disciplina, $capitulo){
        //metodo que retorna o array de perguntas para o teste baseando se no capitulo e na disciplina
    }

    public function buscarExercicios($disciplina, $capitulo, $tema){
       //metodo que retorna o array de perguntas exercicios baseando se na discipina,capitulo e tema
    }

}



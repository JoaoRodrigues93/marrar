<?php namespace App\Http\Controllers;
use App\Capitulo;
use App\Disciplina;
use App\Pergunta;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 9-07-2015
 * Time: 2:45 PM
 */


class PerguntaController extends Controller {



public function InicializaPergunta(){
    $disciplinas = Disciplina::lists('nome', 'id');
    $capitulos = Capitulo::lists('nome', 'id');
    $tema = Tema::lists('nome','id');
    return view('pergunta')->with(array('disciplinas'=>$disciplinas,'capitulos'=>$capitulos,'tema'=>$tema));
}

    public function InicializaPerguntaView(){

        $perguntas=Pergunta::all();

        return view('perguntaview')->with('perguntas',$perguntas);
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
Session::flash('message','Dados gravados com sucesso');

    return redirect('/pergunta');

}

    public function RemoverPergunta($id){
        Pergunta::find($id)->delete();

        return redirect('perguntaview');

    }

    public function Editar($id){

        $pergunta=Pergunta::find($id);
        $disciplinas = Disciplina::lists('nome', 'id');
        $capitulos = Capitulo::lists('nome', 'id');
        $tema = Tema::lists('nome','id');
        return view('perguntaeditar')->with(array('pergunta'=>$pergunta,'disciplinas'=>$disciplinas,'capitulos'=>$capitulos,'tema'=>$tema));
    }



    public function EditarPergunta(Request $request){

    $id= $request->input('id');
        $pergunta=Pergunta::find($id);
        $pergunta -> questao = $request -> input('questao');
        $pergunta -> opcao1  = $request -> input('opcao1');
        $pergunta -> opcao2  = $request -> input('opcao2');
        $pergunta -> opcao3  = $request -> input('opcao3');
        $pergunta -> opcao4  = $request -> input('opcao4');
        $pergunta -> opcao5  = $request -> input('opcaoCorrecta');
        $pergunta -> opcaoCorrecta = $request -> input('opcaoCorrecta');
        $tema = Tema::find($request -> input('tema'));

        $pergunta = $tema->perguntas()->save($pergunta);

        return redirect('perguntaview');


    }


    /*motor de peruntas começa aqui
    aqui se encontraram os metodos que serão chamados para devoler as perguntas
    tanto para o exame, como para testes assim como para exercicios
    */
    public function buscarExame($disciplina){
        //metodo que retorna o array de perguntas do exame baseando se no unico paramentro que é a disciplina

        $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('disciplinas.nome','=',$disciplina)
            ->select('perguntas.*')
            ->get();

        return $this->randomize($perguntas);
    }

    public function buscarTeste($disciplina,$capitulo){
        //metodo que retorna o array de perguntas para o teste baseando se no capitulo e na disciplina
        $disciplina='matematica';//esses dois atributos devem ser parametros
        $capitulo='trigonometria';

        $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('disciplinas.nome','=',$disciplina)
            ->where('capitulos.nome','=',$capitulo)
            ->select('perguntas.*')
            ->get();
        return $this->randomize($perguntas);
    }

    public function buscarExercicios($disciplina,$capitulo,$tema){
       //metodo que retorna o array de perguntas exercicios baseando se na discipina,capitulo e tema
        $disciplina='matematica';//esses dois atributos devem ser parametros
        $capitulo='trigonometria';
        $tema='cossenos';

        $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('disciplinas.nome','=',$disciplina)
            ->where('capitulos.nome','=',$capitulo)
            ->where('temas.nome','=',$tema)
            ->select('perguntas.*')
            ->get();
        return $this->randomize($perguntas);
    }

    private function randomize($perguntas){
        foreach ($perguntas as $pergunta) {
            $opcao1= rand ( 1 ,5 );

            $opcao2=rand(1,5);
            while($opcao1==$opcao2){
                $opcao2=rand(1,5);
            }

            $opcao3=rand(1,5);
            while(($opcao3 == $opcao2) or ($opcao3==$opcao1)){
                $opcao3=rand(1,5);
            }

            $opcao4=rand(1,5);
            while(($opcao4==$opcao1)or($opcao4==$opcao2)or($opcao4==$opcao3)){
                $opcao4=rand(1,5);
            }

            $opcao5=rand(1,5);
            while(($opcao5==$opcao1)or($opcao5==$opcao2)or($opcao5==$opcao3)or($opcao5==$opcao4)){
                $opcao5=rand(1,5);
            }


            $opcao1=$this->setOpcao($pergunta,$opcao1);
            $opcao2=$this->setOpcao($pergunta,$opcao2);
            $opcao3=$this->setOpcao($pergunta,$opcao3);
            $opcao4=$this->setOpcao($pergunta,$opcao4);
            $opcao5=$this->setOpcao($pergunta,$opcao5);


            $pergunta->opcao1=$opcao1;
            $pergunta->opcao2=$opcao2;
            $pergunta->opcao3=$opcao3;
            $pergunta->opcao4=$opcao4;
            $pergunta->opcao5=$opcao5;
        }
        return $perguntas;
    }

    private function setOpcao($perguntas,$opcao){
        switch($opcao){
            case(1):$opcao=$perguntas->opcao1;break;
            case(2):$opcao=$perguntas->opcao2;break;
            case(3):$opcao=$perguntas->opcao3;break;
            case(4):$opcao=$perguntas->opcao4;break;
            case(5):$opcao=$perguntas->opcao5;break;
        }
        return $opcao;
    }

}



<?php namespace App\Http\Controllers;
use App\Capitulo;
use App\Disciplina;
use App\Pergunta;
use App\Tema;
use Request;
use Input;
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
    return view('pergunta')->with(array('disciplinas'=>$disciplinas));
}


    public function InicializaPerguntaView(){

        $disciplinas = Disciplina::lists('nome', 'id');
        return view('perguntaview')->with(array('disciplinas'=>$disciplinas));
    }

public function registaPerguntas(){
    $pergunta =new Pergunta();

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
        $string2=strstr($pergunta -> opcao2,'<img');
        if($string2!=false){
            $pergunta -> imagem=true;

        }

        else{
            $string3=strstr($pergunta -> opcao3,'<img');
            if($string3!=false){
                $pergunta -> imagem=true;

            }

            else{
                $pergunta -> imagem=false;
            }

        }

    }


   $tema = Tema::find($data['tema']);

        $pergunta = $tema->perguntas()->save($pergunta);





}}

    public function RemoverPergunta($id){

        Pergunta::find($id)->delete();

        return redirect('perguntaview');

    }

    public function Editar($id){

        $pergunta=Pergunta::find($id);
        $idTema=$pergunta->tema;
        $idCapitulo=$idTema->capitulo;
        $idDisc=$idCapitulo->disciplina;


        $tema=$idCapitulo->temas->lists('nome','id');;

        $capitulos=$idDisc->capitulos->lists('nome','id');;

        $pergunta->tema->capitulo->lists('nome','id');
        $disciplinas = $pergunta->tema->capitulo->disciplina->lists('nome','id');

        return view('perguntaeditar')->with(array('pergunta'=>$pergunta,'disciplinas'=>$disciplinas
        ,'capitulos'=>$capitulos,'tema'=>$tema,'idTema'=>$idTema->id, 'idDisc'=>$idDisc->id,'idCap'=>$idCapitulo->id));
    }



    public function EditarPergunta(){
        $data = Input::all();
        if(Request::ajax()) {
        $id= $data['id'];
        $pergunta=Pergunta::find($id);
        $pergunta -> questao = $data['questao'];
        $pergunta -> opcao1  = $data['opcao1'];
        $pergunta -> opcao2  = $data['opcao2'];
        $pergunta -> opcao3  = $data['opcao3'];
        $pergunta -> opcao4  = $data['opcao4'];
        $pergunta -> opcao5  = $data['opcaoCorrecta'];
        $pergunta -> opcaoCorrecta = $data['opcaoCorrecta'];
        $tema = Tema::find($data['tema']);

        $pergunta = $tema->perguntas()->save($pergunta);



    }}

    public function showPerguntaPorDisc($id){

        $perguntas= Pergunta::join('temas','temas.id','=','perguntas.tema_id')
            ->join('capitulos','capitulos.id','=','temas.capitulo_id')
            ->join('disciplinas','disciplinas.id','=','capitulos.disciplina_id')
            ->where('disciplinas.id', $id)
            ->get();


        $testeJson = json_encode($perguntas);

        return $testeJson;
    }




    /*motor de peruntas começa aqui
    aqui se encontraram os metodos que serão chamados para devoler as perguntas
    tanto para o exame, como para testes assim como para exercicios
    */
    public function buscarExame($disciplina){
        //metodo que retorna o array de perguntas do exame baseando se no unico paramentro que é a disciplina

      /*  $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('disciplinas.nome','=',$disciplina)
            ->select('perguntas.*')
            ->get();*/
        $capitulos=Capitulo::join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('disciplinas.id','=',$disciplina)
            ->select('capitulos.*')
            ->orderByRaw("RAND()")
            ->get() ;

        $pergunt=array();
        $quantidade=2;

        foreach($capitulos as $capitulo){


            $pergunta=$this->buscarTeste($capitulo->id,$quantidade);
            $j=count($pergunt);
            $k=count($pergunta);
            $l=0;

            for($i=$j;$i<($j+$k);$i++){
                $pergunt[count($pergunt)]=$pergunta[$l];

                $l++;
            }

        }
        return $pergunt;
    }

    public function buscarTeste($capitulo, $quantidade){
        //metodo que retorna o array de perguntas para o teste baseando se no capitulo e na disciplina

        $temas=Tema::join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('capitulos.id','=',$capitulo)
            ->select('temas.*')
            ->orderByRaw("RAND()")
            ->get() ;

       $pergunt=array();


        foreach($temas as $tema){

            $pergunta=$this->buscarExercicios($tema->id,$quantidade);
            $j=count($pergunt);
            $k=$pergunta->count();
            $l=0;

            for($i=$j;$i<($j+$k);$i++){
                $pergunt[count($pergunt)]=$pergunta[$l];

             $l++;
            }

        }

        return $pergunt;
    }

    public function buscarExercicios($tema,$quantidade){
       //metodo que retorna o array de perguntas exercicios baseando se na discipina,capitulo e tema
       // $disciplina='matematica';//esses dois atributos devem ser parametros
       // $capitulo='trigonometria';
     //   $tema='cossenos';


        if($_SESSION['tema']==false)
        {
        $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.id','=',$tema)
            ->select('perguntas.*');

        }
        else{
            $temaTexto=$_SESSION['tema'];
            $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
                ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
                ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
                ->where('temas.id','=',$tema)
                ->where('perguntas.tema_id','!=',$temaTexto->id)
                ->select('perguntas.*');

        }



        $perguntas=$perguntas->orderByRaw("RAND()");
        if($perguntas->count()>$quantidade){
            $perguntas=$perguntas->take($quantidade);
        }


        return $this->randomize($perguntas->get());
    }


    public function buscarPerguntasTexto($texto){
        //metodo que retorna o array de perguntas exercicios baseando se na discipina,capitulo e tema
        // $disciplina='matematica';//esses dois atributos devem ser parametros
        // $capitulo='trigonometria';
        //   $tema='cossenos';

        $perguntas = Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->join('pergunta_textos','pergunta_textos.pergunta_id','=','perguntas.id')
            ->where('pergunta_textos.texto_id','=',$texto)
            ->select('perguntas.*');

        $perguntas=$perguntas->orderByRaw("RAND()");

        return $this->randomize($perguntas->get());
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


    public function devolvePerguntaDisciplina($id){

        $perguntas=Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.nome','!=',"PerguntaTexto")
            ->where('disciplinas.id','=',$id)
            ->select('perguntas.*')->get();


        return $perguntas;
    }
    public function devolvePerguntaCapitulo($id){

        $perguntas=Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.nome','!=',"PerguntaTexto")
            ->where('capitulos.id','=',$id)
            ->select('perguntas.*')->get();


        return $perguntas;
    }
    public function devolvePerguntaTema($id){

        $perguntas=Pergunta::join('temas', 'temas.id', '=', 'perguntas.tema_id')
            ->join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.nome','!=',"PerguntaTexto")
            ->where('temas.id','=',$id)
            ->select('perguntas.*')->get();


        return $perguntas;
    }

}

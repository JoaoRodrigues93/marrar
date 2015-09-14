<?php namespace App\Http\Controllers;
use App\Capitulo;
use App\Disciplina;
use App\Estudante;
use App\GestorTesteFeito;
use App\Pergunta;
use App\Tema;
use App\Teste;
use Request;
use Input;
use Illuminate\Support\Facades\Auth;


session_start();
/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 13-07-2015
 * Time: 11:59 AM
 */

class TesteController extends Controller{

public function inicializaTeste($capituloNome,$capituloId){

    $capitulo =Capitulo::find($capituloId);
    $disciplina=$capitulo->disciplina()->first();

    $perguntaController = new PerguntaController();

    $perguntas = $perguntaController->buscarTeste($disciplina->nome,$capitulo->nome);

    $_SESSION['perguntas']=$perguntas;
    //Alterei a linha abaixo
    //$estudante=Estudante::find(1); para
    $estudante = Auth::user();

    $ranking = true;

    $teste=Teste::where('capitulo_id',$capitulo->id)
        ->where('estudante_id',$estudante->id)->get();

    $total=$teste->count();
    $max=$teste->max('nota');
    $min=$teste->min('nota');

    if($total==0){

     $total='---';
     $min='---';
     $max='---';
    }return view('teste')->with(array('perguntas'=>$perguntas,'capitulo'=>$capitulo,'disciplina'=>$disciplina->nome,'total'=>$total,'max'=>$max,'min'=>$min,$ranking,'count'=>count($perguntas)));
}


    public function gravaTeste(){
        $teste =new Teste();
        $estudante = Auth::user();
        $data = Input::all();
        $disciplina = $_SESSION['disciplinaActual'];

        if(Request::ajax()) {
            $teste->nota=$data['nota'];
            $teste->respostasCertas=$data['respCertas'];
            $teste->respostasErradas=$data['respErradas'];
            $teste->nrPerguntas=($data['respErradas'])+($data['respCertas']);
            $teste->estudante_id=$estudante->id;
            $teste->capitulo_id=$data['capituloId'];
            date_default_timezone_set('Africa/Maputo');
            $date = date('Y-m-d h:i:s', time());
            $teste->dataRealizacao=$date;
            $capitulo = Capitulo::find($data['capituloId']);
            $teste->save();

            $gestorTeste = new GestorTesteFeito();
            $gestorTeste->guardaTesteFeito($disciplina->id,$estudante->id,$teste->nota,$estudante->nome,
            $disciplina->nome,$capitulo->nome,$capitulo->id);

        }

    }


   //Devolve um json com todas as perguntas
    public function validaTeste(){

        //$testeJson = "{\"perguntas\":[ ";
        $perguntas = $_SESSION['perguntas'];
        //$nrPerguntas =0;

        $testeJson=json_encode($perguntas);
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

        }

        $testeJson.=" ]}";*/


        return $testeJson;
    }


}
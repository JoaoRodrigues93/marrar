<?php namespace App\Http\Controllers;

use App\Tema;
use App\Capitulo;
use App\Disciplina;
use Request;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
/**
 * Created by PhpStorm.
 * User: Yola
 * Date: 7/10/2015
 * Time: 8:29 AM
 */
class TemaController extends Controller
{
    public function showTema()
    {
        return view('tema');
    }

    public function inicializaTema()
    {

        $disciplinas = Disciplina::lists('nome', 'id');
        return view('tema')->with(array('disciplinas' => $disciplinas));
    }

    public function inicializaTema_list()
    {
        $temas = new Tema();
        $capitulos = $temas->capitulo();
        $disciplinas=Disciplina::all()->lists('nome', 'id');;
        $tema = Tema::all();
        return view('tema_list')->with(array('temas' => $tema, 'capitulos' => $capitulos,'disciplinas'=>$disciplinas));
    }



    public function createTema()
    { $data = Input::all();

        $disciplina = $data['disciplinas'];
        $capitulo = $data['capitulos'];
        $nome = $data['nome'];

        $path = "teoria/$disciplina/$capitulo";

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }



        $pathFinal = "$path/$nome.html";
        $myfile = fopen($pathFinal, "w") or die("Unable to open file");
        $conteudo = $data['conteudo'];
        fwrite($myfile, $conteudo);
        fclose($myfile);
        $tema = new Tema();
        if(Request::ajax()){

         $tema->nome = $data['nome'];
         $tema->numero_questoes = $data['questoes'];
         $tema->conteudo = $pathFinal;
         $capitulos = Capitulo::find($data['capitulos']);
         $tema = $capitulos->temas()->save($tema);


    }}

    public function deleteTema($id)
    {
        Tema::find($id)->delete();
        Session::flash('message', 'Dados removidos com sucesso');
        return Redirect('tema_list');
    }

    public function editarTema($id)
    {

        $tema = Tema::find($id);
        $capitulo = $tema->capitulo;
        $disciplina = $capitulo->disciplina;
        $capitulos=$disciplina->capitulos->lists('nome', 'id');;

        $disciplinas = Disciplina::all()->lists('nome', 'id');
        $_SESSION['caminho']=$tema->conteudo;

        return view('tema_editar')->with(array('tema' => $tema, 'capitulos'=>$capitulos,'disciplinas' => $disciplinas, 'idCap' => $capitulo->id,'idDisc' => $disciplina->id));

    }

    public function editar()
    {

        $data = Input::all();
        $disciplina=$data['idDisc'];
        $capitulo=$data['idCap'];




        if (Request::ajax()) {

            $id = $data['id'];
            $tema = Tema::find($id);
            $tema->nome = $data['nome'];
            $tema->numero_questoes = $data['questoes'];


            if (file_exists($_SESSION['caminho'])) {
                unlink($_SESSION['caminho']);

            }

                $path = "teoria/$disciplina/$capitulo";

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
            }


                $pathFinal = "$path/$tema->nome.html";
                $myfile = fopen($pathFinal, "w") or die("Unable to open file");
                $conteudo = $data['conteudo'];
                fwrite($myfile, $conteudo);
                fclose($myfile);

            $tema->conteudo = $pathFinal;
            $capitulos = Capitulo::find($data['capitulos']);
            $tema = $capitulos->temas()->save($tema);


    }

    public function buscarTemaCapitulo($id)
    {

        $temas = Tema::where('capitulo_id', $id)->where('temas.nome','!=',"PerguntaTexto")->get();


        $temaJson = "{\"temas\":[ ";

        foreach ($temas as $tema) {
            if (strlen($temaJson) < 20) {
                $temaJson .= "{\"nome\":\"$tema->nome\"," .
                    "\"id\":\"$tema->id\"}";

            } else if (strlen($temaJson) > 20) {
                $temaJson .= ",{\"nome\":\"$tema->nome\"," .
                    "\"id\":\"$tema->id\"}";
            }
        }

        $temaJson .= " ]}";

        return $temaJson;

    }


    public function showTemaMobile($id){

        $temas = Tema::where('capitulo_id',$id)->get();
        $capitulo= Capitulo::find($id);
        $disciplina=$_SESSION['disciplinaActual'];

        return view('temaMobile')->with(array('capitulo'=>$capitulo,'temas'=>$temas,'disciplina'=>$disciplina));

    }


    public function devolveTemasDisciplina($id){

        $temas=Tema::join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.nome','!=',"PerguntaTexto")
            ->where('disciplinas.id','=',$id)
            ->select('temas.*')->get();
        return $temas;

    }

    public function devolveTemasCapitulo($id){

        $temas=Tema::join('capitulos', 'capitulos.id', '=', 'temas.capitulo_id')
            ->join('disciplinas', 'disciplinas.id', '=', 'capitulos.disciplina_id')
            ->where('temas.nome','!=',"PerguntaTexto")
            ->where('capitulos.id','=',$id)
            ->select('temas.*')->get();

        return $temas;

    }



}
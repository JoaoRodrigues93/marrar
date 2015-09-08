<?php namespace App\Http\Controllers;

use App\Tema;
use App\Capitulo;
use App\Disciplina;
use Illuminate\Http\Request;
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
        $tema = Tema::all();
        return view('tema_list')->with(array('temas' => $tema, 'capitulos' => $capitulos));
    }

    public function createTema(Request $request)
    {

        $disciplina = $request->input('disciplinas');
        $capitulo = $request->input('capitulos');
        $nome = $request->input('nome');

        $path = "teoria/$disciplina/$capitulo";

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }



        $pathFinal = "$path/$nome.html";
        $myfile = fopen($pathFinal, "w") or die("Unable to open file");
        $conteudo = $request->input('conteudo');
        fwrite($myfile, $conteudo);
        fclose($myfile);


         $tema = new Tema();
         $tema->nome = $request->input('nome');
         $tema->numero_questoes = $request->input('questoes');
         $tema->conteudo = $pathFinal;
         $capitulos = Capitulo::find($request->input('capitulos'));
         $tema = $capitulos->temas()->save($tema);
         Session::flash('message', 'Dados gravados com sucesso');

         return Redirect::to('tema');


    }

    public function deleteTema($id)
    {
        Tema::find($id)->delete();
        Session::flash('message', 'Dados removidos com sucesso');
        return Redirect('tema_list');
    }

    public function editarTema($id)
    {
        $t = new Tema();
        $tema = $t->find($id);
        $capitulo = $tema->capitulo->nome;
        $disciplina = $tema->capitulo->disciplina->nome;
        $disciplinas = Disciplina::lists('nome', 'id');
        return view('tema_editar')->with(array('tema' => $tema, 'disciplinas' => $disciplinas, 'capitulo' => $capitulo, 'disciplina' => $disciplina));

    }

    public function editar(Request $request)
    {
        $id = $request->input('id');
        $tema = Tema::find($id);
        $tema->nome = $request->input('nome');
        $tema->numero_questoes = $request->input('questoes');
        $tema->conteudo = $request->input('conteudo');
        $capitulos = Capitulo::find($request->input('capitulos'));
        $tema = $capitulos->temas()->save($tema);
        Session::flash('message', 'Dados alterados com sucesso');
        return Redirect('tema_list');


    }

    public function buscarTemaCapitulo($id)
    {

        $temas = Tema::where('capitulo_id', $id)->get();


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

}
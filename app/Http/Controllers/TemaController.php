<?php namespace App\Http\Controllers;

use App\Tema;
use App\Capitulo;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        $capitulos = Capitulo::lists('nome', 'id');
        return view('tema')->with(array('disciplinas' => $disciplinas, 'capitulos' => $capitulos));
    }

    public function inicializaTema_list(){
        $tema=Tema::all();
        return view('tema_list')->with('temas',$tema);
    }

    public function createTema(Request $request)
    {
        $tema = new Tema();
        $tema->nome = $request->input('nome');
        $tema->numero_questoes = $request->input('questoes');
        $tema->conteudo = $request->input('conteudo');
        $capitulos = Capitulo::find($request->input('capitulos'));
        $tema = $capitulos->temas()->save($tema);
        Session::flash('message', 'Dados gravados com sucesso');
        return Redirect::to('tema');

    }

    public function deleteTema($id){
        Tema::find($id)->delete();
        Session::flash('message', 'Dados removidos com sucesso');
        return Redirect('tema_list');
    }
    public function editarTema($id){
        $tema=Tema::find($id);
        $disciplinas=Disciplina::lists('nome','id');
        $capitulos=Capitulo::lists('nome','id');
        return view('tema_editar')->with(array('tema'=>$tema,'capitulos'=>$capitulos,'disciplinas'=>$disciplinas));
    }

  public function editar(Request $request){
      $id=$request->input('id');
      $tema=Tema::find($id);
      $tema->nome=$request->input('nome');
      $tema->numero_questoes=$request->input('numero_questoes');
      $tema->conteudo=$request->input('conteudo');
      $capitulos=Capitulo::find($request->input('capitulos'));
      $tema=$capitulos->temas()->save($tema);
      Session::flash('message', 'Dados alterados com sucesso');
      return Redirect('tema_list');


  }

    public function buscarTemaCapitulo($id){

        $temas=Tema::where('capitulo_id',$id)->get();


        $temaJson = "{\"temas\":[ ";

        foreach ($temas as $tema) {
            if (strlen($temaJson) < 20) {
                $temaJson .= "{\"nome\":\"$tema->nome\"," .
                    "\"id\":\"$tema->id\"}";

            } else if(strlen($temaJson)>20) {
                $temaJson .= ",{\"nome\":\"$tema->nome\"," .
                    "\"id\":\"$tema->id\"}";
            }


        }

        $temaJson.=" ]}";

        return $temaJson;

    }


}
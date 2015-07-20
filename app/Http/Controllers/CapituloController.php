<?php namespace App\Http\Controllers;

use App\Capitulo;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * Created by PhpStorm.
 * User: Yola
 * Date: 7/10/2015
 * Time: 8:00 AM
 */
class CapituloController extends Controller
{

    public function showCapitulo()
    {
        return view("capitulo");
    }

    public function inicializaCapitulo()
    {
        $disciplinas = Disciplina::lists('nome', 'id');
        return view('capitulo')->with(array('disciplinas' => $disciplinas));
    }

    public function createCapitulo(Request $request)
    {
        $capitulo = new Capitulo();
        $capitulo->nome = $request->input('nome');
        $disciplinas = Disciplina::find($request->input('disciplinas'));
        $capitulo = $disciplinas->capitulos()->save($capitulo);
        Session::flash('message', 'Dados gravados com sucesso');
        return Redirect('capitulo');
    }

    public function inicializaCapitulo_list()
    {
        $capitulos = Capitulo::all();
        return view('capitulo_list')->with('capitulos', $capitulos);
    }

    public function deleteCapitulo($id)
    {
        Capitulo::find($id)->delete();
        Session::flash('message', 'Dados removidos com sucesso');
        return Redirect('capitulo_list');
    }

    public function editarCapitulo($id)
    {
        $capitulo = Capitulo::find($id);
        $disciplina = Disciplina::lists('nome', 'id');
        return view('capitulo_editar')->with(array('capitulos' => $capitulo, 'disciplinas' => $disciplina));
    }

    public function editar(Request $request)
    {
        $id = $request->input('id');
        $disciplinas = Disciplina::find($request->input('disciplinas'));
        $capitulos = Capitulo::find($id);
        $capitulos->nome = $request->input('nome');
        $capitulos = $disciplinas->capitulos()->save($capitulos);
        Session::flash('message', 'Dados alterados com sucesso');
        return Redirect('capitulo_list');
    }


public function buscarCapituloDisciplina($id){

    $capitulos=Capitulo::where('disciplina_id',$id)->get();


    $capituloJson = "{\"capitulos\":[ ";

    foreach ($capitulos as $capitulo) {
        if (strlen($capituloJson) < 20) {
            $capituloJson .= "{\"nome\":\"$capitulo->nome\"," .
                "\"id\":\"$capitulo->id\"}";

        } else if(strlen($capituloJson)>20) {
            $capituloJson .= ",{\"nome\":\"$capitulo->nome\"," .
                "\"id\":\"$capitulo->id\"}";
        }


    }

    $capituloJson.=" ]}";

    return $capituloJson;

}


}
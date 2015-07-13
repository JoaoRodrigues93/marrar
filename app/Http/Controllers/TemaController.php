<?php  namespace App\Http\Controllers;
use App\Tema;
use App\Capitulo;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Created by PhpStorm.
 * User: Yola
 * Date: 7/10/2015
 * Time: 8:29 AM
 */

    class TemaController extends Controller{
        public function showTema(){
            return view('tema');
        }

public function inicializaTema(){

    $disciplinas = Disciplina::lists('nome', 'id');
    $capitulos=Capitulo::lists('nome','id');
    return view('tema')->with(array('disciplinas'=>$disciplinas,'capitulos'=>$capitulos));
}

        public function createTema(Request $request){
            $tema=new Tema();
            $tema->nome=$request->input('nome');
            $tema->numero_questoes=$request->input('questoes');
            $tema->conteudo=$request->input('conteudo');
            $capitulos = Capitulo::find($request -> input('capitulos'));
            $tema = $capitulos->temas()->save($tema);
            return Redirect::to('tema');




        }
    }
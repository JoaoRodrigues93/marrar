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

    class CapituloController extends Controller{

        public function showCapitulo(){
        return view("capitulo");
    }

        public function inicializaCapitulo(){
            $disciplinas = Disciplina::lists('nome', 'id');
            return view('capitulo')->with(array('disciplinas'=>$disciplinas));
        }

        public function createCapitulo(Request $request){
    $capitulo=new Capitulo();
       $capitulo->nome=$request->input('nome');
            $disciplinas=Disciplina::find($request->input('disciplinas'));
            $capitulo=$disciplinas->capitulos()->save($capitulo);
            Session::flash('message','Dados gravados com sucesso');
            return Redirect::to('capitulo');
        }




    }


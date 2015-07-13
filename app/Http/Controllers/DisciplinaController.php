<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Requests\CreateDisciplinaRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;


/**
 * Created by PhpStorm.
 * User: Yola
 * Date: 7/9/2015
 * Time: 2:53 PM
 */


class DisciplinaController extends Controller  {

    public function showDisciplina(){


        return view('disciplina');
    }


public function createDisciplina(){

$disciplina=new Disciplina();
$disciplina->nome=Input::get('nome');
    $disciplina->save();
    return Redirect::to('disciplina');

}

   /* public function store(CreateDisciplinaRequest $request){
      Disciplina::create($request->all());
        return Redirect::to('disciplina');
    }*/

public function store(Request $request){
    $this->validate($request, [
    'nome' => 'required|unique:posts|max:255',

]);}

}
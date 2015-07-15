<?php namespace App\Http\Controllers;
use App\Pergunta;

/**
 * Created by PhpStorm.
 * User: Xavier Ngomana
 * Date: 13-07-2015
 * Time: 11:59 AM
 */

class TesteController extends Controller{

public function inicializaTeste(){

    $perguntas=Pergunta::simplePaginate(1);

    return view('teste')->with('perguntas',$perguntas);
}


}
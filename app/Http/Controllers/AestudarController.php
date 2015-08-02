<?php
/**
 * Created by PhpStorm.
 * User: Nelson Alexandrino
 * Date: 31/07/2015
 * Time: 12:46
 */

namespace App\Http\Controllers;


use App\Tema;
use Illuminate\Support\Facades\View;

class AestudarController extends Controller
{

    public function aEstudarTeoria(){


        $tema = Tema::find(4);

        $conteudo = $tema->conteudo;


        return View::make('aestudarAlt')->with('conteudo',$conteudo);
    }

    public function aEstudarTeoriaAtr($titulo){
        return View::make('aestudarAlt');
    }

}
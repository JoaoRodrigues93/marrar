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

        return View::make('aestudar');
    }

    public function aEstudarTeoriaAtr($titulo){
        return View::make('aestudarAlt');
    }

}
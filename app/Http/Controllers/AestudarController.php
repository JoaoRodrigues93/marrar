<?php
/**
 * Created by PhpStorm.
 * User: Nelson Alexandrino
 * Date: 31/07/2015
 * Time: 12:46
 */

namespace App\Http\Controllers;

session_start();



use App\Tema;
use Illuminate\Support\Facades\View;

class AestudarController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function aEstudarTeoria(){

        return View::make('aestudar');
    }

    public function estudar(){
        return View::make('estudar');
    }

    public function aEstudarTeoriaAtr($titulo){
        return View::make('aestudarAlt');
    }

}
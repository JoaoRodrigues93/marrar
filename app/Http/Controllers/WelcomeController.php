<?php namespace App\Http\Controllers;

use App\Capitulo;
use App\Disciplina;
use App\Tema;
use App\Pergunta;
include 'Mobile_Detect.php';

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        /*$detect = new \Mobile_Detect();
        if ($detect->isMobile()){
            return view('inicioMobile');
        }else{*/
            return view('inicio');
//        }

    }

    public function editar_inicial()
    {
        return view('editar_inicial');
    }

}

<?php namespace App\Http\Controllers;
session_start();

use App\Dado;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estudante = Auth::user();
        $disciplinas = Disciplina::all();
        $dado = $estudante->dados()->first();
        $disciplinaActual=null;
        $disciplinasNovas=[];
        $idActual = -1;
        $i=0;

        if($dado)
            $idActual = $dado->id_ultima_disciplina;

        foreach ($disciplinas as $disciplina){
            if($idActual == $disciplina->id)
                $disciplinaActual = $disciplina;
            else {
                $disciplinasNovas[$i] = $disciplina;
                $i++;
               }
        }

        $_SESSION ['disciplinas'] = $disciplinasNovas;
        $_SESSION ['disciplinaActual'] = $disciplinaActual;
        $_SESSION ['estudante'] = $estudante;
        $_SESSION ['ranking'] =true;

        $uri = $request->path();

        if($uri=="home/maisDisciplinas") {
          return view('home', ['disciplinas' => $disciplinas]);
        }

        if ($dado) {

            return redirect("disciplinaHome/$dado->id_ultima_disciplina");

        }
        else
            return view('home',['disciplinas'=>$disciplinas]);
    }

}

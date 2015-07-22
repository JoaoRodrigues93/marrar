<?php namespace App\Http\Controllers;

use App\Capitulo;
use App\Disciplina;
use App\Tema;
use App\Pergunta;

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

        /* $disciplina = new Disciplina;
         $disciplina ->nome = 'Matemática';
         $disciplina->save();

         $capitulo = new Capitulo;
         $capitulo ->nome = 'Trigonometria';
         $capitulo ->disciplina_id =$disciplina->id;
         $capitulo ->save();


        $tema = new Tema;
         $tema -> nome = 'Cossenos';
         $tema -> conteudo = 'A função foi inicialmente desenvolvida por.';
         $tema -> numero_questoes = 15;
         $tema -> capitulo_id = $capitulo->id;
         $tema->save();

         $pergunta = new Pergunta;
         $pergunta->questao = 'Cos(90) é:';
         $pergunta->opcao1 ='1';
         $pergunta->opcao2 ='0.5';
         $pergunta->opcao3 ='0.3';
         $pergunta->opcao4 ='0.75';
         $pergunta->opcao5 ='0';
         $pergunta->opcaoCorrecta ='0';
         $pergunta ->tema_id = $tema->id;
         $pergunta->save();*/


        return view('initial');
    }

    public  function editar_inicial() {
          return view('editar_inicial');
    }

}

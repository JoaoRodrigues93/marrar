<?php namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Requests\CreateDisciplinaRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
/*use Illuminate\Http\Request;*/
use Illuminate\Support\Facades\Session;
use Request;

/**
 * Created by PhpStorm.
 * User: Yola
 * Date: 7/9/2015
 * Time: 2:53 PM
 */
class DisciplinaController extends Controller
{

    public function showDisciplina()
    {

        return view('disciplina');
    }

    public function InicializaDisciplina_list()
    {

        $disciplinas = Disciplina::all();

        return view('disciplina_list')->with('disciplinas', $disciplinas);
    }

  /*  public function createDisciplina()
    {

        $disciplina = new Disciplina();
        $disciplina->nome = Input::get('nome');
        $disciplina->save();
        Session::flash('message', 'Dados gravados com sucesso');
        return Redirect('disciplina');

    }*/

    public function createDisciplina()
    {

        $disciplina = new Disciplina();
        $data = Input::all();

        if(Request::ajax()) {
            $disciplina->nome=$data['nome'];
            $disciplina->save();
            Session::flash('message', 'Dados gravados com sucesso');
        }


    }

    public function deleteDisciplina($id)
    {
        Disciplina::find($id)->delete();
        Session::flash('message', 'Dados removidos com sucesso');
        return redirect('disciplina_list');

    }

    public function editarDisiciplina($id)
    {
        $disciplinas = Disciplina::find($id);
        return view('disciplina_editar')->with(array('disciplinas' => $disciplinas));
    }

/*    public function editar(Request $request)
    {
        $id = $request->input('id');
        $disciplinas = Disciplina::find($id);
        $disciplinas->nome = $request->Input('nome');
        $disciplinas->save();
        Session::flash('message', 'Dados alterados com sucesso');
        return Redirect('disciplina_list');

    }*/

    public function editar()
    { $data = Input::all();
        $id = $data->input('id');
        $disciplinas = Disciplina::find($id);

        if(Request::ajax()){

        $disciplinas->nome=$data['nome'];
        $disciplinas->save();
     //   Session::flash('message', 'Dados alterados com sucesso');
       // return Redirect('disciplina_list');

    }}

    /* public function store(CreateDisciplinaRequest $request){
       Disciplina::create($request->all());
         return Redirect::to('disciplina');
     }*/

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|unique:posts|max:255',

        ]);
    }
 public function showDisciplinaHome(){
     $disciplinas=Disciplina::all();
     $i=0;
     foreach($disciplinas as $disciplina){
         $i++;
     }
     return view("disciplinaHome")->with(array('disciplinas'=>$disciplinas,"i"=>$i));
 }
}
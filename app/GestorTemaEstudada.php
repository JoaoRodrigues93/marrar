<?php namespace App;

use Illuminate\Support\Facades\Auth;

class GestorTemaEstudada {
    public function guardaTemaEstudada($estudante_id,$disciplina_id,$capitulo_id,$tema_id, $tema){

        $temaEstudadas = TemasEstudadas::all()->where('estudante_id',$estudante_id)->all();
        $jaEstudada = false;
        foreach ($temaEstudadas as $temaActual){
            if($temaActual->tema_id == $tema_id && $temaActual->estudante_id == $estudante_id) {
                $jaEstudada = true;
                TemasEstudadas::increment('numeroVezesClickado');
            }

        }

        if(!$jaEstudada) {
            $disciplinaEstudada = \App\TemasEstudadas::firstOrCreate(['estudante_id' => $estudante_id,
                'disciplina_id' => $disciplina_id, 'capitulo_id' => $capitulo_id, 'tema_id' => $tema_id, 'tema' => $tema, 'numeroVezesClickado' => 1]);
            $disciplinaEstudada->save();
        }
    }

    public function temaEstudadas(){
        $estudante = Auth::user();
        $disciplina=$_SESSION ['disciplinaActual'];
        $temaEstudadas = TemasEstudadas::orderBy('updated_at', 'desc')->where('disciplina_id',$disciplina->id)->where('estudante_id',$estudante->id)->take(3)->get();
        return $temaEstudadas;
    }

}
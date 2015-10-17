<?php namespace App;

use Illuminate\Support\Facades\Auth;

class GestorTemaEstudada {
    public function guardaTemaEstudada($estudante_id,$disciplina_id,$tema_id, $tema){

        $temaEstudadas = TemasEstudadas::all()->where('estudante_id',$estudante_id)->all();
        $jaEstudada = false;
        foreach ($temaEstudadas as $temaActual){
            if($temaActual->tema_id == $tema_id && $temaActual->estudante_id == $estudante_id) {
                $jaEstudada = true;
                $disc = TemasEstudadas::increment('numeroVezesClickado');
            }

        }

        if(!$jaEstudada) {
            $disciplinaEstudada = \App\TemasEstudadas::firstOrCreate(['estudante_id' => $estudante_id,
                'disciplina_id' => $disciplina_id, 'tema_id' => $tema_id, 'tema' => $tema, 'numeroVezesClickado' => 1]);
            $disciplinaEstudada->save();
        }
    }

    public function temaEstudadas(){
        $estudante = Auth::user();
        $temaEstudadas = TemasEstudadas::orderBy('updated_at', 'desc')->take(3)->get();
        return $temaEstudadas;
    }

}
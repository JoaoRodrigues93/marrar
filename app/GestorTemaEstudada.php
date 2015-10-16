<?php namespace App;

use Illuminate\Support\Facades\Auth;

class GestorTemaEstudada {
    public function guardaTemaEstudada($estudante_id,$disciplina_id,$tema_id, $tema){

        $temaEstudadas = TemasEstudadas::all()->where('estudante_id',$estudante_id)->all();
        $jaEstudada = false;
        foreach ($temaEstudadas as $temaActual){
            if($temaActual->tema_id == $tema_id && $temaActual->estudante_id == $estudante_id)
                $jaEstudada = true;
        }

        if(!$jaEstudada) {
            $dateTime = getdate();
            $dia = $dateTime['mday'];
            $mes = $dateTime['mon'];
            $ano = $dateTime['year'];

            $dia = ($dia > 9) ? $dia : "0" . $dia;
            $mes = ($mes > 9) ? $mes : "0" . $mes;

            $dataRealizacao = $ano . "-" . $mes . "-" . $dia;

            $disciplinaEstudada = \App\TemasEstudadas::firstOrCreate(['estudante_id' => $estudante_id,
                'disciplina_id' => $disciplina_id, 'tema_id' => $tema_id, 'tema' => $tema, 'ultimo_dia_de_estudo' => $dataRealizacao]);

            $disciplinaEstudada->ultimo_dia_de_estudo = $dataRealizacao;
            $disciplinaEstudada->save();
        }
    }

    public function temaEstudadas(){
        $estudante = Auth::user();
        $temaEstudadas = TemasEstudadas::all()->where('estudante_id',$estudante->id)
              ->all();
//            ->orderBy('R.cr_id', 'asc')
//            ->take(3);

        return $temaEstudadas;
    }

}
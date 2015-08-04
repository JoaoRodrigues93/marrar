<?php namespace App;

use Illuminate\Support\Facades\Auth;

class GestorDisciplinaEstudada {
    public function guardaDisciplinaEstudada($estudante_id,$disciplina_id,$disciplina){

        $disciplinaEstudadas = DisciplinaEstudada::all()->where('estudante_id',$estudante_id)->all();
        $jaEstudada = false;
        foreach ($disciplinaEstudadas as $disciplinaActual){
            if($disciplinaActual->disciplina_id == $disciplina_id && $disciplinaActual->estudante_id==$estudante_id)
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

            $disciplinaEstudada = \App\DisciplinaEstudada::firstOrCreate(['estudante_id' => $estudante_id,
                'disciplina_id' => $disciplina_id, 'disciplina' => $disciplina, 'ultimo_dia_de_estudo' => $dataRealizacao]);

            $disciplinaEstudada->ultimo_dia_de_estudo = $dataRealizacao;
            $disciplinaEstudada->save();
        }
    }

    public function disciplinaEstudadas(){
        $estudante = Auth::user();
        $disciplinaEstudadas = DisciplinaEstudada::all()->where('estudante_id',$estudante->id)->all();

        return $disciplinaEstudadas;
    }

}
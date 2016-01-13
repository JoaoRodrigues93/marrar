<?php namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GestorTesteFeito {
    public function guardaTesteFeito ($disciplina_id,$estudante_id,$nota,$nomeEstudante,$nomeDisciplina,
                                      $capitulo,$capitulo_id){
        $dateTime = getdate();
        $dia = $dateTime['mday'];
        $mes = $dateTime['mon'];
        $ano = $dateTime['year'];

        $dia = ($dia>9)? $dia : "0".$dia;
        $mes = ($mes>9)? $mes : "0".$mes;

        $dataRealizacao = $ano."-".$mes."-".$dia;

        $testeFeito = new \App\TesteFeito();
        $testeFeito->dataRealizacao = $dataRealizacao;
        $testeFeito->disciplina_id = $disciplina_id;
        $testeFeito->estudante_id = $estudante_id;
        $testeFeito->estudante = $nomeEstudante;
        $testeFeito->disciplina = $nomeDisciplina;
        $testeFeito->capitulo_id = $capitulo_id;
        $testeFeito->capitulo = $capitulo;
        $testeFeito->nota = $nota;
        $testeFeito->save();
    }

    public function testesFeitos (){
        $estudante = Auth::user();

        $disciplina=$_SESSION ['disciplinaActual'];
        $testesFeitos = TesteFeito::orderBy('updated_at', 'desc')->where ('disciplina_id',$disciplina->id)->where('estudante_id',$estudante->id)->take(4)->get();
//        $testesFeitos = TesteFeito::orderBy('id', 'desc')

        //$testesFeitos = TesteFeito::groupBy('capitulo')
//            ->where('estudante_id',$estudante->id);
//            //->max('nota')
//
        return $testesFeitos;
    }
}
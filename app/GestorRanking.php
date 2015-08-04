<?php namespace App;

use Illuminate\Support\Facades\Auth;

class GestorRanking {
    public function guardaRanking($disciplina_id,$estudante_id,$nota,$nomeEstudante,$nomeDisciplina){
        $dateTime = getdate();
        $dia = $dateTime['mday'];
        $mes = $dateTime['mon'];
        $ano = $dateTime['year'];

        $dia = ($dia>9)? $dia : "0".$dia;
        $mes = ($mes>9)? $mes : "0".$mes;

        $dataRealizacao = $ano."-".$mes."-".$dia;

        $ranking = new \App\Ranking();
        $ranking->dataRealizacao = $dataRealizacao;
        $ranking->disciplina_id = $disciplina_id;
        $ranking->estudante_id = $estudante_id;
        $ranking->estudante = $nomeEstudante;
        $ranking->disciplina = $nomeDisciplina;
        $ranking->nota = $nota;
        $ranking->save();
    }

    public function rankingDisciplinaActual () {
        $dateTime = getdate();
        $dia = $dateTime['mday'];
        $mes = $dateTime['mon'];
        $ano = $dateTime['year'];

        $dia = ($dia>9)? $dia : "0".$dia;
        $mes = ($mes>9)? $mes : "0".$mes;

        $dataRealizacao = $ano."-".$mes."-".$dia;

        $disciplina = $_SESSION['disciplinaActual'];
        $estudante = Auth::user();
        $posicaoActual =0;
        $posicao =-1;
        $rankings = Ranking::all()->where('disciplina_id',$disciplina->id)->where('dataRealizacao',$dataRealizacao);


        foreach($rankings as $ranking){
            $posicao++;

            if($ranking->estudante_id = $estudante->id)
                $posicao = $posicaoActual;
        }

        return ["posicao"=>$posicao,"ranking"=>$rankings];

    }

}
<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExameColectivo extends Model {

    public function estudantes (){
        return $this->belongsToMany('App\Estudante','estudantes_exame_colectivos');
    }

    public function perguntas (){
        return $this->belongsToMany('App\Pergunta','exame_colectivo_perguntas')->withTimestamps();
    }
}

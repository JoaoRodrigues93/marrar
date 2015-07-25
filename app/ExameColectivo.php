<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExameColectivo extends Model {

    public function estudantes (){
        return $this->belongsToMany('App\Estudante');
    }

    public function perguntas (){
        return $this->belongsToMany('App\Pergunta')->withTimestamps();
    }
}

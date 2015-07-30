<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model {

	public function tema (){
        return $this->belongsTo('App\Tema');
    }

    public function examescolectivos(){
        return $this->belongsToMany('App\ExameColectivo','exame_colectivo_perguntas');
    }

}

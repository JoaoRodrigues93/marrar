<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model {

	public function capitulo (){
        return $this->belongsTo('App\Capitulo');
    }

    public function perguntas () {
        return $this -> hasMany('App\Pergunta');
    }

    public function perguntaimagens () {
        return $this -> hasMany('App\PerguntaImagem');
    }

}

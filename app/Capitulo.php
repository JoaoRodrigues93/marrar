<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model {
    //oneToMany
    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }

    public function  temas () {
        return $this ->hasMany('App\Tema');
    }

    public function  testes (){
        $this->hasMany('App\Teste');
    }

}

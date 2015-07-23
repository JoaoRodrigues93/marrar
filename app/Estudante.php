<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model {

    public function nivel () {
        return $this->hasOne('App\Nivel');
    }

    public  function examesnormals (){
        return $this->hasMany('App\ExameNormal');
    }

    public function testes (){
        return $this->hasMany('App\Teste');
    }

    public function examescolectivos (){
        $this->belongsToMany('App\ExameColectivos')->withPivot('duracao','nota','respostasCertas','respostasErradas');
        return $this->belongsToMany('App\ExameColectivos')->withTimestamps();
    }

}

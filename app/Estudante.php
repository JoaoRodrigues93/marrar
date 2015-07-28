<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Estudante extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

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

    public function testemunhos (){
        return $this->hasMany('App\Testemunho');
    }

    public function dados (){
        return $this->hasMany('App\Dado');
    }


    protected $hidden = ['password', 'remember_token'];
}

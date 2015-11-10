<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Estudante extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $fillable = ['nome','apelido','username','email','password'];

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

        return $this->belongsToMany('App\ExameColectivo','estudantes_exame_colectivos')->withPivot('duracao','nota','respostasCertas','respostasErradas')->withTimestamps();
    }

    public function testemunhos (){
        return $this->hasMany('App\Testemunho');
    }

    public function dados (){
        return $this->hasMany('App\Dado');
    }

    protected $table = 'estudantes';

    protected $hidden = ['password', 'remember_token'];
}

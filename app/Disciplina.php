<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model {

    //ManyToOne
    public function capitulos(){
        return $this->hasMany('App\Capitulo');
    }

}

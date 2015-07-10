<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model {

	public function tema (){
        return $this->belongsTo('App\Tema');
    }

}

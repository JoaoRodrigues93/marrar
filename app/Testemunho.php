<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Testemunho extends Model {

	public function estudante(){
        $this->belongsTo('App\Estudante');
    }

}

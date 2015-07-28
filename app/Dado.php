<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dado extends Model {

	public function estudante(){
        return $this->belongsTo('App\Estudante');
    }

}

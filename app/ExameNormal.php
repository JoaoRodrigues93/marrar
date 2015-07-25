<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExameNormal extends Model {

	public function estudante () {
        return $this->belongsTo('App\Estudante');
    }

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinaEstudada extends Model {

	protected $fillable = ['disciplina','estudante_id','disciplina_id','ultimo_dia_de_estudo'];

}

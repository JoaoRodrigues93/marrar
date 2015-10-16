<?php namespace App;
/**
 * Created by PhpStorm.
 * User: Severino Mateus Jr
 * Date: 10/16/2015
 * Time: 4:34 PM
 */

use Illuminate\Database\Eloquent\Model;

class TemasEstudadas extends Model {

    protected $fillable = ['tema','estudante_id','disciplina_id','tema_id','ultimo_dia_de_estudo'];

}
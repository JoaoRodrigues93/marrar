<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasEstudadas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temas_estudadas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tema');
			$table->integer('tema_id')->unsigned();
			$table->integer('disciplina_id')->unsigned();
			$table->date('ultimo_dia_de_estudo');
			$table->integer('estudante_id')->unsigned();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}


}

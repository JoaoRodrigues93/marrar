<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExameColectivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exame_colectivos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('dataCriacao');
            $table->integer('tempoRealizacao')->unsigned();
            $table->smallInteger('nrPerguntas')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->integer('texto_id');
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
		Schema::drop('exame_colectivos');
	}

}

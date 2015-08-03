<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExameNormalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exame_normals', function(Blueprint $table)
		{
			$table->increments('id');
            $table->dateTime('dataRealizacao');
            $table->integer('duracao')->unsigned();
            $table->decimal('nota',4,2);
            $table->smallInteger('respostasCertas')->unsigned();
            $table->smallInteger('respostasErradas')->unsigned();
            $table->smallInteger('nrPerguntas')->unsigned();
            $table->integer('estudante_id')->unsigned();
            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
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
		Schema::drop('exame_normals');
	}

}

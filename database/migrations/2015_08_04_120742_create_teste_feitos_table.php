<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesteFeitosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teste_feitos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('disciplina');
            $table->integer('disciplina_id')->unsigned();
            $table->string('estudante');
            $table->integer('estudante_id')->unsigned();
            $table->integer('capitulo_id')->unsigned();
            $table->string('capitulo');
            $table->decimal('nota',4,2);
            $table->date('dataRealizacao');
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
		Schema::drop('teste_feitos');
	}

}

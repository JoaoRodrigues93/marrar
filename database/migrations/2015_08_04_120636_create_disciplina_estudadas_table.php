<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaEstudadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disciplina_estudadas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('disciplina');
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
		Schema::drop('disciplina_estudadas');
	}

}

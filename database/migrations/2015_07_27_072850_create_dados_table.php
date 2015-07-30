<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dados', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_ultima_disciplina');
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
		Schema::drop('dados');
	}

}

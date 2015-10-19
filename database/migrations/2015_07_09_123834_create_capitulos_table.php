<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapitulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('capitulos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome');
            $table->integer('disciplina_id')->unsigned();
            $table->softDeletes();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
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
		Schema::drop('capitulos');
	}

}

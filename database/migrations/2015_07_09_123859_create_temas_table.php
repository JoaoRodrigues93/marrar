<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('conteudo');
            $table->string('nome')->unique();
            $table->smallInteger('numero_questoes');
            $table->integer('capitulo_id')->unsigned();
            $table->softDeletes();
            $table->foreign('capitulo_id')->references('id')->on('capitulos')->onDelete('cascade');
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
		Schema::drop('temas');
	}

}

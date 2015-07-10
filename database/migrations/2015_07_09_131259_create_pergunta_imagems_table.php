<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntaImagemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pergunta_imagems', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('questao');
            $table->string('opcao1');
            $table->string('opcao2');
            $table->string('opcao3');
            $table->string('opcao4');
            $table->string('opcao5');
            $table->string('opcaoCorrecta');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4');
            $table->string('img5');
            $table->string('imgCorrecta');
            $table->integer('tema_id')->unsigned();
            //$table->foreign('tema_id')->references('id')->on('tema');
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
		Schema::drop('pergunta_imagems');
	}

}

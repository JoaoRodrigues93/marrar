<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perguntas', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
			$table->increments('id');
            $table->longText('questao');
            $table->longText('opcao1');
            $table->longText('opcao2');
            $table->longText('opcao3');
            $table->longText('opcao4');
            $table->longText('opcao5');
            $table->integer('tema_id')->unsigned();
            $table->softDeletes();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
            $table->longText('opcaoCorrecta');
            $table->boolean('imagem');
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
		Schema::drop('perguntas');
	}

}

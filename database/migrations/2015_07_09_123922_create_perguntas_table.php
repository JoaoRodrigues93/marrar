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
            $table->string('questao');
            $table->string('opcao1');
            $table->string('opcao2');
            $table->string('opcao3');
            $table->string('opcao4');
            $table->string('opcao5');
            $table->integer('tema_id')->unsigned();
            $table->softDeletes();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
            $table->string('opcaoCorrecta');
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

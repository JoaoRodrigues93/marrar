<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExameColectivoPerguntas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('exame_colectivo_perguntas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('exame_colectivo_id')->unsigned();
            $table->integer('pergunta_id');
            $table->foreign('exame_colectivo_id')->references('id')->on('exame_colectivos')->onDelete('update');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('update');
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
		Schema::dropIfExists('exame_colectivo_perguntas');
	}

}

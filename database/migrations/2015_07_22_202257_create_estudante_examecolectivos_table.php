<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudanteExamecolectivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('estudantes_exame_colectivos', function(Blueprint $table)
        {
         $table->integer('estudante_id')->unsigned();
         $table->integer('exame_colectivo_id')->unsigned();
         $table->integer('duracao')->unsigned();
         $table->decimal('nota',4,2);
         $table->smallInteger('respostasCertas')->unsigned();
         $table->smallInteger('respostasErradas')->unsigned();
         $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
         $table->foreign('exame_colectivo_id')->references('id')->on('exame_colectivos')->onDelete('cascade');
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
        Schema::drop('nivels');
	}

}

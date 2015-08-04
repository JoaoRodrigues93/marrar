<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rankings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('disciplina');
            $table->integer('disciplina_id')->unsigned();
            $table->string('estudante');
            $table->integer('estudante_id')->unsigned();
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
		Schema::drop('rankings');
	}

}

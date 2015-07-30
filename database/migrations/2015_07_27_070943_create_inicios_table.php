<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIniciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inicios', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('sloganRegisto');
            $table->string('sloganTexto');
            $table->text('aprender');
            $table->text('funciona1');
            $table->text('funciona2');
            $table->text('funciona3');
            $table->text('testemunho1');
            $table->text('testemunho2');
            $table->text('testemunho3');
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
		Schema::drop('inicios');
	}

}

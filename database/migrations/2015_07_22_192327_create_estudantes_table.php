<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estudantes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome');
            $table->string('apelido');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('telefone');
            $table->string('foto');
            $table->string('cidade');
            $table->string('escola');
            $table->date('dataNascimento');
            $table->string('sexo');
            $table->string('descricao');
            $table->string('type');
            $table->rememberToken();
            $table->softDeletes();
			$table->timestamps();;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estudantes');
	}

}

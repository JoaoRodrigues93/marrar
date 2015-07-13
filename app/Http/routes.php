<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('pergunta', 'PerguntaController@InicializaPergunta');
Route::get('disciplina','DisciplinaController@showDisciplina');

Route::get('capitulo','CapituloController@showCapitulo');

Route::get('tema','TemaController@showTema');

Route::post('registar-pergunta','PerguntaController@registaPerguntas');

Route::get('perguntaview', 'PerguntaController@InicializaPerguntaView');

Route::get('/perguntaview/remover/{id}', 'PerguntaController@RemoverPergunta');
Route::get('/perguntaview/editar/{id}', 'PerguntaController@Editar');

Route::post('editar-pergunta','PerguntaController@EditarPergunta');

Route::get('teste','TesteController@inicializaTeste');Route::post('editar-pergunta','PerguntaController@EditarPergunta');

Route::get('exame','ExameController@show');
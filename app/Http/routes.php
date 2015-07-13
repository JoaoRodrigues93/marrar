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
Route::post('gravar-disciplina','DisciplinaController@createDisciplina');

Route::get('capitulo','CapituloController@inicializaCapitulo');
Route::post('capitulo','CapituloController@createCapitulo');

Route::get('tema','TemaController@inicializaTema');

Route::post('tema','TemaController@createTema');

Route::post('pergunta','PerguntaController@registaPerguntas');

Route::post('registar-pergunta','PerguntaController@registaPerguntas');

Route::get('perguntaview', 'PerguntaController@InicializaPerguntaView');

Route::get('/perguntaview/remover/{id}', 'PerguntaController@RemoverPergunta');
Route::get('/perguntaview/editar/{id}', 'PerguntaController@Editar');

Route::post('editar-pergunta','PerguntaController@EditarPergunta');
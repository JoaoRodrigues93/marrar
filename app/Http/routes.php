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

Route::get('disciplina','DisciplinaController@showDisciplina');
Route::post('gravar-disciplina','DisciplinaController@createDisciplina');
Route::get('disciplina_list','DisciplinaController@inicializaDisciplina_list');
Route::get('/disciplina_list/editar/{id}','DisciplinaController@editarDisiciplina');
Route::get('/disciplina_list/remover/{id}','DisciplinaController@deleteDisciplina');
Route::post('editar-disciplina','DisciplinaController@editar');



Route::get('capitulo','CapituloController@inicializaCapitulo');
Route::post('capitulo','CapituloController@createCapitulo');
Route::get('capitulo_list','CapituloController@inicializaCapitulo_list');
Route::get('/capitulo_list/editar/{id}','CapituloController@editarCapitulo');
Route::get('/capitulo_list/remover/{id}','CapituloController@deleteCapitulo');
Route::post('editar-capitulo','CapituloController@editar');
Route::get('tema','TemaController@inicializaTema');
Route::post('tema','TemaController@createTema');
Route::get('tema_list','TemaController@inicializaTema_list');
Route::get('/tema_list/editar/{id}','TemaController@editarTema');
Route::get('/tema_list/remover/{id}','TemaController@deleteTema');
Route::post('editar-tema','TemaController@editar');
Route::get('pergunta', 'PerguntaController@InicializaPergunta');
Route::post('registar-pergunta','PerguntaController@registaPerguntas');
Route::get('perguntaview', 'PerguntaController@InicializaPerguntaView');
Route::get('/perguntaview/remover/{id}', 'PerguntaController@RemoverPergunta');
Route::get('/perguntaview/editar/{id}', 'PerguntaController@Editar');
Route::post('editar-pergunta','PerguntaController@EditarPergunta');
Route::get('/teste/{capitulo}/{idCapitulo}','TesteController@inicializaTeste');Route::post('editar-pergunta','PerguntaController@EditarPergunta');
Route::get('examenormal','ExameController@show');
Route::post('examenormal','ExameController@corrigeExame');

Route::get('registar',function(){
    return View::make('registar');
});
Route::get('login',function(){
    return View::make('login');
});
Route::get('perfil',function(){
    return View::make('perfil');
});

Route::get('perfil', 'PerfilController@buscarPerfil');
Route::get('editar-perfil', 'PerfilController@buscarEditPerfil');
Route::post('edito-perfil','PerfilController@HabilitarEditarPerfil');
Route::post('edita-perfil','PerfilController@EditarPerfil');

Route::get('inicio',function(){
    return View::make('inicio');
});

//metodos onde se chamam as perguntas----
Route::get('buscar-teste','PerguntaController@buscarTeste');
Route::get('buscar-exame','PerguntaController@buscarExame');
Route::get('buscar-exercicios','PerguntaController@buscarExercicios');

Route::get('exercicio/{idCapitulo}/{tema}','ExercicioController@show');
Route::get('exercicio/resposta','ExercicioController@respostaCorrecta');
Route::get('proximo','ExercicioController@respostaProximo');

Route::get('teste-validacao','TesteController@validaTeste');

Route::get('capitulo-combobox/{id}','CapituloController@buscarCapituloDisciplina');
Route::get('tema-combobox/{id}','TemaController@buscarTemaCapitulo');


Route::get('capituloHome','CapituloController@showHome');

Route::get('editar_inicial', 'WelcomeController@editar_inicial');
Route::get('disciplinaHome',"DisciplinaController@showDisciplinaHome");
Route::get('disciplinaHome/{id}','CapituloController@showCapituloHome');

Route::get('capitulo-validacao/{id}',"CapituloController@capituloTemaJason");


Route::get('editar_inicial', 'WelcomeController@editar_inicial');
Route::post('login','Auth\AuthController@post');

Route::get('login/{provider}','Auth\AuthController@redirectToProvider');
Route::get('login/done/{provider}','Auth\AuthController@handleProviderCallback');
Route::get('editar_inicial', 'WelcomeController@editar_inicial');

Route::get('aestudar', 'AestudarController@aEstudarTeoria');

Route::get('inicioAlt', function(){
    return View::make('initial');
});

Route::get('welcome',function (){
    return View('inicio');

});

Route::post('/','Auth\AuthController@post');
Route::get('auth/logout','Auth\AuthController@logout');
Route::post('/teste/{cap}/{id}',"TesteController@gravaTeste");

Route::get('/examenormal','ExameController@showNormal');
Route::get('/examecolectivo','ExameController@showColectivo');
Route::post('examenormal','ExameController@corrigeExame');
Route::post('examecolectivo','ExameController@corrigeExame');
Route::get('home/maisDisciplinas','HomeController@index');

Route::get('teoria.html','ExercicioController@teoria');

Route::get('capituloHomeMobile','CapituloController@showHomeMobile');
Route::get('/capituloHomeMobile/{id}','TemaController@showTemaMobile');
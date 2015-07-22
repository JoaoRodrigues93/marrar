<?php
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
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
Route::get('teste','TesteController@inicializaTeste');Route::post('editar-pergunta','PerguntaController@EditarPergunta');
Route::get('exame','ExameController@show');
Route::get('registar',function(){
    return View::make('registar');
});
Route::get('login',function(){
    return View::make('login');
});
Route::get('perfil',function(){
    return View::make('perfil');
});


//metodos onde se chamam as perguntas----
Route::get('buscar-teste','PerguntaController@buscarTeste');
Route::get('buscar-exame','PerguntaController@buscarExame');
Route::get('buscar-exercicios','PerguntaController@buscarExercicios');
Route::get('exercicio','ExercicioController@showJogo');
Route::post('exercicio','ExercicioController@doPergunta');
Route::get('teste-validacao','TesteController@validaTeste');
Route::post('exame','ExameController@corrigeExame');
Route::get('teste-validacao','TesteController@validaTeste');

Route::get('capitulo-combobox/{id}','CapituloController@buscarCapituloDisciplina');
Route::get('tema-combobox/{id}','TemaController@buscarTemaCapitulo');

Route::get('capituloHome',function(){

    return view('capituloHome');

});

Route::get('editar_inicial', 'WelcomeController@editar_inicial');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
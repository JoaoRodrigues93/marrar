<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

    'facebook'=> [
        'client_id' =>'873662779355317',
        'client_secret'=>'0541bebdbf58c9f4e69c0f44b5a3908c',
        'redirect'=>'http://marrar.eu2.frbit.net/login/done/facebook',
    ],

    'google'=>[
        'client_id' =>'68582577746-91q66jb77chnqsia0uuoelf6nb7uvn35.apps.googleusercontent.com',
        'client_secret'=>'5Dcj2-SjVpyTSczDANDMidow',
        'redirect'=>'http://localhost:8000/login/done/google',
    ],

];

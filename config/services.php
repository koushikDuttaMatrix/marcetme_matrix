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
		'model'  => 'App\User',
		'secret' => '',
	],
	'facebook' => [
    'client_id' => '1124656420891932',
    'client_secret' => '7cfd009c4bc21bce91e066768ef9a6d6',
    'redirect' => 'http://testyourprojects.net/matrix/project/MarcetMe/public/auth-facebook-callback',
],
'google' => [
    'client_id' => '1052347544165-c8un8mskahd4reg41b5e9u6q19lfaqdg.apps.googleusercontent.com',
    'client_secret' => 'tInBcpCXrNt3CyCZkxnb66jV',
    'redirect' => 'http://testyourprojects.net/matrix/project/MarcetMe/public/auth-google-callback',
],

];

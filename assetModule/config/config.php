<?php
return [
	'db' => [
		// NOTE: need to change DSN as per the database used
		'dsn' => 'mysql:host=localhost;dbname=phpcourse',
		'usr' => 'vagrant',
		'pwd' => 'vagrant',
		'opts' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	]
];

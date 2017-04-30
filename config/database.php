<?php

$host = getenv('IP');
$username = getenv('C9_USER');

$DB_DSN = "mysql:dbname=c9;host=$host;charset=UTF8";
$DB_USER = $username;
$DB_PASSWORD = '';
$DB_OPTS = [
	PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC
	];

?>
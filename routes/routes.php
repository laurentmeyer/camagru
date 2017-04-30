<?php

require_once(dirname(__FILE__) . '/../app/controllers/users_controller.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if (preg_match('|^/users/new|', $uri) && $method == 'GET') {
	UsersController::new_user($_GET);
} else if (preg_match('|^/users/create|', $uri) && $method == 'POST') {
	UsersController::create_user($_POST);
} else if (preg_match('|^/users/edit|', $uri) && $method == 'GET') {
	//
} else if (preg_match('|^/users/update|', $uri) && $method == 'PATCH') {
	//
} else {
	include(dirname(__FILE__) . '/../public/404.php');
}


?>
<?php


//var_dump($_SERVER['POST']);

$exp = explode('/', trim($_SERVER['REQUEST_URI']));

if ($exp[1] == 'users') {
	include(dirname(__FILE__) . '/users.php');
} else if ($exp[1] == 'sessions') {
	include(dirname(__FILE__) . '/sessions.php');
} else if ($exp[1] == 'images') {
	include(dirname(__FILE__) . '/images.php');
} else if ($exp[1] == 'test') {
	include(dirname(__FILE__) . '/../public/test.php');
} else {
	include(dirname(__FILE__) . '/../public/404.php');
}

?>
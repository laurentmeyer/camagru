<?php

//var_dump($_POST);
$exp = explode('/', trim($_SERVER['REQUEST_URI']));

if ($exp[2] == 'create') 
{
	include(dirname(__FILE__) . '/../public/users_create.php');
}
else
{
	include(dirname(__FILE__) . '/../public/404.php');
}

?>
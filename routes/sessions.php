<?php

//var_dump($_POST);
$exp = explode('/', trim($_SERVER['REQUEST_URI']));

if ($exp[2] == 'create') 
{
	include(dirname(__FILE__) . '/../public/sessions_create.php');
}
else if ($exp[2] == 'destroy') 
{
	include(dirname(__FILE__) . '/../public/sessions_destroy.php');
}
else
{
	include(dirname(__FILE__) . '/../public/404.php');
}

?>
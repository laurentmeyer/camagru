<?php

require_once(dirname(__FILE__) . '/../classes/User.class.php');
session_start();

//var_dump($_SERVER);

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if (!empty($_SESSION['user'])) {
		header('Location: /');
		return ;
	}
	if (!empty($_SESSION['errors'])) {
		var_dump($_SESSION['errors']);
	}
echo <<<EOT
<h1>Register</h1>
<form action="/users/create" method="post">
	Login:<br>
	<input type="text" name="login" autofocus="on"><br>
	Email:<br>
	<input type="text" name="email"><br>
	Password:<br>
	<input type="password" name="passwd"><br>
	Confirm password:<br>
	<input type="password" name="passwdconfirm"><br>
	<input type="submit" value="OK">
</form>
EOT;
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['errors'] = null;
	if (empty($_POST['email'])) {
		$_SESSION['errors'][] = "Email must be present";
	}
	if (empty($_POST['login'])) {
		$_SESSION['errors'][] = "Login must be present";
	}
	if (empty($_POST['passwd'])) {
		$_SESSION['errors'][] = "Password must be present";
	}
	if ($_POST['passwd'] != $_POST['passwdconfirm']) {
		$_SESSION['errors'][] = "Password confirmation does not match";
	}
	$user = new User (array('login' => $_POST['login'],
							'email' => $_POST['email'],
							'password' => $_POST['passwd']));
	if (empty($_SESSION['errors'])) {
		$_SESSION['user'] = serialize($user);
		header('Location: /');
	}
	else {
		header('Location: /users/create');
	}
}


?>

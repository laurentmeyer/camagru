<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if (!empty($_SESSION['user'])) {
		header('Location: /');
		return ;
	}
	if (!empty($_SESSION['errors'])) {
		var_dump($_SESSION['errors']);
		unset($_SESSION['errors']);
	}
echo <<<EOT
<h1>Login</h1>
<form action="/sessions/create" method="post">
	Email:<br>
	<input type="text" name="email"><br>
	Password:<br>
	<input type="password" name="passwd"><br>
	<input type="submit" value="OK">
</form>
EOT;
return ;
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['errors'] = null;
	if (empty($_POST['email'])) {
		$_SESSION['errors'][] = "Email must be present";
	}
	if (empty($_POST['passwd'])) {
		$_SESSION['errors'][] = "Password must be present";
	}
	if (!empty($_SESSION['errors'])) {
		$_SESSION['user'] = serialize($user);
		header('Location: /sessions/create');
	}
	$user = new User (array());
	if (empty($_SESSION['errors'])) {
		$_SESSION['user'] = serialize($user);
		header('Location: /');
		return ;
	}
	else {
		header('Location: /users/create');
		return ;
	}
}



?>
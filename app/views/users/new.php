<?php

session_start();
require_once(dirname(__FILE__) . '/../layout/header.php');
include_once(dirname(__FILE__) . '/../layout/errors.php');

echo <<<HTML
<h1>Register</h1>
<form action="/users/create" method="post">
	Login:<br>
	<input type="text" name="login" value="$params[login]" autofocus="on"><br>
	Email:<br>
	<input type="text" name="email" value="$params[email]"><br>
	Password:<br>
	<input type="password" name="password"><br>
	Confirm password:<br>
	<input type="password" name="pwconfirm"><br>
	<input type="submit" value="OK">
</form>
HTML;

require_once(dirname(__FILE__) . '/../layout/footer.php');

?>

<?php

echo <<<EOT
<h1>Register</h1>
<form action="/users.php" method="post">
	Email:<br>
	<input type="text" name="email"><br>
	Password:<br>
	<input type="password" name="passwd"><br>
	Confirm password:<br>
	<input type="password" name="passwdconfirm"><br>
	<input type="submit" value="OK">
</form>
EOT


?>

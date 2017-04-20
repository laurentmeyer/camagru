<?php

include_once('src/auth.php');
session_start();

if (($user = is_authenticated_user())) {
	    echo "<a href=\"account.php\">$user</a><br/>";
		echo "<a href=\"logout.php\">Logout</a><br/>";
} else {
	    echo '<a href="register.php">Register</a><br/>';
}

echo <<<HERE
coucou<br />
bouzin<br />
HERE;
?>

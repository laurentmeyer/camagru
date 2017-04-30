<?php

include_once(dirname(__FILE__) . '/../src/auth.php');
session_start();

if (($user = is_authenticated_user())) {
	    echo "<a href=\"account.php\">$user</a><br/>";
		echo "<a href=\"logout.php\">Logout</a><br/>";
} else {
	    echo '<a href="register.php">Register</a><br/>';
}
echo '<hr>';

?>

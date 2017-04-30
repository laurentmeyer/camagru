<?php

include_once(dirname(__FILE__) . '/../../helpers/sessions_helper.php');

echo '<a href="/">Home</a><br/>';
if (($user = is_authenticated_user())) {
		echo "<a href=\"/sessions/destroy\">Logout</a><br/>";
} else {
	    echo '<a href="/users/new">Register</a><br/>';
}
echo '<hr>';

?>

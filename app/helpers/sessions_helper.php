<?php

function is_authenticated_user() {
	if (!$_SESSION['user'] || $_SESSION['user'] === '') {
		return (False);
	} else {
		return ($_SESSION['user']);
	}
}

?>

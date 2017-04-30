<?php

if (!empty($_SESSION['flash'])) {
	foreach ($_SESSION['flash'] as $type)
		foreach ($type as $message)
			echo "<div class=\"alert alert-$type\">$message</div>";
	unset($_SESSION['flash']);
}

?>
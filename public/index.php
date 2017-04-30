<?php

require_once(dirname(__FILE__) . '/header.php');

echo "Debut du main<br />";
echo <<<FORM
<form action="/users/toto" method="POST">
	<input type="text" name="thetext" value="thevalue">
	<input type="submit" value="test1234">
</form>
FORM;

$files = array_diff(scandir(dirname(__FILE__) . '/../assets/'), array('..', '.'));
foreach ($files as $file)
    echo "<img src=\"/assets/$file\"><br/>";

echo "<br />Fin du main<br />";

require_once('footer.php');

?>

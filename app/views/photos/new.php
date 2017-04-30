<?php

session_start();
require_once(dirname(__FILE__) . '/../layout/header.php');
include_once(dirname(__FILE__) . '/../layout/errors.php');
echo '<hr>';


echo "Debut du main<br />";
echo <<<FORM
<form action="/users/new" method="POST">
	<input type="text" name="thetext" value="thevalue">
	<input type="submit" value="test1234">
</form>
FORM;

$path = "/app/assets/images";
$files = array_diff(scandir(dirname(__FILE__) . '/../../..' . $path), array('..', '.'));
foreach ($files as $file)
    echo "<img src=\"$path/$file\"><br/>";

echo "<br />Ca pourrait etre grave simplifié...<br />";
echo "<br />Fucking UTF8<br />";
echo "<br />Fin du main<br />";

require_once(dirname(__FILE__) . '/../layout/footer.php');

?>

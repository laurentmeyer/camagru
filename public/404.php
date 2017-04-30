<?php

session_start();

header("HTTP/1.0 404 Not Found");
echo "The requested page does not exist";
var_dump($_SERVER);
var_dump($_SESSION);
exit();

?>
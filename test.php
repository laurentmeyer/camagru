<?php

//require_once(dirname(__FILE__) . '/src/query.php');
require_once(dirname(__FILE__) . '/config/database.php');
require_once(dirname(__FILE__) . '/classes/User.class.php');


$new = new User (array ('login' => 'toto', 'email' => 'toto@toto.com', 'password' => 'toto'));
$new->save();
$new = new User (array ('login' => 'toto', 'email' => '', 'password' => 'fion'));
$new->save();

//try
//{
//	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//	
//	$sql = "INSERT INTO Users (login, email) VALUES ('laurent', 'laurent@gmail.com');";
//	$sth = $dbh->prepare($sql);
//	$sth->execute();
//	echo "SUCCESSUL QUERY\n";
//}
//catch (PDOException $e)
//{
//	echo $sql . "<br>" . $e->getMessage();
//}
//    
//$dbh = null;


?>
<?php

require_once('database.php');

try
{
	$dbh = new PDO($GLOBALS['DB_DSN'],
					$GLOBALS['DB_USER'],
					$GLOBALS['DB_PASSWORD'],
					$GLOBALS['DB_OPTS']);
	
	$sql = "DROP TABLE Tokens";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "Table Tokens dropped successfully\n";
	
	$sql = "DROP TABLE Comments";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "Table Comments dropped successfully\n";
	
	$sql = "DROP TABLE Likes";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "Table Likes dropped successfully\n";
	
	$sql = "DROP TABLE Results";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "Table Results dropped successfully\n";
	
	$sql = "DROP TABLE Users";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "Table Users dropped successfully\n";
}
catch (PDOException $e)
{
	echo $sql . "<br>" . $e->getMessage();
}
    
$dbh = null;

?>
<?php

require_once('database.php');

try {
	$dbh = new PDO($GLOBALS['DB_DSN'],
					$GLOBALS['DB_USER'],
					$GLOBALS['DB_PASSWORD'],
					$GLOBALS['DB_OPTS']);
    
$sql = <<<SQL
CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
login VARCHAR(30) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(64),
UNIQUE (id),
UNIQUE (login),
UNIQUE (email)
);
SQL;
	$sth = $dbh->prepare($sql);
	$sth->execute();
    echo "Table Users created successfully\n";
    
$sql = <<<SQL
CREATE TABLE Results (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_id INT(6) UNSIGNED,
create_time TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);
SQL;
	$sth = $dbh->prepare($sql);
	$sth->execute();
    echo "Table Results created successfully\n";

$sql = <<<SQL
CREATE TABLE Comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
picture_id INT(6) UNSIGNED, 
user_id INT(6) UNSIGNED, 
reinit_hash VARCHAR(64),
reinit_expir TIMESTAMP,
FOREIGN KEY (picture_id) REFERENCES Results(id) ON DELETE CASCADE,
FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);
SQL;
	$sth = $dbh->prepare($sql);
	$sth->execute();
    echo "Table Comments created successfully\n";
    
$sql = <<<SQL
CREATE TABLE Likes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
picture_id INT(6) UNSIGNED, 
user_id INT(6) UNSIGNED, 
reinit_hash VARCHAR(64),
reinit_expir TIMESTAMP,
FOREIGN KEY (picture_id) REFERENCES Results(id) ON DELETE CASCADE,
FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);
SQL;
	$sth = $dbh->prepare($sql);
	$sth->execute();
    echo "Table Likes created successfully\n";
    

$sql = <<<SQL
CREATE TABLE Tokens (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_id INT(6) UNSIGNED, 
reinit_hash VARCHAR(64),
reinit_expir TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);
SQL;
	$sth = $dbh->prepare($sql);
	$sth->execute();
    echo "Table Tokens created successfully\n";
    

	}
catch (PDOException $e)
	{
    echo $sql . "<br>" . $e->getMessage();
	}
    
$dbh = null;

?>
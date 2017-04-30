<?php

require_once(dirname(__FILE__) . '/../config/database.php');

function exec_query($query)
{
    try
    {
		$dbh = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWORD']);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->exec($query);
		echo "SUCCESSFUL QUERY ===> $query\n";
        
	}
    catch (PDOException $e)
   	{
		echo $sql . "<br>" . $e->getMessage();
	}
        
    $dbh = null;
}

function print_query($query)
{
    try
    {
	    $dbh = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWORD']);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        foreach ($dbh->query($query) as $row)
        {
            print_r($row);
        }
	}
    catch (PDOException $e)
   	{
		echo $sql . "<br>" . $e->getMessage();
	}
        
    $dbh = null;
}
    
?>
<?php
# FileName="connect.php"
$hostname = "localhost";
$database = "TRENDS";
$username = "phpmyadmin";
$password = "8vBJnje06qQZ";

#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password) or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}

?>

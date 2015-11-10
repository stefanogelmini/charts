<?php
	#Include the connect.php file
	include('connect.php');
	include('functions.php');
	
	
	$query = "SELECT * FROM Locazione ORDER BY Locazione";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'IDLocazione' => $row['IDLocazione'],
            'Locazione' => $row['Locazione'],
            'Codice' => $row['Codice']
		  );
	}
   
	echo json_encode($orders);

   	include('close_connect.php');

?>
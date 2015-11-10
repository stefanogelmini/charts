<?php
	#Include the connect.php file
	include('connect.php');
	include('functions.php');
    $query = "SELECT IDSonda, Sonda.Descrizione, TipoSonda.Descrizione AS DescrizioneTipoSonda ,CONCAT(Sonda.Descrizione, ' (', TipoSonda.Descrizione , ' )' ) AS DescrizioneEstesa FROM Sonda INNER JOIN TipoSonda ON Sonda.IDTipoSonda = TipoSonda.ID ORDER BY IDSonda";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'IDSonda' => $row['IDSonda'],
            'DescrizioneEstesa' => $row['DescrizioneEstesa']
		  );
	}
   
	echo json_encode($orders);
	include('close_connect.php');
?>
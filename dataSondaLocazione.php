<?php
	#Include the connect.php file
	include('connect.php');
	include('functions.php');
	
    $statement = "SELECT timestamp,idlocazione ";

    $idlocazione = $_GET[IDLocazione];

	$query= "SELECT DISTINCT ValoriSondaPerLocazione.IDSonda ,ValoriSondaPerLocazione.DescrizioneTipoSonda FROM ValoriSondaPerLocazione WHERE ValoriSondaPerLocazione.IDLocazione=" . $idlocazione . ";";
	#echo($query);
   	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $idsonda=$row["IDSonda"];
		$tiposonda=$row["DescrizioneTipoSonda"];
		$strSQL = ", SUM(IF(IDSonda='" . $idsonda . "' ,VALORE_D ,0)) AS '" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,MinSogliaEstate ,0)) AS 'MinSogliaEstate_" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,MaxSogliaEstate ,0)) AS 'MaxSogliaEstate_" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,MinSogliaInverno ,0)) AS 'MinSogliaInverno_" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,MaxSogliaInverno ,0)) AS 'MaxSogliaInverno_" . $tiposonda ."' ";
		
		
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,TempoMinSogliaEstate ,0)) AS 'TempoMinSogliaEstate_" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,TempoMaxSogliaEstate ,0)) AS 'TempoMaxSogliaEstate_" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,TempoMinSogliaInverno ,0)) AS 'TempoMinSogliaInverno_" . $tiposonda ."' ";
		$strSQL = $strSQL . ", SUM(IF(IDSonda='" . $idsonda . "' ,TempoMaxSogliaInverno ,0)) AS 'TempoMaxSogliaInverno_" . $tiposonda ."' "; 
		 
		$statement = $statement . $strSQL;
	}	

	$statement = $statement . " FROM ValoriSondaPerLocazione WHERE IDLocazione=" . $idlocazione . " GROUP BY timestamp,idlocazione;";
    #echo("<strong>".$statement."</strong><br>");
 
	$result = mysql_query($statement) or die("SQL Error 1: " . mysql_error());
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'IDLocazione' => $row['IDLocazione'],
			'TimeStamp' => $row['TimeStamp'],
			'Temperatura' => $row['Temperatura'],
			'Umidita' => $row['Umidita'],
			'MinSogliaEstate_Temperatura' => $row['MinSogliaEstate_Temperatura'],
			'MaxSogliaEstate_Temperatura' => $row['MaxSogliaEstate_Temperatura'],
			'MinSogliaInverno_Temperatura' => $row['MinSogliaInverno_Temperatura'],
			'MaxSogliaInverno_Temperatura' => $row['MaxSogliaInverno_Temperatura'],
			'MinSogliaEstate_Umidita' => $row['MinSogliaEstate_Umidita'],
			'MaxSogliaEstate_Umidita' => $row['MaxSogliaEstate_Umidita'],
			'MinSogliaInverno_Umidita' => $row['MinSogliaInverno_Umidita'],
			'MaxSogliaInverno_Umidita' => $row['MaxSogliaInverno_Umidita'],
			'TempoMinSogliaEstate_Temperatura' => $row['TempoMinSogliaEstate_Temperatura'],
			'TempoMaxSogliaEstate_Temperatura' => $row['TempoMaxSogliaEstate_Temperatura'],
			'TempoMinSogliaInverno_Temperatura' => $row['TempoMinSogliaInverno_Temperatura'],
			'TempoMaxSogliaInverno_Temperatura' => $row['TempoMaxSogliaInverno_Temperatura'],
			'TempoMinSogliaEstate_Umidita' => $row['TempoMinSogliaEstate_Umidita'],
			'TempoMaxSogliaEstate_Umidita' => $row['TempoMaxSogliaEstate_Umidita'],
			'TempoMinSogliaInverno_Umidita' => $row['TempoMinSogliaInverno_Umidita'],
			'TempoMaxSogliaInverno_Umidita' => $row['TempoMaxSogliaInverno_Umidita']
		  );
	}
   
	echo json_encode($orders);
	
	include('close_connect.php');
?>

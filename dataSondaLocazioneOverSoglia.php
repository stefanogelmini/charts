<?php
	#Include the connect.php file
	include('connect.php');
	include('functions.php');
	$idlocazione = $_GET[IDLocazione];
	
	// Ricavo IDSonda dalla IDLocazione
	$sql = "SELECT IDSonda,IDTipoSonda FROM Sonda WHERE IDLocazione=" . $idlocazione . " ;";
	//echo $sql;
	$result = mysql_query($sql) or die("SQL Error 1: " . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        
        $idsonda=$row["IDSonda"];
        $idtiposonda = $row["IDTipoSonda"];
        $MinSoglia=0;
        $MaxSoglia=0;
        $TempoMinSoglia=0;
        $TempoMaxSoglia=0;
        
        
        $sql = "SELECT * from Sonda WHERE IDSonda=" . $idsonda . ";";
		
		//echo $sql;
		//echo("<br>");
		$result2 = mysql_query($sql) or die("SQL Error 1: " . mysql_error());
		
			while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
				if ($IS_ESTATE) {
					//`MinSogliaEstate`,`MaxSogliaEstate`,`TempoMinSogliaEstate`,`TempoMaxSogliaEstate`
					$MinSoglia= $row2['MinSogliaEstate'];
					$MaxSoglia=$row2['MaxSogliaEstate'];
        			$TempoMinSoglia=$row2['TempoMinSogliaEstate'];
        			$TempoMaxSoglia=$row2['TempoMaxSogliaEstate'];
				}else {
					//`MinSogliaInverno`,`MaxSogliaInverno`,`TempoMinSogliaInverno`,`TempoMaxSogliaInverno`
					$MinSoglia= $row2['MinSogliaInverno'];
					$MaxSoglia=$row2['MaxSogliaInverno'];
        			$TempoMinSoglia=$row2['TempoMinSogliaInverno'];
        			$TempoMaxSoglia=$row2['TempoMaxSogliaInverno'];
				}
				// echo("MinSoglia=".$MinSoglia);
				// echo("<Br>");
				// echo("MaxSoglia=".$MaxSoglia);
				// echo("<Br>");
				// echo("TempoMinSoglia=".$TempoMinSoglia);
				// echo("<Br>");
				// echo("TempoMaxSoglia=".$TempoMaxSoglia);	
				// echo("<Br>");
				
				$sql = "select 'MAX' as Soglia,t1.IDSonda,t1.IDTipoSonda,t1.DescrizioneTipoSonda, t1.timestamp, t1.VALORE_D ";
				$sql = $sql . "from ValoriSondaPerLocazione t1 inner join ValoriSondaPerLocazione t2 on t2.id = (t1.id + 1) ";
				$sql = $sql . "where t1.IDLocazione=" . $idlocazione . " and t1.IDTipoSonda=" . $idtiposonda . " ";
				$sql = $sql . "and TIMESTAMPDIFF(MINUTE,t1.timestamp,t2.timestamp) >= " . $TempoMaxSoglia ."  and t1.VALORE_D >= ". $MaxSoglia . " ";
				
				
				$sql = $sql . " union select 'MIN' as Soglia, t1.IDSonda,t1.IDTipoSonda,t1.DescrizioneTipoSonda, t1.timestamp, t1.VALORE_D ";
				$sql = $sql . "from ValoriSondaPerLocazione t1 inner join ValoriSondaPerLocazione t2 on t2.id = (t1.id + 1) ";
				$sql = $sql . "where t1.IDLocazione=" . $idlocazione . " and t1.IDTipoSonda=" . $idtiposonda . " ";
				$sql = $sql . "and TIMESTAMPDIFF(MINUTE,t1.timestamp,t2.timestamp) <= " . $TempoMinSoglia ."  and t1.VALORE_D <= ". $MinSoglia . " ";
				
				
			//	echo $sql;
			//	echo("<Br>");
				if (strlen($sql_aggregata)>0) {
					$sql_aggregata = $sql_aggregata ." UNION " . $sql;
				}else {
					$sql_aggregata = $sql;
				}
			}
	}	
	$sql_aggregata = $sql_aggregata . ";";
	//echo $sql_aggregata;
	// echo("<Br>");
	$result = mysql_query($sql_aggregata) or die("SQL Error 1: " . mysql_error());
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			'Soglia' => $row['Soglia'],
			'IDSonda' => $row['IDSonda'],
			'IDTipoSonda' => $row['IDTipoSonda'],
			'DescrizioneTipoSonda' => $row['DescrizioneTipoSonda'],
			'TimeStamp' => $row['TimeStamp'],
			'VALORE_D' => $row['VALORE_D']
		  );
	}
   
	echo json_encode($data);
	
	include('close_connect.php');
?>

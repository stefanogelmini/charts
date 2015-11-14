<!DOCTYPE html>
	<?php include('phpdao-2.7/generated/include_dao.php'); ?>	
<html lang="it">
<head>
	<title id='Description'>Home Page</title>
	<?php include('resources.php'); ?>
</head>
<body class='default'>
	<?php include('menu.php'); 
	
	//print all rows order by title

	$arr = DAOFactory::getLocazioneDAO()->queryAllOrderBy('IDLocazione');
	$conta = count($arr);
	echo ("Sono state individuate ". $conta ." sonde.");
	for($i=0;$i<$conta;$i++){
		$row = $arr[$i];
		echo $row->IDLocazione;
	}


?>
</body>
</html>

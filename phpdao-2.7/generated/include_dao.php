<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/LocazioneDAO.class.php');
	require_once('class/dto/Locazione.class.php');
	require_once('class/mysql/LocazioneMySqlDAO.class.php');
	require_once('class/mysql/ext/LocazioneMySqlExtDAO.class.php');
	require_once('class/dao/SondaDAO.class.php');
	require_once('class/dto/Sonda.class.php');
	require_once('class/mysql/SondaMySqlDAO.class.php');
	require_once('class/mysql/ext/SondaMySqlExtDAO.class.php');
	require_once('class/dao/TipoSondaDAO.class.php');
	require_once('class/dto/TipoSonda.class.php');
	require_once('class/mysql/TipoSondaMySqlDAO.class.php');
	require_once('class/mysql/ext/TipoSondaMySqlExtDAO.class.php');
	require_once('class/dao/ValoriSondaDAO.class.php');
	require_once('class/dto/ValoriSonda.class.php');
	require_once('class/mysql/ValoriSondaMySqlDAO.class.php');
	require_once('class/mysql/ext/ValoriSondaMySqlExtDAO.class.php');

?>
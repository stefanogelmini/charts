<?php
/**
 * Class that operate on table 'ValoriSonda'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
class ValoriSondaMySqlExtDAO extends ValoriSondaMySqlDAO{
/**
	 * Get rows count where column created_by is equal to method param
	 */
	function getCountRows(){
		$sql = "SELECT count(*) FROM ValoriSonda ";
		$sqlQuery = new SqlQuery($sql);
	
		return $this->querySingleResult($sqlQuery);
	}
	
}
?>
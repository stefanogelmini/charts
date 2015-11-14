<?php
/**
 * Class that operate on table 'TipoSonda'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
class TipoSondaMySqlDAO implements TipoSondaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TipoSondaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM TipoSonda WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM TipoSonda';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM TipoSonda ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tipoSonda primary key
 	 */
	public function delete($ID){
		$sql = 'DELETE FROM TipoSonda WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TipoSondaMySql tipoSonda
 	 */
	public function insert($tipoSonda){
		$sql = 'INSERT INTO TipoSonda (Descrizione) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipoSonda->descrizione);

		$id = $this->executeInsert($sqlQuery);	
		$tipoSonda->iD = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TipoSondaMySql tipoSonda
 	 */
	public function update($tipoSonda){
		$sql = 'UPDATE TipoSonda SET Descrizione = ? WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipoSonda->descrizione);

		$sqlQuery->setNumber($tipoSonda->iD);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM TipoSonda';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM TipoSonda WHERE Descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM TipoSonda WHERE Descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TipoSondaMySql 
	 */
	protected function readRow($row){
		$tipoSonda = new TipoSonda();
		
		$tipoSonda->iD = $row['ID'];
		$tipoSonda->descrizione = $row['Descrizione'];

		return $tipoSonda;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TipoSondaMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
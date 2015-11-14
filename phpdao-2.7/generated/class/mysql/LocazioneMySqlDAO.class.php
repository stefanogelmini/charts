<?php
/**
 * Class that operate on table 'Locazione'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
class LocazioneMySqlDAO implements LocazioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LocazioneMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM Locazione WHERE IDLocazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM Locazione';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM Locazione ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param locazione primary key
 	 */
	public function delete($IDLocazione){
		$sql = 'DELETE FROM Locazione WHERE IDLocazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($IDLocazione);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LocazioneMySql locazione
 	 */
	public function insert($locazione){
		$sql = 'INSERT INTO Locazione (Codice, Locazione) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($locazione->codice);
		$sqlQuery->set($locazione->locazione);

		$id = $this->executeInsert($sqlQuery);	
		$locazione->iDLocazione = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LocazioneMySql locazione
 	 */
	public function update($locazione){
		$sql = 'UPDATE Locazione SET Codice = ?, Locazione = ? WHERE IDLocazione = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($locazione->codice);
		$sqlQuery->set($locazione->locazione);

		$sqlQuery->setNumber($locazione->iDLocazione);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM Locazione';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM Locazione WHERE Codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocazione($value){
		$sql = 'SELECT * FROM Locazione WHERE Locazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodice($value){
		$sql = 'DELETE FROM Locazione WHERE Codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocazione($value){
		$sql = 'DELETE FROM Locazione WHERE Locazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LocazioneMySql 
	 */
	protected function readRow($row){
		$locazione = new Locazione();
		
		$locazione->iDLocazione = $row['IDLocazione'];
		$locazione->codice = $row['Codice'];
		$locazione->locazione = $row['Locazione'];

		return $locazione;
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
	 * @return LocazioneMySql 
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
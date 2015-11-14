<?php
/**
 * Class that operate on table 'ValoriSonda'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
class ValoriSondaMySqlDAO implements ValoriSondaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ValoriSondaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ValoriSonda WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ValoriSonda';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ValoriSonda ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param valoriSonda primary key
 	 */
	public function delete($ID){
		$sql = 'DELETE FROM ValoriSonda WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ValoriSondaMySql valoriSonda
 	 */
	public function insert($valoriSonda){
		$sql = 'INSERT INTO ValoriSonda (IDSonda, TimeStamp, VALORE_D) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($valoriSonda->iDSonda);
		$sqlQuery->set($valoriSonda->timeStamp);
		$sqlQuery->set($valoriSonda->vALORED);

		$id = $this->executeInsert($sqlQuery);	
		$valoriSonda->iD = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ValoriSondaMySql valoriSonda
 	 */
	public function update($valoriSonda){
		$sql = 'UPDATE ValoriSonda SET IDSonda = ?, TimeStamp = ?, VALORE_D = ? WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($valoriSonda->iDSonda);
		$sqlQuery->set($valoriSonda->timeStamp);
		$sqlQuery->set($valoriSonda->vALORED);

		$sqlQuery->setNumber($valoriSonda->iD);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ValoriSonda';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDSonda($value){
		$sql = 'SELECT * FROM ValoriSonda WHERE IDSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTimeStamp($value){
		$sql = 'SELECT * FROM ValoriSonda WHERE TimeStamp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVALORED($value){
		$sql = 'SELECT * FROM ValoriSonda WHERE VALORE_D = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDSonda($value){
		$sql = 'DELETE FROM ValoriSonda WHERE IDSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTimeStamp($value){
		$sql = 'DELETE FROM ValoriSonda WHERE TimeStamp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVALORED($value){
		$sql = 'DELETE FROM ValoriSonda WHERE VALORE_D = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ValoriSondaMySql 
	 */
	protected function readRow($row){
		$valoriSonda = new ValoriSonda();
		
		$valoriSonda->iD = $row['ID'];
		$valoriSonda->iDSonda = $row['IDSonda'];
		$valoriSonda->timeStamp = $row['TimeStamp'];
		$valoriSonda->vALORED = $row['VALORE_D'];

		return $valoriSonda;
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
	 * @return ValoriSondaMySql 
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
<?php
/**
 * Class that operate on table 'Sonda'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
class SondaMySqlDAO implements SondaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SondaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM Sonda WHERE IDSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM Sonda';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM Sonda ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param sonda primary key
 	 */
	public function delete($IDSonda){
		$sql = 'DELETE FROM Sonda WHERE IDSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($IDSonda);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SondaMySql sonda
 	 */
	public function insert($sonda){
		$sql = 'INSERT INTO Sonda (IDTipoSonda, IDLocazione, Descrizione, MinSogliaInverno, MaxSogliaInverno, MinSogliaEstate, MaxSogliaEstate, TempoMinSogliaInverno, TempoMaxSogliaInverno, TempoMinSogliaEstate, TempoMaxSogliaEstate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($sonda->iDTipoSonda);
		$sqlQuery->setNumber($sonda->iDLocazione);
		$sqlQuery->set($sonda->descrizione);
		$sqlQuery->set($sonda->minSogliaInverno);
		$sqlQuery->set($sonda->maxSogliaInverno);
		$sqlQuery->set($sonda->minSogliaEstate);
		$sqlQuery->set($sonda->maxSogliaEstate);
		$sqlQuery->setNumber($sonda->tempoMinSogliaInverno);
		$sqlQuery->setNumber($sonda->tempoMaxSogliaInverno);
		$sqlQuery->setNumber($sonda->tempoMinSogliaEstate);
		$sqlQuery->setNumber($sonda->tempoMaxSogliaEstate);

		$id = $this->executeInsert($sqlQuery);	
		$sonda->iDSonda = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SondaMySql sonda
 	 */
	public function update($sonda){
		$sql = 'UPDATE Sonda SET IDTipoSonda = ?, IDLocazione = ?, Descrizione = ?, MinSogliaInverno = ?, MaxSogliaInverno = ?, MinSogliaEstate = ?, MaxSogliaEstate = ?, TempoMinSogliaInverno = ?, TempoMaxSogliaInverno = ?, TempoMinSogliaEstate = ?, TempoMaxSogliaEstate = ? WHERE IDSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($sonda->iDTipoSonda);
		$sqlQuery->setNumber($sonda->iDLocazione);
		$sqlQuery->set($sonda->descrizione);
		$sqlQuery->set($sonda->minSogliaInverno);
		$sqlQuery->set($sonda->maxSogliaInverno);
		$sqlQuery->set($sonda->minSogliaEstate);
		$sqlQuery->set($sonda->maxSogliaEstate);
		$sqlQuery->setNumber($sonda->tempoMinSogliaInverno);
		$sqlQuery->setNumber($sonda->tempoMaxSogliaInverno);
		$sqlQuery->setNumber($sonda->tempoMinSogliaEstate);
		$sqlQuery->setNumber($sonda->tempoMaxSogliaEstate);

		$sqlQuery->setNumber($sonda->iDSonda);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM Sonda';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDTipoSonda($value){
		$sql = 'SELECT * FROM Sonda WHERE IDTipoSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDLocazione($value){
		$sql = 'SELECT * FROM Sonda WHERE IDLocazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM Sonda WHERE Descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinSogliaInverno($value){
		$sql = 'SELECT * FROM Sonda WHERE MinSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaxSogliaInverno($value){
		$sql = 'SELECT * FROM Sonda WHERE MaxSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinSogliaEstate($value){
		$sql = 'SELECT * FROM Sonda WHERE MinSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaxSogliaEstate($value){
		$sql = 'SELECT * FROM Sonda WHERE MaxSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempoMinSogliaInverno($value){
		$sql = 'SELECT * FROM Sonda WHERE TempoMinSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempoMaxSogliaInverno($value){
		$sql = 'SELECT * FROM Sonda WHERE TempoMaxSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempoMinSogliaEstate($value){
		$sql = 'SELECT * FROM Sonda WHERE TempoMinSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempoMaxSogliaEstate($value){
		$sql = 'SELECT * FROM Sonda WHERE TempoMaxSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDTipoSonda($value){
		$sql = 'DELETE FROM Sonda WHERE IDTipoSonda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDLocazione($value){
		$sql = 'DELETE FROM Sonda WHERE IDLocazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM Sonda WHERE Descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinSogliaInverno($value){
		$sql = 'DELETE FROM Sonda WHERE MinSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaxSogliaInverno($value){
		$sql = 'DELETE FROM Sonda WHERE MaxSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinSogliaEstate($value){
		$sql = 'DELETE FROM Sonda WHERE MinSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaxSogliaEstate($value){
		$sql = 'DELETE FROM Sonda WHERE MaxSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempoMinSogliaInverno($value){
		$sql = 'DELETE FROM Sonda WHERE TempoMinSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempoMaxSogliaInverno($value){
		$sql = 'DELETE FROM Sonda WHERE TempoMaxSogliaInverno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempoMinSogliaEstate($value){
		$sql = 'DELETE FROM Sonda WHERE TempoMinSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempoMaxSogliaEstate($value){
		$sql = 'DELETE FROM Sonda WHERE TempoMaxSogliaEstate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SondaMySql 
	 */
	protected function readRow($row){
		$sonda = new Sonda();
		
		$sonda->iDSonda = $row['IDSonda'];
		$sonda->iDTipoSonda = $row['IDTipoSonda'];
		$sonda->iDLocazione = $row['IDLocazione'];
		$sonda->descrizione = $row['Descrizione'];
		$sonda->minSogliaInverno = $row['MinSogliaInverno'];
		$sonda->maxSogliaInverno = $row['MaxSogliaInverno'];
		$sonda->minSogliaEstate = $row['MinSogliaEstate'];
		$sonda->maxSogliaEstate = $row['MaxSogliaEstate'];
		$sonda->tempoMinSogliaInverno = $row['TempoMinSogliaInverno'];
		$sonda->tempoMaxSogliaInverno = $row['TempoMaxSogliaInverno'];
		$sonda->tempoMinSogliaEstate = $row['TempoMinSogliaEstate'];
		$sonda->tempoMaxSogliaEstate = $row['TempoMaxSogliaEstate'];

		return $sonda;
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
	 * @return SondaMySql 
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
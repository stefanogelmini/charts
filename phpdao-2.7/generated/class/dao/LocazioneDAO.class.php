<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
interface LocazioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Locazione 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param locazione primary key
 	 */
	public function delete($IDLocazione);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Locazione locazione
 	 */
	public function insert($locazione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Locazione locazione
 	 */
	public function update($locazione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodice($value);

	public function queryByLocazione($value);


	public function deleteByCodice($value);

	public function deleteByLocazione($value);


}
?>
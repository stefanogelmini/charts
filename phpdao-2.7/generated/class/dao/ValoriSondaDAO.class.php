<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
interface ValoriSondaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ValoriSonda 
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
 	 * @param valoriSonda primary key
 	 */
	public function delete($ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ValoriSonda valoriSonda
 	 */
	public function insert($valoriSonda);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ValoriSonda valoriSonda
 	 */
	public function update($valoriSonda);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDSonda($value);

	public function queryByTimeStamp($value);

	public function queryByVALORED($value);


	public function deleteByIDSonda($value);

	public function deleteByTimeStamp($value);

	public function deleteByVALORED($value);


}
?>
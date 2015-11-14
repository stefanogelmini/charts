<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
interface TipoSondaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TipoSonda 
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
 	 * @param tipoSonda primary key
 	 */
	public function delete($ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TipoSonda tipoSonda
 	 */
	public function insert($tipoSonda);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TipoSonda tipoSonda
 	 */
	public function update($tipoSonda);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);


	public function deleteByDescrizione($value);


}
?>
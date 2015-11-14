<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-11-14 13:45
 */
interface SondaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Sonda 
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
 	 * @param sonda primary key
 	 */
	public function delete($IDSonda);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Sonda sonda
 	 */
	public function insert($sonda);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Sonda sonda
 	 */
	public function update($sonda);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDTipoSonda($value);

	public function queryByIDLocazione($value);

	public function queryByDescrizione($value);

	public function queryByMinSogliaInverno($value);

	public function queryByMaxSogliaInverno($value);

	public function queryByMinSogliaEstate($value);

	public function queryByMaxSogliaEstate($value);

	public function queryByTempoMinSogliaInverno($value);

	public function queryByTempoMaxSogliaInverno($value);

	public function queryByTempoMinSogliaEstate($value);

	public function queryByTempoMaxSogliaEstate($value);


	public function deleteByIDTipoSonda($value);

	public function deleteByIDLocazione($value);

	public function deleteByDescrizione($value);

	public function deleteByMinSogliaInverno($value);

	public function deleteByMaxSogliaInverno($value);

	public function deleteByMinSogliaEstate($value);

	public function deleteByMaxSogliaEstate($value);

	public function deleteByTempoMinSogliaInverno($value);

	public function deleteByTempoMaxSogliaInverno($value);

	public function deleteByTempoMinSogliaEstate($value);

	public function deleteByTempoMaxSogliaEstate($value);


}
?>
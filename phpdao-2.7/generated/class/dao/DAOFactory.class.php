<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return LocazioneDAO
	 */
	public static function getLocazioneDAO(){
		return new LocazioneMySqlExtDAO();
	}

	/**
	 * @return SondaDAO
	 */
	public static function getSondaDAO(){
		return new SondaMySqlExtDAO();
	}

	/**
	 * @return TipoSondaDAO
	 */
	public static function getTipoSondaDAO(){
		return new TipoSondaMySqlExtDAO();
	}

	/**
	 * @return ValoriSondaDAO
	 */
	public static function getValoriSondaDAO(){
		return new ValoriSondaMySqlExtDAO();
	}


}
?>
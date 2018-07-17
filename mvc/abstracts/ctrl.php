<?php
namespace mvc;

require_once './apis/sec/filters.php';

/**
 * Description of ctrl
 *
 * @author crash
 */
abstract class ctrl {
	protected $_filters= false;

	public function __construct( array $_filters = []){
        $this->_filters = $_filters;
    }

	/**
     * Analyse la requête transmise au serveur et appelle la méthode correspondante du contrôleur instancié.
     * @param string  $_server_method méthode http forcée. (post|get|put|trace|option|delete|connect|head)
     * @param array   $_request       tableau associatif contenant les données FILTRéES à utiliser pour la requête
     */
    public function run( $_server_method= null, array $_request= []){
		$f= $_server_method ? $_server_method : filter_input( INPUT_SERVER, 'REQUEST_METHOD');
		switch( $f) {
            case 'POST':
				$_request= $_POST;
				break;
            case 'GET':
				$_request= $_GET;
				break;
            default: return [];
        }
		if( method_exists( $this, $f)) return $this->$f( $_request);
    }

    /**
     * Méthode utilisée pour traiter les requêtes HTTP de type GET, doit être surchargée par la classe fille si elle est implémentée
     * @param array $_request instance contenant les valeurs filtrées issues de la requête.
     */
    public function get( array $_request){}
    /**
     * Méthode utilisée pour traiter les requêtes HTTP de type POST, doit être surchargée par la classe fille si elle est implémentée
     * @param array $_request instance contenant les valeurs filtrées issues de la requête.
     */
    public function post( array $_request){}
}

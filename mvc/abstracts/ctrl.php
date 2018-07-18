<?php
namespace mvc;

/**
 * Contrôleur principal
 */
abstract class ctrl {
	protected $_filters= false;

	public function __construct(){
        // autoload des class
        call_user_func(function () {
            if (!is_file($autoloadFile = ROOT. 'vendor/autoload.php')) {
                throw new \RuntimeException('Did not find vendor/autoload.php. Did you run "composer install --dev"?');
            }

            /** @noinspection PhpIncludeInspection */
            require_once $autoloadFile;

            ini_set('date.timezone', 'Europe/Paris');
        });
    }

	/**
     * Analyse la requête transmise au serveur et appelle la méthode correspondante du contrôleur instancié.
     */
    public function run(){
		$mode= filter_input( INPUT_SERVER, 'REQUEST_METHOD');
        switch( $mode){
            case 'POST': $request= $_POST; break;
            case 'GET': $request= $_GET; break;
            default: return false;
        }

		if( method_exists( $this, $mode)) return $this->$mode( $request);
    }

    /**
     * Méthode utilisée pour traiter les requêtes HTTP de type GET, doit être surchargée par la classe fille si elle est implémentée
     * @param array $_request instance contenant les valeurs issues de la requête.
     */
    public function get( array $_request){}
    
    /**
     * Méthode utilisée pour traiter les requêtes HTTP de type POST, doit être surchargée par la classe fille si elle est implémentée
     * @param array $_request instance contenant les valeurs issues de la requête.
     */
    public function post( array $_request){}
}

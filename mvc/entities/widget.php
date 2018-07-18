<?php
namespace entities;
/**
 * Gestion des widgets
 */
class widget {
    private $widgets_x= [];

    /**
     * @param string $_file le fichier contenant les widgets
     */
    public function __construct( $_file) {
        $data = file_get_contents( $_file);
        $this->widgets_x = json_decode( $data, true);
    }

    public function get_all_widgets() {
        return $this->widgets_x;
    }

    /**
     * Retourne un widget spécifique
     * @param int $_index l'index du widget à retourner
     * @return widget
     */
    public function get_widget( $_index) {
        return $this->widgets_x[ $_index];
    }

    /**
     * Ajout ou mets à jour un widget
     * @param string $_city la ville
     * @param string $_lang la langue
     * @param string $_units l'unité
     * @param int $_id l'identifiant du widget à mettre à jour si fourni
     */
    public function set_widget( $_city, $_lang, $_units, $_id= null){
        if( ! empty( $_id)){
            $this->widgets_x[ $_id]= [ 'city'=> $_city, 'lang'=> $_lang, 'units'=> $_units];
        } else{
            $this->widgets_x[]= [ 'city'=> $_city, 'lang'=> $_lang, 'units'=> $_units];
        }
    }

    public function save_widgets(){
        $json= json_encode( $this->widgets_x, JSON_PRETTY_PRINT);
        return file_put_contents( 'widgets.json', $json);
    }

}

<?php
namespace entities;
/**
 * Genre les widgets à afficher
 */
class widget {
    private $widgets_x= [];

    public function __construct( $_file) {
        $data = file_get_contents( $_file);
        $this->widgets_x = json_decode( $data, true);
    }

    public function get_all_widgets() {
        return $this->widgets_x;
    }

    public function get_widget( $_index) {
        return $this->widgets_x[ $_index];
    }

    public function set_widgets( $_city, $_lang, $_units){
        $this->widgets_x[]= [ $_city, $_lang, $_units];
    }

    public function set_units( $_widget, $_units){
        $this->widgets_x[ $_widget][ 'units']= $_units;
    }
    public function set_lang( $_widget, $_lang){
        $this->widgets_x[ $_widget][ 'lang']= $_lang;
    }

}

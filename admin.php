<?php
namespace controllers;
use mvc;
use entities as ent;

require_once './_settings/config.php';
require_once './mvc/abstracts/ctrl.php';
require_once './mvc/entities/widget.php';
require_once './mvc/apis/tpl.php';

final class admin extends mvc\ctrl {
    private $tpl;
	public function __construct() {
        parent::__construct();

        $this->tpl= new tpl( './templates/', './cache/');
	}

	public function get( array $_req){
		$w= new ent\widget( 'widgets.json');
		$widgets_x= $w->get_all_widgets();

		
		$this->tpl->set_filenames( [ 'header'=> 'header.tpl']);
		$this->tpl->assign_vars([
            'TITLE' => 'Administration',
        ]);
		$this->tpl->pparse( 'header');


		$this->tpl->set_filenames( [ 'admin'=> 'admin.tpl']);
		if( $widgets_x){
			$this->tpl->create_block( 'lst_widget');
            foreach( $widgets_x as $key=> $res) {
                $this->tpl->assign_block_vars( 'lst_wdg', [
                    'WDG_ID'=> $key,
                    'WDG_CITY'=> $res[ 'city'],
                    'WDG_LANG'=> $res[ 'lang'],
                    'WDG_UNITS'=> $res[ 'units'],
                ]);
            }
            $this->tpl->assign_vars( [
                'NEXT_IT'=> max( array_keys( $widgets_x)) + 1
            ]);
		}
		$this->tpl->pparse( 'admin');

		$this->tpl->set_filenames( [ 'footer'=> 'footer.tpl']);
		$this->tpl->pparse( 'footer');

	}

	public function post( array $_req) {
        foreach( $_req[ 'wdg'] as $key=> $value) {
            if( empty( $value[ 'city'])) unset(  $_req[ 'wdg'][ $key]);
        }
        $json= json_encode( $_req[ 'wdg'], JSON_PRETTY_PRINT);
		if( file_put_contents( 'widgets.json', $json)){
            header( 'Location: admin.php');
        } else{
            $this->tpl->set_filenames( [ 'admin'=> 'admin.tpl']);
            $this->tpl->create_block( 'file_not_saved');
            $this->tpl->pparse( 'admin');
        }
	}
}
( new admin())->run();

<?php
namespace controllers;
use mvc;
use sec;
use entities as ent;

require_once './mvc/abstracts/ctrl.php';
require_once './entities/widget.php';
require_once './mvc/apis/tpl.php';

final class admin extends mvc\ctrl {
	public function __construct() {
		/// Création des filtres
        parent::__construct([
            'POST' => [
                'id'  => sec\filters::$is_int,
                'city'  => sec\filters::$text,
                'lang'  => sec\filters::$text,
                'units'  => sec\filters::$text,
            ],
        ]);
	}

	public function get( array $req){
		$w= new ent\widget( 'widgets.json');
		$widgets_x= $w->get_all_widgets();

		$tpl= new tpl( './templates/', './cache/');
		$tpl->set_filenames( [ 'header'=> 'header.tpl']);
		$tpl->assign_vars([
            'TITLE' => 'Adminstration',
        ]);
		$tpl->pparse( 'header');


		$tpl->set_filenames( [ 'admin'=> 'admin.tpl']);
		if( $widgets_x){
			$tpl->create_block( 'lst_widget');
            foreach( $widgets_x as $key=> $res) {
                $tpl->assign_block_vars( 'lst_wdg', [
                    'WDG_ID'=> $key,
                    'WDG_CITY'=> $res[ 'city'],
                    'WDG_LANG'=> $res[ 'lang'],
                    'WDG_UNITS'=> $res[ 'units'],
                ]);
            }
		}
		$tpl->pparse( 'admin');

		$tpl->set_filenames( [ 'footer'=> 'footer.tpl']);
		$tpl->assign_vars([
            'DATE' => date( 'd-m-Y'),
        ]);
		$tpl->pparse( 'footer');

	}

	public function post( array $req) {
		echo '<pre>';
		print_r( $req);
		echo '</pre>';
	}
}
(new admin())->run();
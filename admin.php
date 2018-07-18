<?php
namespace controllers;
use mvc;
use entities as ent;

require_once './_settings/config.php';
require_once './mvc/abstracts/ctrl.php';
require_once './mvc/entities/widget.php';
require_once './mvc/apis/tpl.php';

/**
 * Gestion de la page d'administration
 */
final class admin extends mvc\ctrl {
    private $tpl;
    private $wdg_x;
    private $widgets_ent;

	public function __construct() {
        parent::__construct();

        // on définit le templates et son cache
        $this->tpl= new tpl( './templates/', './cache/');

        // on récupère les widgets
        $this->widgets_ent= new ent\widget( 'widgets.json');
		$this->wdg_x= $this->widgets_ent->get_all_widgets();
	}

	public function get( array $_req){
        // on ajoute le template du header et on le parse avec les variables
		$this->tpl->set_filenames( [ 'header'=> 'header.tpl']);
		$this->tpl->assign_vars([
            'TITLE' => 'Administration',
        ]);
		$this->tpl->pparse( 'header');


        // on affiche les widgets pour administration via le tpl admin.tpl
		$this->tpl->set_filenames( [ 'admin'=> 'admin.tpl']);
		if( $this->wdg_x){
            // on crée un bloc conditionnel
			$this->tpl->create_block( 'lst_widget');
            foreach( $this->wdg_x as $key=> $res) {
                // on assigne les vars au block lst_wdg
                $this->tpl->assign_block_vars( 'lst_wdg', [
                    'WDG_ID'=> $key,
                    'WDG_CITY'=> $res[ 'city'],
                    'WDG_LANG'=> $res[ 'lang'],
                    'WDG_UNITS'=> $res[ 'units'],
                ]);
            }
            // on assigne les vars communes au tpl
            $this->tpl->assign_vars( [
                'NEXT_IT'=> max( array_keys( $this->wdg_x)) + 1
            ]);
		}
		$this->tpl->pparse( 'admin');

        // on parse le footer
		$this->tpl->set_filenames( [ 'footer'=> 'footer.tpl']);
		$this->tpl->pparse( 'footer');

	}

	public function post( array $_req) {
        $req= $_req[ 'wdg'];
        foreach( $req as $key=> $val) {
            if( empty( $val[ 'city'])){
                // on supprime les entrées dont la ville est vide
                unset(  $req[ $key]);
            } else{
                // sinon on ajout ou mets à jour
                $this->widgets_ent->set_widget( $val[ 'city'], $val[ 'lang'], $val[ 'units'], isset( $this->wdg_x[ $key]) ? $key : null);
            }
        }

        // si la sauvegarde fonctionne on redirige vers l'admin sinon on affiche un msg d'erreur
		if( $this->widgets_ent->save_widgets()){
            header( 'Location: admin.php');
        } else{
            $this->tpl->set_filenames( [ 'admin'=> 'admin.tpl']);
            $this->tpl->create_block( 'file_not_saved');
            $this->tpl->pparse( 'admin');
        }
	}
}
( new admin())->run();

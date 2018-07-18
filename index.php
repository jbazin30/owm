<?php
namespace controllers;
use mvc;
use entities as ent;
use Cmfcmf\OpenWeatherMap;

require_once './_settings/config.php';
require_once ROOT. 'mvc/abstracts/ctrl.php';
require_once ROOT. 'mvc/entities/widget.php';
require_once ROOT. 'mvc/apis/tpl.php';

final class index extends mvc\ctrl {
    private $widgets_x;
    private $owm;

    public function __construct(){
        parent::__construct();

        $ini = parse_ini_file( './inits/ApiKey.ini');
        $myApiKey = $ini['api_key'];

        $this->owm = new OpenWeatherMap();
        $this->owm->setApiKey( $myApiKey);

        $w= new ent\widget( 'widgets.json');
        $this->widgets_x= $w->get_all_widgets();
    }

    public function get( array $_req){
        $tpl= new tpl( './templates/', './cache/');

        // on ajoute le template du header et on le parse avec les variables
        $tpl->set_filenames( [ 'header'=> 'header.tpl']);
		$tpl->assign_vars([
            'TITLE' => 'Administration',
        ]);
		$tpl->pparse( 'header');

        // on ajoute le tpl de l'index que l'on parse avec les vars des widgets
        $tpl->set_filenames( [ 'index'=> 'index.tpl']);

        if( ! empty( $this->widgets_x)){
            $tpl->create_block( 'has_wdg');
            foreach( $this->widgets_x as $widget) {
                $weather = $this->owm->getWeather( $widget[ 'city'], $widget[ 'units'], $widget[ 'lang']);
                $tpl->assign_block_vars( 'lst_wdg', [
                    'WDG_TEMP'=> $weather->temperature->getFormatted(),
                    'WDG_ID'=> $weather->weather->id,
                    'WDG_CITY_NAME'=> $weather->city->name,
                ]);
            }
        } else{
            $tpl->create_block( 'no_wdg');
        }
        $tpl->pparse( 'index');

        // on parse le footer
        $tpl->set_filenames( [ 'footer'=> 'footer.tpl']);
		$tpl->pparse( 'footer');
    }
}
( new index())->run();

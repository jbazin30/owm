<?php
namespace controllers;
use entities as ent;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once './bootstrap.php';
require_once './entities/widget.php';

$w= new ent\widget( 'widgets.json');
$widgets_x= $w->get_all_widgets();

$owm = new OpenWeatherMap();
$owm->setApiKey( $myApiKey);
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
        <link rel="stylesheet" href="./assets/style.css">
        <link rel="stylesheet" href="./assets/weather-icons.css">
    </head>
    <body>
<?php
foreach( $widgets_x as $widget) {
    $weather = $owm->getWeather( $widget[ 'city'], $widget[ 'units'], $widget[ 'lang']);
    echo '<p>' . $weather->temperature->getFormatted() . '</p>';
    echo '<p class="wi wi-owm-' . $weather->weather->id . ' ft-4"></p>';
    echo '<p>' . $weather->city->name . '</p>';
	echo '<hr>';
}
?>
    </body>
</html>

<?php
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/widget.php';

$w= new widget(( 'widgets.json'));
$widgets_x= $w->get_all_widgets();

// Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
$owm = new OpenWeatherMap();
$owm->setApiKey( $myApiKey);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="./weather-icons.css">
    </head>
    <body>
<?php
foreach( $widgets_x as $widget) {
    $weather = $owm->getWeather( $widget[ 'city'], $widget[ 'units'], $widget[ 'lang']);
    echo '<p>' . $weather->city->name . '</p>';
    echo '<p>' . $weather->temperature->getFormatted() . '</p>';
    echo '<p class="wi wi-owm-' . $weather->weather->id . '">' . $weather->weather->id . '</p>';
}
?>
    </body>
</html>

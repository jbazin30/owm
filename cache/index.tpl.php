<?php
$_result_tpl .= '';
if ( isset ($this->switch['has_wdg']))
{
$_result_tpl .=  '
<div>
    ';
$count_i_0 =  count($this->data['index']['blocks']['lst_wdg']);
for($i_0 = 0; $i_0 < $count_i_0; $i_0++)
{
$_result_tpl .=  '    <div class="inbl t_center card">
        <p>' . $this->data['index']['blocks']['lst_wdg'][$i_0]['WDG_TEMP'] . '</p>
        <p class="wi wi-owm-' . $this->data['index']['blocks']['lst_wdg'][$i_0]['WDG_ID'] . ' ft-4"></p>
        <p><img src="./assets/img/map_marker.png" style="height: 14px;">&nbsp;' . $this->data['index']['blocks']['lst_wdg'][$i_0]['WDG_CITY_NAME'] . '</p>
    </div>
    ';
}
$_result_tpl .=  '</div>
';
}
$_result_tpl .=  '

';
if ( isset ($this->switch['no_wdg']))
{
$_result_tpl .=  '
<p>Il n\'y a pas de widget à afficher</p>
';
}
$_result_tpl .=  '

';

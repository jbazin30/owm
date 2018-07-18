<!-- IFEXIST has_wdg -->
<div class="t_center">
    <!-- BEGIN lst_wdg -->
    <div class="inbl t_center card">
        <p>{lst_wdg.WDG_TEMP}</p>
        <p class="wi wi-owm-{lst_wdg.WDG_ID} ft-4"></p>
        <p><img src="./assets/img/map_marker.png" style="height: 20px;">&nbsp;{lst_wdg.WDG_CITY_NAME}</p>
    </div>
    <!-- END lst_wdg -->
</div>
<!-- ENDIF -->

<!-- IFEXIST no_wdg -->
<p>Il n'y a pas de widget à afficher</p>
<!-- ENDIF -->

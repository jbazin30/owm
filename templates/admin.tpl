<!-- IFEXIST file_not_saved -->
<p>Le fichier ne s'est pas correctement enregistré.</p>
<a href="admin.php">Cliquez-ici pour retourner au formulaire</a>
<!-- ENDIF -->

<!-- IFEXIST lst_widget -->
<form action="admin.php" method="POST">
    <fieldset>
        <legend>Edition</legend>
        <table>
            <tr>
                <th>Ville</th>
                <th>Langue</th>
                <th>Unités</th>
                <th>Action</th>
            </tr>
            <!-- BEGIN lst_wdg -->
            <tr id="l{lst_wdg.ITERATION}">
                <td>
                    <input value="{lst_wdg.WDG_CITY}" name="wdg[{lst_wdg.WDG_ID}][city]">
                </td>
                <td>
                    <input value="{lst_wdg.WDG_LANG}" name="wdg[{lst_wdg.WDG_ID}][lang]">
                </td>
                <td>
                    <input value="{lst_wdg.WDG_UNITS}" name="wdg[{lst_wdg.WDG_ID}][units]">
                </td>
                <td>
                    <button onclick="document.getElementById( 'l{lst_wdg.ITERATION}').remove();">Supp</button>
                </td>
            </tr>
            <!-- END lst_wdg -->
        </table>
    </fieldset>
    <fieldset class="mtm mbl">
        <legend>Ajout</legend>
        <table>
            <tr>
                <th>Ville</th>
                <th>Langue</th>
                <th>Unités</th>
            </tr>
            <tr>
                <td>
                    <input name="wdg[{NEXT_IT}][city]">
                </td>
                <td>
                    <input name="wdg[{NEXT_IT}][lang]" value="fr">
                </td>
                <td>
                    <input name="wdg[{NEXT_IT}][units]" value="metric">
                </td>
            </tr>
        </table>
    </fieldset>
    <p>
        <input value="Sauvegarder" type="submit">&nbsp;<button onclick="window.reload();">Annuler</button>
    </p>
</form>
<!-- ELSE -->
<p>Il n'y a pas de widget à afficher</p>
<!-- ENDIF -->

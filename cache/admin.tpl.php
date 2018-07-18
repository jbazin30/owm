<?php
$_result_tpl .= '';
if ( isset ($this->switch['file_not_saved']))
{
$_result_tpl .=  '
<p>Le fichier ne s\'est pas correctement enregistré.</p>
<a href="admin.php">Cliquez-ici pour retourner au formulaire</a>
';
}
$_result_tpl .=  '

';
if ( isset ($this->switch['lst_widget']))
{
$_result_tpl .=  '
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
            ';
$count_i_0 =  count($this->data['admin']['blocks']['lst_wdg']);
for($i_0 = 0; $i_0 < $count_i_0; $i_0++)
{
$_result_tpl .=  '            <tr id="l' . $i_0 . '">
                <td>
                    <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_CITY'] . '" name="wdg[' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_ID'] . '][city]">
                </td>
                <td>
                    <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_LANG'] . '" name="wdg[' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_ID'] . '][lang]">
                </td>
                <td>
                    <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_UNITS'] . '" name="wdg[' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_ID'] . '][units]">
                </td>
                <td>
                    <button onclick="document.getElementById( \'l' . $i_0 . '\').remove();">Supp</button>
                </td>
            </tr>
            ';
}
$_result_tpl .=  '        </table>
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
                    <input name="wdg[' . ((isset($this->data['admin']['vars']['NEXT_IT'])) ? $this->data['admin']['vars']['NEXT_IT'] : $this->data['parent']['vars']['NEXT_IT'])  . '][city]">
                </td>
                <td>
                    <input name="wdg[' . ((isset($this->data['admin']['vars']['NEXT_IT'])) ? $this->data['admin']['vars']['NEXT_IT'] : $this->data['parent']['vars']['NEXT_IT'])  . '][lang]">
                </td>
                <td>
                    <input name="wdg[' . ((isset($this->data['admin']['vars']['NEXT_IT'])) ? $this->data['admin']['vars']['NEXT_IT'] : $this->data['parent']['vars']['NEXT_IT'])  . '][units]">
                </td>
            </tr>
        </table>
    </fieldset>
    <p>
        <input value="Sauvegarder" type="submit">&nbsp;<button onclick="window.reload();">Annuler</button>
    </p>
</form>
';
}
else
{
$_result_tpl .=  '
<p>Il n\'y a pas de widget à afficher</p>
';
}
$_result_tpl .=  '

';

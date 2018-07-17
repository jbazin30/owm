<?php
$_result_tpl .= '';
if ( isset ($this->switch['lst_widget']))
{
$_result_tpl .=  '
<form action="admin.php" method="POST">
<ul>
	';
$count_i_0 =  count($this->data['admin']['blocks']['lst_wdg']);
for($i_0 = 0; $i_0 < $count_i_0; $i_0++)
{
$_result_tpl .=  '	<li>
		<div>
			ID : <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_ID'] . '" name="id"><br>
			CITY : <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_CITY'] . '" name="city"><br>
			LANG : <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_LANG'] . '" name="lang"><br>
			UNITS : <input value="' . $this->data['admin']['blocks']['lst_wdg'][$i_0]['WDG_UNITS'] . '" name="units"><br>
		</div>
	</li>
	';
}
$_result_tpl .=  '</ul>
		<input value="SEND" type="submit">
</form>
';
}
$_result_tpl .=  '

';
?>
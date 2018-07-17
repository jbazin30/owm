<!-- IFEXIST lst_widget -->
<form action="admin.php" method="POST">
<ul>
	<!-- BEGIN lst_wdg -->
	<li>
		<div>
			ID : <input value="{lst_wdg.WDG_ID}" name="id[]"><br>
			CITY : <input value="{lst_wdg.WDG_CITY}" name="city[]"><br>
			LANG : <input value="{lst_wdg.WDG_LANG}" name="lang[]"><br>
			UNITS : <input value="{lst_wdg.WDG_UNITS}" name="units[]"><br>
		</div>
	</li>
	<!-- END lst_wdg -->
</ul>
		<input value="SEND" type="submit">
</form>
<!-- ENDIF -->

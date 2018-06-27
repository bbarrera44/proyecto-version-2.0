<form action="descargar.php" method="post">
<?php

	Consultar::consultarNovedad($_SESSION['documento']);
?>
<center>
	
<input type="reset" value="Atras" class="submit" onclick="javascript:window.history.back();" style="width: 190px;">
<input type="submit" value="Generar Reporte" class="submit" onclick="javascript:window.history.back();" style="width: 190px;">
<input type="reset" value="Finalizar" class="submit" onclick="window.location.href='index.php'" align="center" style="width: 190px;">

</form>
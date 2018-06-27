
<div class="form-area">
	<h2 class="formulario__titulo" style="color:#FFF; top:50%;">
		<b>
			Ingresar Fichas
		</b>
		<br/>
	</h2>
		<h5 class="fin">
		Ingrese las nuevas fichas de programas de formacion
	</h5>
	<hr color="#999999">
	<form action="fichas_.php" method="post">
		<p>Numero de la ficha</p>
			<input type="text" name="n_ficha" placeholder="Ficha"><br>
				<p>Nombre del programa</p>
		<input type="text" name="nom_ficha" placeholder="Nombre del programa"><br><br>
		<center>
			<input type="reset" value="Consultar fichas" class="submit" onclick="window.location.href='../controladores/controlar.php?n=ficon'">''''<input type="submit" value="Guardar" align="center">
		</center>
	</form>
</div>

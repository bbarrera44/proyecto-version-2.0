<div class="form-area" style=" top:55%;">
	<h2 class="formulario__titulo" style="color:#FFF;"><b>Consultar</b><br />
		<h5 class="fin">Dijie el numero de documento para ver si el aprendiz tiene alguna novedad</h5></h2>
	<hr color="#999999">
<br />

<form action="../controladores/controlar.php?n=novdoc" method="post">
	<p>Numero de Documento</p>
		<input type="text" name="documento" placeholder="Numero de documento">
			<br />
				<br />
					<br />
				<center>
  			<input type="reset" value="Atras" class="submit" onclick="javascript:window.history.back();" style="width: 190px;">
  		<input type="submit" value="Consultar" align="center" style="width: 190px;">
	</center>  
</form>
</div>
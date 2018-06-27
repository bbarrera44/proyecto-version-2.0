<div class="login-box" >
<h1>Ingresar aprendiz</h1>
<?php 
if(isset($_COOKIE['apren_exist'])){ 
	echo "<center><p style='color: red;'>".$_COOKIE['apren_exist']."</p></center>";
	setcookie("apren_exist","",time()-1000,"/");
} 
	?>
<form action="../controladores/in_aprendices.php" method="post">
	<table border="0" width="90%" align="center">
		<tr>
			<td><h3>Nombres:<center><br><div class="nom"><input type="text" name="nombres" required></div></center></h3></td>

			<td><h3>Apellidos:<center><br><div class="nom"><input type="text" name="apellidos" required></div></center></h3></td>
		</tr>
		<tr>
			<td><h3>Documento:<center><br><div class="nom"><input type="text" name="documento" required></div></center></h3></td>

			<td><h3>Telefono:<center><br><div class="nom"><input type="text" name="telefono" required></div></center></h3></td>
		</tr>
		<tr>
			<td><h3>Celular:<center><br><div class="nom"><input type="text" name="celular" required></div></center></h3></td>

			<td><h3>Ficha:<br><div class="nom"></h3><center>
				<?php
				$cxn=new DatabaseNovedades("localhost","proyecto","root","");
				echo "<div class='nom'>";
				$cxn->selFichas('selec');
				 ?>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><br><input type="submit" value="Guardar"></td>
		</tr>
	</table>
	<br>
</div >
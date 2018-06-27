<?php 

$usuario=Consultar::consultarUsuario($_COOKIE['usuarioo'],'us');

$usuario=Consultar::consultarUsuario($_COOKIE['usuarioo']);

?>
<br>
<h1>Perfil</h1>

<?php foreach ($usuario as $reg): ?>
	

<form action="../controladores/controlar.php?n=actualizarDatos" method="post">
<center>
<img src="../img/avatar.PNG" class="avatar">
<table border="0" width="90%" class="tabla">
	<tr>
		<td colspan="2"><h2>Nombre de usuario<br><center><div class="nom"><?php echo $reg['nombre_usuario']; setcookie("nombre_usuario","$reg[nombre_usuario]",time()+(60*60),"/"); ?>
		    </div><hr color="#FFFFFF" width="90%"/></h2><center></td>
	</tr>
	<tr>
		<td><h3>Nombres<center><br><div class="nom"><?php echo $reg['nombres']; setcookie("nombres","$reg[nombres]",time()+(60*60),"/"); ?></center></h3><hr color="#FFFFFF" width="90%"/></div></td>
		<td><h3>Apellidos<center><br><div class="nom"><?php echo $reg['apellidos']; setcookie("apellidos","$reg[apellidos]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></td>
	</tr>
	<tr>
		<td><h3>Cargo<center><br><div class="nom"><?php echo $reg['cargo']; setcookie("cargo","$reg[cargo]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Documento<center><br><div class="nom"><?php echo $reg['numero_documento']; setcookie("numero_documento","$reg[numero_documento]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Direccion<center><br><div class="nom"><?php echo $reg['direccion']; setcookie("direccion","$reg[direccion]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Correo<center><br><div class="nom"><?php echo $reg['correo']; setcookie("correo","$reg[correo]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Telefono<center><br><div class="nom"><?php echo $reg['telefono']; setcookie("telefono","$reg[telefono]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Celular<center><br><div class="nom"><?php echo $reg['celular']; setcookie("celular","$reg[celular]",time()+(60*60),"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
</table> <br>
<br>
<input type="button" value="Atras" class="submit" onClick="window.location.href='index.php'"/>
<input type="submit" value="Actualizar informacion" >


</form>
<table border="0" class="tabla" width="90%">
	<tr>
		<td align="center">
			<?php endforeach; Consultar::consultarUsuario($_COOKIE['usuarioo'],'bo'); ?>
		</td>
	</tr>
</table>
</center>
<br><br><br><br><br><br><br>

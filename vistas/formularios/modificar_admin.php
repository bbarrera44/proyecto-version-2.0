<div class="login-box" style="top:60%; height: 900px;">
<br>
<h1>Actualizar datos</h1>
	<?php 
require_once '../controladores/consultar.php';

$registro=Consultar::consultarUsuarioAc($_SESSION['documento']);

	foreach($registro as $reg){

?>
<form action="../controladores/modificar_us.php" method="post">
	<table border="0" width="90%" align="center">
	<tr>
		<td colspan="4" align="center">
			<h3>Nombre de usuario:</h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_nombre_usuario" value="<?php echo $reg['nombre_usuario'];?>">
				</div>
			</center>
		</td>
	</tr>
	<tr>
		<td>
			<h3>Nombres:</h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_nombres" value="<?php echo $reg['nombres'];?>">
				</div>
			</center>
		</td>
		<td>
			<h3>Apellidos:</h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_apellidos" value="<?php echo $reg['apellidos'];?>">
				</div>
			</center>
		</td>
	</tr>
	<tr>
		<td>
			<h3>Cargo</h3>
			<center>
				<br>
				<div class="nom">
					<select name="us_cargo" class="selec">
						<option value="Seleccione" style="color:#000;">Seleccione</option>
						<option value="Administracion" style="color:#000;">Administracion</option>
						<option value="Apoyo_de_administracion" style="color:#000;">Apoyo de administracion</option>
						<option value="Instructor" style="color:#000;">Instructor</option>
						<option value="Bienestar" style="color:#000;">Bienestar</option></select>
					</div>
				</center>
			</td>
			<td>
				<h3>Documento:</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" name="us_documento" value="<?php echo $reg['numero_documento']; setcookie("mindoc",$reg['numero_documento'],time()+(60*60),"/"); ?>">
					</div>
				</center>
			</td>
	</tr>
	<tr>
		<td>
			<h3>Direccion:</h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_direccion" value="<?php echo $reg['direccion'];?>">
				</div>
			</center>
		</td>
		<td>
			<h3>Correo:</h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_correo" value="<?php echo $reg['correo'];?>">
				</div>
			</center>
		</td>
	</tr>
	<tr>
		<td>
			<h3>Telefono:</h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_telefono" value="<?php echo $reg['telefono'];?>">
				</div>
			</center>
		</td>
		<td>
			<h3>Celular: </h3>
			<center>
				<br>
				<div class="nom">
					<input type="text" name="us_celular" value="<?php echo $reg['celular'];?>">
				</div>
			</center>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center">
			<br>
			<input type="submit" value="Finalizar">
		</td>
	</tr>
	</table>	
</form>
<?php 
	}
?><br><br>
<br><br>
<br><br>
<br><br>

</div>


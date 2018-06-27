<?php
	require '../includes/security.php';
	Security::permisosdispersos();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../img/logo.png" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="../css/cl.css">
<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
</head>
<body>
<?php include('menu.php');?>
<form action="../controladores/registro_.php" class="formulario" method="post">

<h1 class="formulario__titulo"><b style="color:#000";>Datos de identificacion</b></h1>
<h4 class="fin" style="color:#000";>Bienvenido, aqui podras registrarte en nuestro programa</h4>
<?php 
if(isset($_COOKIE['apren_exist'])){ 
	echo "<center><p style='color: red;'>".$_COOKIE['apren_exist']."</p></center>";
	setcookie("apren_exist","",time()-1000,"/");
} 
if(isset($_COOKIE['us_inco'])){ 
	echo "<center><p style='color: red;'>".$_COOKIE['us_inco']."</p></center>";
	setcookie("us_inco","",time()-1000,"/");
}
?>
<hr></hr>
<br /><br />
<br />
<input type="text" class="formulario__input" name="n_usuario" required><label for="" class="formulario__label">Nombre de usuario</label>

<input type="text" class="formulario__input" name="nombres" required><label for="" class="formulario__label">Nombres</label>

<input type="text" class="formulario__input" name="apellidos" required><label for="" class="formulario__label">Apellidos</label>

<h3 class="da">Tipo Documento</h3>

<select  name="tipo_documento" class="formulario__iinput">
  <option value="Seleccionar" selected="selected">Seleccionar</option>
  <option value="C.C">Cedula de ciudadania</option>
  <option value="T.I">Tarjeta de identidad</option>
  <option value="C.E">Cedula de extranjeria</option>
  <option value="Pasaporte">Pasaporte</option>
  <option value="D.N.I">Documento nacional de identificacion </option>
 </select>

<input type="text" class="formulario__input" name="n_documento" onkeypress="return justNumbers(event);" required><label for="" class="formulario__label">No. de documento</label>

<input type="password" class="formulario__input" name="con1" required><label for="" class="formulario__label">Contraseña</label>

<input type="password" class="formulario__input" name="con2" required><label for="" class="formulario__label">Confirme su contraseña</label>

<h3 class="da">Cargo</h3>
<?php 
	$conexion=mysqli_connect("localhost","root","","proyecto") or die (mysqli_error($conexion));

	$registro=mysqli_query($conexion,"select cargo from usuario where cargo='Administracion'") or die (mysqli_error($conexion));

	if($reg=mysqli_fetch_array($registro)) {
		
			?>
<select  name="cargo" class="formulario__iinput">
	<option value="Seleccione" selected="selected" >Seleccione</option>
	<option value="Instructor">Instructor</option>
	<option value="Bienestar">Bienestar</option>
	<option value="Apoyo de administracion">Apoyo de administracion</option>
 </select>

		<?php
	}
	else{
		?>
	
<select  name="cargo" class="formulario__iinput">
	<option value="Seleccione" selected="selected" >Seleccione</option>
	<option value="Instructor">Instructor</option>
	<option value="Bienestar">Bienestar</option>
	<option value="Administracion">Adminsitracion</option>
	<option value="Apoyo de administracion">Apoyo de administracion</option>
 </select>
	<?php
	
}
mysqli_close($conexion);
?>
<h3 class="da">Genero</h3>
<select name="genero" class="formulario__iinput">
	<option value="Seleccione" selected="selected">Seleccione</option>
	<option value="masculino">Masculino</option>
	<option value="femenino">Femenino</option>
</select>

<input type="text" class="formulario__input" name="direccion" required>
<label for="" class="formulario__label">Direccion</label>

<?php if(isset($_COOKIE['correo_in'])){
	echo "<center><p style='color: red;'>".$_COOKIE['correo_in']."</p></center>";
	setcookie("correo_in","",time()-1000,"/");
}
?>
<input type="text" class="formulario__input" name="correo" quired><label for="" class="formulario__label">Correo electronico</label>

<input type="text" autocomplete="off" class="formulario__input" name="cocorreo" required><label for="" class="formulario__label">Confirme su correo</label>

<input type="text" class="formulario__input" name="telefono" onkeypress="return justNumbers(event);" required><label for="" class="formulario__label">Telefono</label>

<input type="text" class="formulario__input" name="celular" onkeypress="return justNumbers(event);" required><label for="" class="formulario__label">Celular</label>

<input type="reset" value="Atras" class="submit" onclick="javascript:window.history.back();">
<input type="reset" value="Limpiar" onclick="location.reload()">
<input type="submit" value="Finalizar">


</form>

<script src="form.js"></script>

<br>

</body>
</html>
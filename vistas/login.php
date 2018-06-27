<?php 
	require_once '../includes/security.php';

	Security::permisosdispersos();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
	<link rel="icon" href="../img/logo.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/css_login.css">
</head>
<body>
	<?php include('menu.php'); ?>
<br />

<div class="login-box">
	<img src="../img/avatar.png" class="avatar">
	<h1>Iniciar Sesion</h1>
		<form action="../controladores/logiin.php" method="post">
			<p>Usuario</p>
				<input type="text" name="i_usuario" placeholder="Ingrese su usuario">
					<p>Contraseña</p>
						<input type="password" name="i_contrasena" placeholder="Ingrese su contraseña" autocomplete="off">
					<input type="submit" value="Iniciar Sesion">
				<br>
			<center>
		<a href="recuperarcontrasena.php" style="text-decoration: none;">¿Has olvidado tu contraseña?</a><br>
	<a href="registro.php" style="text-decoration: none;">Crear cuenta</a>
<?php
   Security::loginincorrecto();
  ?>
</center>

</form>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
<?php include('menu.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="icon" href="../img/logo.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SABAJ/Registro</title>
	<link rel="stylesheet" type="text/css" href="../css/css_login.css">
	<link rel="stylesheet" type="text/css" href="../css/cssdeaplazaymas.css">
</head>

<body>
<div class="login-box">
<div class="slider" align="center">

<?php
	if (isset($_COOKIE['correcto'])){
		echo "<h1>Perfecto</h1><br><h5>El usuario fue registrado correctamente</h5>";
		echo "<br />";
		echo "<input type=\"submit\" class=\"formulario__submit\" value=\"Iniciar Sesion\" onClick=\" window.location.href='login.php' \"/>";
		echo "<input type=\"submit\" class=\"formulario__submit\" value=\"Finalizar\" onClick=\" window.location.href='../index.php' \"/>";}
	elseif (isset($_COOKIE['incorrecto'])) {
		echo "<h1>La contraseña o el correo no coinciden</h1><br><h4>Por favor volverlo a intentar y verificar</h4><br><br><br>";
		echo "<input type=\"submit\" class=\"formulario__submit\" value=\"Volver al Inicio\" onClick=\" window.location.href='../index.php' \"/>";}
?>

</div>
</body>
</html>
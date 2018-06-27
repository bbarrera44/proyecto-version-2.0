<?php
	require_once '../includes/security.php';
	require_once '../includes/DB.php';

	Security::permisos();

	$actualizar=new Database('localhost','proyecto','root','');
	$actualizar->actualizarUsuario($_POST['usuario_ac'],$_POST['documento_ac'],$_POST['nombres_ac'],$_POST['apellidos_ac'],$_POST['direccion_ac'],$_POST['correo_ac'],$_POST['telefono_ac'],$_POST['celular_ac'],$_COOKIE['usuarioo'],$_POST['contrasena_ac']);
	header("Location: controlar.php?n=completado")

?>
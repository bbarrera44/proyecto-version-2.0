<?php 
require_once '../controladores/consultar.php';
require_once '../includes/security.php';

Security::permisos();

Consultar::acByAdmin($_POST['us_nombre_usuario'],$_POST['us_nombres'],$_POST['us_apellidos'],$_POST['us_documento'],$_POST['us_direccion'],$_POST['us_correo'],$_POST['us_telefono'],$_POST['us_celular'],$_COOKIE['mindoc'],$_POST['us_cargo']);

header("Location: controlar.php?n=completado")
?>
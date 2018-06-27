<?php
require '../includes/security.php';
require '../includes/securityRegistro.php';


$sec=new Security();
$sec->permisosdispersos();

$registro=new SecurityRegistro($_POST['cargo'],filter_var($_POST['n_usuario'],FILTER_SANITIZE_STRING),$_POST['tipo_documento'],$_POST['n_documento'],$_POST['nombres'],$_POST['apellidos'],$_POST['direccion'],$_POST['correo'],$_POST['cocorreo'],$_POST['telefono'],$_POST['celular'],$_POST['con1'],$_POST['con2'],password_hash($_POST['con1'],PASSWORD_BCRYPT),$_POST['genero']);
$registro->registro_completo();

?>
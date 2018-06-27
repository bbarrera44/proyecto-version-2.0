<?php 

require_once '../includes/security.php';
require_once '../includes/DB.php';

Security::permisos();

$aprendiz=new Database('localhost','proyecto','root','');
$aprendiz->ingresarAprendiz($_POST['nombres'],$_POST['apellidos'],$_POST['documento'],$_POST['telefono'],$_POST['celular'],$_POST['ficha']);
?>

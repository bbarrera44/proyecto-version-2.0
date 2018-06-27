<?php

require_once '../includes/security.php';
require_once '../includes/clases.php';

Security::permisos();

$insert=new Novedades($_POST['ficha_anterior'],$_POST['nombres'],$_POST['apellidos'],$_POST['documento'],$_POST['fecha_reingreso'],$_POST['solicitud'],$_POST['descripcion'],$_POST['tipo_documento']);
$insert->reingreso($_POST['ficha']);
?>
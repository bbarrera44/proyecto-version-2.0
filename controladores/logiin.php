<?php
require '../includes/security.php';

	$logiin=new Security();
	$logiin->contrasena($_POST["i_usuario"],$_POST["i_contrasena"]);

?>
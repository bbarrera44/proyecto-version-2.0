<?php 
session_start();

require_once '../includes/security.php';
require_once '../controladores/consultar.php';
require_once '../includes/DB.php';

Security::permisos();

if(isset($_GET['aprendices'])) $dato=$_GET['aprendices']; 
if(isset($_GET['usuario'])) $dato=$_GET['usuario'];

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../img/logo.png" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="../css/css_usuario.css">	
</head>
<body>

<?php 

	include ('menu.php');

	include ("formularios/".$dato.".php");
?>
</body>
</html>

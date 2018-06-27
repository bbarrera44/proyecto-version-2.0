<?php 

require_once '../includes/security.php';
require_once '../includes/novedades.php';

Security::permisos();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="../img/logo.png" />
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  		<title>SABAJ</title>
  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/css_de_consultar.css">
</head>

<body>
<?php 

  include('menu.php');

  include("formularios/".$_GET['aprendices'].".php");

?>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
<?php 
if (empty($_COOKIE['usuarioo'])) {
  header("location: index.php");
}
$conexion=mysqli_connect("localhost","root","","proyecto") or die(mysqli_error($conexion));

$conexion=mysqli_query($conexion,"insert into fichas(ficha,n_programa) values ('$_POST[n_ficha]','$_POST[nom_ficha]')") or die(mysqli_error($conexion));

mysqli_close($conexion);

header ("location: complete.php");
?>
<?php 
if (empty($_COOKIE['usuarioo'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/logo.png" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="css/css_usuario.css">
</head>
<body>
	<?php include('vistas/menu.php');?>
<form action="descargar.php" method="post">
<?php 
$con=0;
  $conexion=mysqli_connect("localhost","root","","proyecto") or die (mysqli_error($conexion));

  mysqli_query($conexion,"select n_documento from deserciones inner join reingreso on deserciones.n_documento=reingreso.documento") or die (mysqli_error($conexion));

  $registro=mysqli_query($conexion,"select * from deserciones where n_documento='$_POST[num_documento]'") or die (mysqli_error($conexion));

if ($con==0){
if ($reg=mysqli_fetch_array($registro)) {
$con=$con+1;
 ?>
 <div class="login-box" style="height: 775px; top: 60%; bottom: 30%">
 <table border="0" width="90%" class="tabla" align="center">
	<tr>
		<td colspan="2"><h2>Desercion</h2><br><h3>Datos del aprendiz</h3><center><div class="nom">
		    </div><hr color="#FFFFFF" width="90%"/><center></td>
	</tr>
	<tr>
		<td><h3>Ficha<center><br><div class="nom"><?php echo $reg['ficha_desercion']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Nombres y apellidos<center><br><div class="nom"><?php echo $reg['nombres']." ".$reg['apellidos']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Tipo de documento<center><br><div class="nom"><?php echo $reg['tipo_documento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Documento<center><br><div class="nom"><?php echo $reg['n_documento']; setcookie("documento",$reg['n_documento'],time()+1000*10,"/"); ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Fecha de solicitud<center><br><div class="nom"><?php echo $reg['fecha_solicitud']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Motivo<center><br><div class="nom"><?php echo $reg['motivo_desercion']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Descripcion<center><br><div class="nom"></h3><h4><?php echo $reg['descripcion_desercion']; ?></h4><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	</div>
</table>

 <?php
  }
}
  $registro=mysqli_query($conexion,"select * from aplazamientos where n_documento='$_POST[num_documento]'") or die (mysqli_error($conexion));

if ($con==0){
if ($reg=mysqli_fetch_array($registro)) {
	$con=$con+1;
 ?>
 <div class="login-box" style="height: 775px; top: 60%; bottom: 30%">
 <table border="0" width="90%" class="tabla" align="center">
	<tr>
		<td colspan="2"><h2>Aplazamiento</h2><br><h3>Datos del aprendiz</h3><center><div class="nom">
		    </div><hr color="#FFFFFF" width="90%"/><center></td>
	</tr>
	<tr>
		<td><h3>Ficha<center><br><div class="nom"><?php echo $reg['ficha_aplazamiento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Nombres y apellidos<center><br><div class="nom"><?php echo $reg['aprendiz_aplazamiento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Tipo de documento<center><br><div class="nom"><?php echo $reg['tipo_documento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Documento<center><br><div class="nom"><?php echo $reg['n_documento']; setcookie("documento",$reg['n_documento'],time()+1000*10,"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Fecha de solicitud<center><br><div class="nom"><?php echo $reg['fecha_solicitud']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Motivo<center><br><div class="nom"><?php echo $reg['motivo_aplazamiento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Descripcion<center><br><div class="nom"></h3><h4><?php echo $reg['descripcion_aplazamiento']; ?></h4><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
</table>
</div>
 <?php
  }
}
  $registro=mysqli_query($conexion,"select * from retirovoluntario where documento='$_POST[num_documento]'") or die (mysqli_error($conexion));

if ($con==0){
if ($reg=mysqli_fetch_array($registro)) {
	$con=$con+1;
 ?>
 <div class="login-box" style="height: 775px; top: 60%; bottom: 30%">
 <table border="0" width="90%" class="tabla" align="center">
	<tr>
		<td colspan="2"><h2>Retiro Voluntario</h2><br><h3>Datos del aprendiz</h3><center><div class="nom">
		    </div><hr color="#FFFFFF" width="90%"/><center></td>
	</tr>
	<tr>
		<td><h3>Ficha<center><br><div class="nom"><?php echo $reg['ficha_retiro']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Nombres y apellidos<center><br><div class="nom"><?php echo $reg['nombre_aprendiz']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Tipo de documento<center><br><div class="nom"><?php echo $reg['tipo_documento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Documento<center><br><div class="nom"><?php echo $reg['documento']; setcookie("documento",$reg['documento'],time()+1000*10,"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Fecha de solicitud<center><br><div class="nom"><?php echo $reg['fecha_retiro']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Motivo<center><br><div class="nom"><?php echo $reg['motivo_retiro']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Descripcion<center><br><div class="nom"></h3><h4><?php echo $reg['descripcion_retiro']; ?></h4><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
</table>
</div>
 <?php
  }
}
  $registro=mysqli_query($conexion,"select * from reingreso where documento='$_POST[num_documento]'") or die (mysqli_error($conexion));

if ($con==0){
if ($reg=mysqli_fetch_array($registro)) {
	$con=$con+1;
 ?>
 <div class="login-box" style="height: 775px; top: 60%; bottom: 30%">
 <table border="0" width="90%" class="tabla" align="center">
	<tr>
		<td colspan="2"><h2>Reingreso</h2><br><h3>Datos del aprendiz</h3><center><div class="nom">
		    </div><hr color="#FFFFFF" width="90%"/><center></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Nombres y apellidos<center><br><div class="nom"><?php echo $reg['nombre_aprendiz']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Ficha anterior<center><br><div class="nom"><?php echo $reg['ficha_anterior']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Ficha a ingresar<center><br><div class="nom"><?php echo $reg['ficha_ingresar']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Tipo de documento<center><br><div class="nom"><?php echo $reg['tipo_documento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Documento<center><br><div class="nom"><?php echo $reg['documento']; setcookie("documento",$reg['documento'],time()+1000*10,"/");?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Fecha de solicitud<center><br><div class="nom"><?php echo $reg['fecha_reingreso']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Motivo<center><br><div class="nom"><?php echo $reg['motivo_reingreso']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Descripcion<center><br><div class="nom"></h3><h4><?php echo $reg['descripcion_reingreso']; ?></h4><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
</table>
</div>
 <?php
  }
}
  if ($con==0) {
	echo "<div class=\"login-box-else\" style=\"height: 250px;\">";
  	echo "<br><br><h2><b>El aprendiz no presenta ninguna novedad<b></h2><br><hr color=\"#FFFFFF\" width=\"90%\"/>";
  }
?>
<center>
	
<input type="reset" value="Atras" class="submit" onclick="javascript:window.history.back();" style="width: 190px;">
<input type="submit" value="Generar Reporte" class="submit" onclick="javascript:window.history.back();" style="width: 190px;">
<input type="reset" value="Finalizar" class="submit" onclick="window.location.href='index.php'" align="center" style="width: 190px;">
</center><br><br><br><br>
</div>
</form>
</body>
</html>

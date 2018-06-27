<?php

require_once 'DB.php';
require_once 'novedades.php';

class Comprovaciones
{
	
	public function comprovarContra($login,$usuario,$contrasena){

		while ($row=$login->fetch(PDO::FETCH_ASSOC)){

    		if($contrasena==password_verify($contrasena,$row['contrasena']) && $row['nombre_usuario']==$usuario){

    			setcookie("usuarioo",$usuario,time()+(60*60*24*365),"/");
    			header("Location: ../index.php");
  			}
  			elseif($row['nombre_usuario']!=$usuario || $contrasena!=password_verify($contrasena,$row['contrasena'])) {

   				$incorrecto="Usuario o contraseña incorrectos, por favor verificar";
    			setcookie("incorrecto",$incorrecto,time()+(60),"/");
    			header("Location: ../vistas/login.php");
 			}
		}
	}

	public function comprovarregistro($rowistro,$n_documento,$n_usuario){

		foreach ($rowistro as $row) {
	
			if ($n_documento==$row['numero_documento']){
			
				setcookie("apren_exist","El numero de documento ya esta en uso, por favor intente con otro",time()+(60*60),"/");
				
				header("location: rowistro.php");
			
			}
			
			else if ($n_usuario==$row['nombre_usuario']) {
			
				setcookie("us_inco","El nombre de usuario ya esta rowistrado, intente nuevamente",time()+(60*60),"/");
			
				header("location: rowistro.php");
			}
		}
	}

	public function comprovarCargo($menu){

		foreach ($menu as $row) {
			if (($row['cargo']=="Administracion") or ($row['cargo']=="Apoyo_de_administracion")) {
				echo "<li><a href=\"../controladores/controlar.php?n=con\">Aprendices</a></li>";
				echo "<li><a href=\"../controladores/controlar.php?n=d\">Desercion</a></li>";
				echo "<li><a href=\"../controladores/controlar.php?n=a\">Aplazamiento</a></li>";
				echo "<li><a href=\"../controladores/controlar.php?n=r\">Reingreso</a></li>";
				echo "<li><a href=\"../controladores/controlar.php?n=re\">Retiro voluntario</a></li>";
				echo "<li><a href=\"../controladores/controlar.php?n=fi\">Fichas</a></li>";
			}else{
				
				echo "<li><a href=\"../controladores/controlar.php?n=con\">Aprendices</a></li>";				
			}			
		}
	}

	public function comAdmin($menu){

		foreach ($menu as $row) {
			
			if ($row['cargo']=="Administracion"){

  				echo "<input type=\"reset\" value=\"Ingresar Aprendiz\" onclick=\"window.location.href='../controladores/controlar.php?n=ina'\">";

  			}else{

  				echo "<input type=\"reset\" value=\"Bienvenido\">";
  			}
		}

	}

	public function registroAprendiz($ingresar,$nombres,$apellidos,$documento,$telefono,$celular,$ficha){
		
		foreach ($ingresar as $row){
			
			if ($documento==$row['documento']){
			setcookie("apren_exist","El aprendiz ya se encuentra rowistrado en la base de datos",time()+(1000*1000),"/");
			header("location: ../vistas/consultar.php?aprendices=ingresar_aprendiz");
			}else{
				$aprendiz=new Database('localhost','proyecto','root','');
				$aprendiz->aprendices($nombres,$apellidos,$documento,$telefono,$celular,$ficha);
			}
		}
	}

	public function fichas($ficha,$class='formulario__input'){
		
		 echo "<select name='ficha' class='$class'>";
          echo "<option value=\"seleccionar\" >Seleccione</option>";
          
          foreach($ficha as $row){
          
            echo "<option value=\"$row[ficha]\" >".$row['ficha']."-".$row['n_programa']."</option>";
         
          }
          echo "<select>";
	}

	public function formularioConsultar($comprovar,$novedad){

		foreach ($comprovar as $row) {
?>

 <div class="login-box" style="height: 775px; top: 55%; bottom: 30%">
 <table border="0" width="90%" class="tabla" align="center">
	<tr>
		<td colspan="2"><h2><b><?php echo $novedad ?></b></h2><br><h3>Datos del aprendiz</h3><center><div class="nom">
		    </div><hr color="#FFFFFF" width="90%"/><center></td>
	</tr>
	<tr>
		<td><h3>Ficha<center><br><div class="nom"><?php echo $row['ficha']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Nombres y apellidos<center><br><div class="nom"><?php echo $row['nombres']." ".$row['apellidos']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Tipo de documento<center><br><div class="nom"><?php echo $row['tipo_documento']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Documento<center><br><div class="nom"><?php echo $row['documento']; setcookie("documento",$row['documento'],time()+1000*10,"/"); ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td><h3>Fecha de solicitud<center><br><div class="nom"><?php echo $row['fecha_solicitud']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
		<td><h3>Motivo<center><br><div class="nom"><?php echo $row['motivo']; ?></h3><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Descripcion<center><br><div class="nom"></h3><h4><?php echo $row['descripcion']; ?></h4><hr color="#FFFFFF" width="90%"/></div></center></td>
	</tr>
		</div>
			</table>
<?php
			if ($row['documento']!='') {

				return $con=1;
			}else{
				return $con=0;
			}
		}
	}

	public function formularioEstado($comprovar,$form){

		foreach($comprovar as $row){

			setcookie("estado",$form,time()+(60*60),"/");
			echo $form;
			if ($row['documento']!='') return $col=1; else return $col=0;			
		}
	}

	public function usCargo($usuario){
		
		foreach ($usuario as $row) {
			
			if ($row['cargo']=="Administracion"){?>

			<div class="login-box" style="height: 1240px;"><?php

	       	}else{?>

			<div class="login-box" style="height: 1080px;"><?php
			}
		}
	}

	public function botonUs($usuario)
	{
		foreach ($usuario as $row) {
			
			if ($row['cargo']=="Administracion"){
			echo "<h5>Al ser administrador usted puede modificar los datos de los demas usuarios. <br><br>";
			echo "Haga click en modificar para acceder a esta opcion.</h5></td></tr><tr><td align=\"center\">";
			echo "<input type=\"reset\" value=\"Modificar\" class=\"submit\" onclick=\"window.location.href='../controladores/controlar.php?n=mod_us'\" >";}
		}
	}

	public function botonApren($usuario)
	{
		foreach ($usuario as $row) {

			if ($row['cargo']=="Administracion"){
			echo "<input type=\"button\" value=\"Generar Reporte\" class=\"submit\" onClick=\"window.location.href='descargar.php'\"/>";
			}
		}
		
	}

	/*public function comprovarNovedad($novedad,$ficha,$nombres,$apellidos,$documento,$fecha_solicitud,$motivo,$descripcion,$tipo,$ingres){
	
		foreach ($novedad as $row) {			

			if ($row['documento']!='') {

				$dbd=new DatabaseNovedades('localhost','proyecto','root','');			
				$dbd->desercionIngresar($ficha,$nombres,$apellidos,$documento,$fecha_solicitud,$motivo,$descripcion,$tipo);
			
			}else{

				setcookie("novedad","El usuario no se encuentra rowistrado en la base de datos, La novedad no puede ser rowistrada",time()+1000*1000,"/");

				header("Location: ../vistas/complete.php");			
			}
		}
	}*/
}
?>
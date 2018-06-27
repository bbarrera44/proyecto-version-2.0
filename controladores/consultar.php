<?php 
require_once '../includes/DB.php';
require_once '../includes/novedades.php';

class Consultar {

	//public

	private function consultarAprendiz($documento){

		$con=0;

		$conexion=new DatabaseNovedades('localhost','proyecto','root','');

		if($con==0) $con=$conexion->selDeserciones($documento,'Desercion','Desercion');
		if($con==0) $con=$conexion->selAplazamientos($documento,'Aplazamiento','Aplazamiento');
		if($con==0) $con=$conexion->selReingreso($documento,'Reingreso','Reingreso');
		if($con==0) $con=$conexion->selRetirovoluntario($documento,'Retiro Voluntario','Reingreso');

  		if($con==0){

			echo "<div class=\"login-box-else\" style=\"height: 250px;\">";
  			echo "<br><br><h2><b>El aprendiz no se encuentra registrado en la base de datos<b></h2><br><hr color=\"#FFFFFF\" width=\"90%\"/>";
  		}

  		return $con;
	}

	public function consultarNovedad($documento){
		
		$con=0;

		$conexion=new DatabaseNovedades('localhost','proyecto','root','');

		if($con==0) $con=$conexion->selDeserciones($documento,'Desercion','consultar');
		if($con==0) $con=$conexion->selAplazamientos($documento,'Aplazamiento','consultar');
		if($con==0) $con=$conexion->selReingreso($documento,'Reingreso','consultar');
		if($con==0) $con=$conexion->selRetirovoluntario($documento,'Retiro Voluntario','consultar');

  		if($con==0){

			echo "<div class=\"login-box-else\" style=\"height: 250px;\">";
  			echo "<br><br><h2><b>El aprendiz no presenta ninguna novedad<b></h2><br><hr color=\"#FFFFFF\" width=\"90%\"/>";
  		}

  		return $con;
	}

	public function consultarEstado($documento){

		$col=0;
		$est=new DatabaseNovedades('localhost','proyecto','root','');

		if($col==0) $col=$est->esAplazamiento($documento,'Aplazado');
		if($col==0) $col=$est->esDesercion($documento,'Desertado');
		if($col==0) $col=$est->esReingreso($documento,'En proceso de reingreso');
		if($col==0) $col=$est->esRetirovoluntario($documento,'Retiro voluntario');

		if ($col==0){
			echo "En formacion";
			setcookie("estado","En formacion",time()+(60*60),"/");
		}
	}

	public function infoNovedad($documento){

		$info=new DatabaseNovedades('localhost','proyecto','root','');

		$inf=$info->selInfo($documento);

		return $inf;
	}

	public function menu($usuario,$value)
	{
		$menu=new Database('localhost','proyecto','root','');
		$menu->menu_($usuario,$value);	
	}

	public function consultarUsuario($usuario,$sel='')
	{
		$consultar=new Database('localhost','proyecto','root','');
		$usuario=$consultar->consultarUs($usuario,$sel);

		return $usuario;
	}

	public function consultarUsuarioAc($usuario)
	{
		$consultar=new Database('localhost','proyecto','root','');
		$usuario=$consultar->consultarUsAc($usuario);

		return $usuario;
	}

	public function acByAdmin($nombreus,$nombres,$apellidos,$documento,$direccion,$correo,$telefono,$celular,$numdoc,$cargo)
	{
		$consultar=new Database('localhost','proyecto','root','');
		$usuario=$consultar->actualizarUsAc($nombreus,$nombres,$apellidos,$documento,$direccion,$correo,$telefono,$celular,$numdoc,$cargo);

		return $usuario;
	}
}

?>
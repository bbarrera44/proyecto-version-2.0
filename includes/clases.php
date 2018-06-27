<?php 

require_once 'novedades.php';
require_once 'DB.php';

class Novedades{

	private $ficha;
	private $nombres;
	private $apellidos;
	private $documento;
	private $fecha_solicitud;
	private $motivo;
	private $descripcion;
	private $tipo_documento;

	function __construct($ficha,$nombres,$apellidos,$documento,$fecha_solicitud,$motivo,$descripcion,$tipo){
		
		$this->ficha=$ficha;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->documento=$documento;
		$this->fecha_solicitud=$fecha_solicitud;
		$this->motivo=$motivo;
		$this->descripcion=$descripcion;
		$this->tipo_documento=$tipo;
	}

	private function conexion(){

		$conexion=new PDO('mysql:host=localhost;dbname=proyecto','root','');

		return $conexion;
	}

	public function desercion(){

		$conexion=$this->conexion();
		$comprovar=$conexion->query("SELECT documento from aprendices");
		var_dump($comprovar);

		if($row=$comprovar->fetch(PDO::FETCH_ASSOC)) {						

		if($row['documento']==$this->documento){
			echo $row['documento'];
			$com=new DatabaseNovedades('localhost','proyecto','root','');
			$com->desercionIngresar($this->ficha,$this->nombres,$this->apellidos,$this->documento,$this->fecha_solicitud,$this->motivo,$this->descripcion,$this->tipo_documento);
			}elseif ($row['documento']!=$this->documento) {
			setcookie("novedad","El usuario no se encuentra registrado en la base de datos, La novedad no puede ser registrada",time()+1000*10,"/");
			}

			header("Location: ../vistas/complete.php");	
		}
	}
	public function aplazamiento(){

		$conexion=$this->conexion();
		$comprovar=$conexion->query("SELECT documento from aprendices");		

		if($row=$comprovar->fetch(PDO::FETCH_ASSOC)) {

			if($row['documento']==$this->documento){
			$com=new DatabaseNovedades('localhost','proyecto','root','');
			$com->aplazamientoIngresar($this->ficha,$this->nombres,$this->apellidos,$this->documento,$this->fecha_solicitud,$this->motivo,$this->descripcion,$this->tipo_documento);
			}elseif($row['documento']!=$this->documento){
			setcookie("novedad","El usuario no se encuentra registrado en la base de datos, La novedad no puede ser registrada",time()+1000*10,"/");
			}
		}
		header("Location: ../vistas/complete.php");	
	}

	public function reingreso($ingres){

		$conexion=$this->conexion();
		$comprovar=$conexion->query("SELECT documento from aprendices");

		if ($row=$comprovar->fetch(PDO::FETCH_ASSOC)) {

			if($row['documento']==$this->documento){
			$com=new DatabaseNovedades('localhost','proyecto','root','');
			$com->reingresoIngresar($this->ficha,$this->nombres,$this->apellidos,$this->documento,$this->fecha_solicitud,$this->motivo,$this->descripcion,$this->tipo_documento,$ingres);
			}elseif ($row['documento']!=$this->documento){
			setcookie("novedad","El usuario no se encuentra registrado en la base de datos, La novedad no puede ser registrada",time()+1000*10,"/");
			}
		}
		//header("Location: ../vistas/complete.php");	
	}

	public function retirovoluntario(){

		$conexion=$this->conexion();
		$comprovar=$conexion->query("SELECT documento from aprendices");

		if ($row=$comprovar->fetch(PDO::FETCH_ASSOC)) {

			if($row['documento']==$this->documento){
			$com=new DatabaseNovedades('localhost','proyecto','root','');
			$com->retirovoluntarioIngresar($this->ficha,$this->nombres,$this->apellidos,$this->documento,$this->fecha_solicitud,$this->motivo,$this->descripcion,$this->tipo_documento);
			}elseif ($row['documento']!=$this->documento){
			setcookie("novedad","El usuario no se encuentra registrado en la base de datos, La novedad no puede ser registrada",time()+1000*10,"/");
			}
		}


		echo $_COOKIE['novedad'];
		header("Location: ../vistas/complete.php");	
	}
}
?>
<?php 

require_once 'DB.php';
require_once 'comprovaciones.php';

class DatabaseNovedades extends Comprovaciones{

	private $host;
	private $database;
	private $user;
	private $password;

	function __construct($host,$database,$user,$password){

		$this->host=$host;
		$this->database=$database;
		$this->user=$user;
		$this->password=$password;
	}

	private function conexion(){

		$conexion = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);

		return $conexion;
	}

	public function selFichas($class='formulario__input'){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT * from fichas");
		$exe->execute();

		$this->fichas($exe,$class);
	}

	public function selAplazamientos($documento,$novedad,$form){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT * from aplazamientos inner join aprendices on aplazamientos.documento=aprendices.documento where aprendices.documento='$documento'");
		$exe->execute();

		switch ($form) {
			case 'consultar':$con=$this->formularioConsultar($exe,$novedad);
				break;

			case 'Desercion':$con=$this->formularioEstado($exe,$novedad,$form);
				break;

			case 'Aplazamiento':$con=$this->formularioEstado($exe,$novedad,$form);
				break;

			case 'Reingreso':$con=$this->formularioEstado($exe,$novedad,$form);
				break;

			case 'Retirovoluntario':$con=$this->formularioEstado($exe,$novedad,$form);
				break;
			
			default:
				# code...
				break;
		}	

		return $con;
	}

	public function selDeserciones($documento,$novedad){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT * from deserciones inner join aprendices on deserciones.documento=aprendices.documento where documento='$documento'");
		$exe->execute();

		$con=$this->formularioConsultar($exe,$novedad);

		return $con;
	}

	public function selReingreso($documento,$novedad){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT * from reingreso inner join aprendices on reingreso.documento=aprendices.documento where documento='$documento'");
		$exe->execute();

		$con=$this->formularioConsultar($exe,$novedad);

		return $con;
	}

	public function selRetirovoluntario($documento,$novedad){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT * from retirovoluntario inner join aprendices on retirovoluntario.documento=aprendices.documento where documento='$documento'");
		$exe->execute();

		$con=$this->formularioConsultar($exe,$novedad);

		return $con;
	}

	public function esAplazamiento($documento,$estado){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT aplazamientos.documento from aplazamientos inner join aprendices on aplazamientos.documento=aprendices.documento where aprendices.documento='$documento'");
		$exe->execute();

		$col=$this->formularioEstado($exe,$estado);

		return $col;
	}

	public function esDesercion($documento,$estado){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT deserciones.documento from deserciones inner join aprendices on deserciones.documento=aprendices.documento where aprendices.documento='$documento'");
		$exe->execute();

		$col=$this->formularioEstado($exe,$estado);

		return $col;
	}

	public function esReingreso($documento,$estado){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT reingreso.documento from reingreso inner join aprendices on reingreso.documento=aprendices.documento where aprendices.documento='$documento'");
		$exe->execute();

		$col=$this->formularioEstado($exe,$estado);

		return $col;
	}

	public function esRetirovoluntario($documento,$estado){

		$conexion=$this->conexion();
		$exe=$conexion->prepare("SELECT retirovoluntario.documento from retirovoluntario inner join aprendices on retirovoluntario.documento=aprendices.documento where aprendices.documento='$documento'");
		$exe->execute();

		$col=$this->formularioEstado($exe,$estado);

		return $col;
	}

	public function desercionIngresar($ficha,$nombres,$apellidos,$documento,$fecha,$motivo,$descripcion,$tipo){	

		$conexion=$this->conexion();
		$exe=$conexion->prepare("INSERT into deserciones (ficha,nombres,apellidos,documento,fecha_solicitud,motivo,descripcion,tipo_documento) values (:ficha,:nombres,:apellidos,:documento,:fecha,:motivo,:descripcion,:tipo)");
		$exe->bindParam(':ficha',$ficha,PDO::PARAM_STR);
		$exe->bindParam(':nombres',$nombres,PDO::PARAM_STR);
		$exe->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
		$exe->bindParam(':documento',$documento,PDO::PARAM_STR);
		$exe->bindParam(':fecha',$fecha,PDO::PARAM_STR);
		$exe->bindParam(':motivo',$motivo,PDO::PARAM_STR);
		$exe->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
		$exe->bindParam(':tipo',$tipo,PDO::PARAM_STR);
		$exe->execute();
	}

		public function aplazamientoIngresar($ficha,$nombres,$apellidos,$documento,$fecha,$motivo,$descripcion,$tipo){	

		$conexion=$this->conexion();
		$exe=$conexion->prepare("INSERT into aplazamientos (ficha,nombres,apellidos,documento,fecha_solicitud,motivo,descripcion,tipo_documento) values (:ficha,:nombres,:apellidos,:documento,:fecha,:motivo,:descripcion,:tipo)");
		$exe->bindParam(':ficha',$ficha,PDO::PARAM_STR);
		$exe->bindParam(':nombres',$nombres,PDO::PARAM_STR);
		$exe->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
		$exe->bindParam(':documento',$documento,PDO::PARAM_STR);
		$exe->bindParam(':fecha',$fecha,PDO::PARAM_STR);
		$exe->bindParam(':motivo',$motivo,PDO::PARAM_STR);
		$exe->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
		$exe->bindParam(':tipo',$tipo,PDO::PARAM_STR);
		$exe->execute();
	}

		public function reingresoIngresar($ficha,$nombres,$apellidos,$documento,$fecha,$motivo,$descripcion,$tipo,$ingres){	

		$conexion=$this->conexion();
		$exe=$conexion->prepare("INSERT into reingreso (ficha_anterior,ficha_ingresar,nombres,apellidos,documento,fecha_reingreso,motivo,descripcion,tipo_documento) values (:ficha,:inficha,:nombres,:apellidos,:documento,:fecha,:motivo,:descripcion,:tipo)");
		$exe->bindParam(':ficha',$ficha,PDO::PARAM_STR);
		$exe->bindParam(':inficha',$ingres,PDO::PARAM_STR);
		$exe->bindParam(':nombres',$nombres,PDO::PARAM_STR);
		$exe->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
		$exe->bindParam(':documento',$documento,PDO::PARAM_STR);
		$exe->bindParam(':fecha',$fecha,PDO::PARAM_STR);
		$exe->bindParam(':motivo',$motivo,PDO::PARAM_STR);
		$exe->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
		$exe->bindParam(':tipo',$tipo,PDO::PARAM_STR);
		$exe->execute();

		print_r($exe);
	}

		public function retirovoluntarioIngresar($ficha,$nombres,$apellidos,$documento,$fecha,$motivo,$descripcion,$tipo){	

		$conexion=$this->conexion();
		$exe=$conexion->prepare("INSERT into retirovoluntario (ficha,nombres,apellidos,documento,fecha_solicitud,motivo,descripcion,tipo_documento) values (:ficha,:nombres,:apellidos,:documento,:fecha,:motivo,:descripcion,:tipo)");
		$exe->bindParam(':ficha',$ficha,PDO::PARAM_STR);
		$exe->bindParam(':nombres',$nombres,PDO::PARAM_STR);
		$exe->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
		$exe->bindParam(':documento',$documento,PDO::PARAM_STR);
		$exe->bindParam(':fecha',$fecha,PDO::PARAM_STR);
		$exe->bindParam(':motivo',$motivo,PDO::PARAM_STR);
		$exe->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
		$exe->bindParam(':tipo',$tipo,PDO::PARAM_STR);
		$exe->execute();
	}

	public function selInfo($documento){

		$conexion=$this->conexion();
		$info=$conexion->prepare("SELECT * from aprendices inner join fichas on aprendices.ficha=fichas.ficha where documento='$documento'");
		$info->execute();

		return $info;
	}
}
?>
<?php 

require_once 'clases.php';
require_once 'comprovaciones.php';

class Database extends Comprovaciones
	{
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

		public function conexionLogin($usuario,$contrasena){
			try {
				
				$conexion=$this->conexion();
        		$login=$conexion->prepare("SELECT nombre_usuario,contrasena from usuario");
				$login->execute();

				$this->comprovarContra($login,$usuario,$contrasena);				

				} catch (Exception $e) {
					echo $e->getMessage();
			}			
		}

		public function registroVerificar($n_documento,$n_usuario){

			$conexion=$this->conexion();
			$registro=$conexion->prepare("SELECT nombre_usuario,numero_documento from usuario");
			$registro->execute();

			$this->comprovarRegistro($registro,$n_documento,$n_usuario);

		}

		public function menu_($usuario,$value){

			$conexion=$this->conexion();
			$menu=$conexion->prepare("SELECT cargo from usuario where nombre_usuario=:usuario");
			$menu->bindParam(':usuario',$usuario,PDO::PARAM_STR);
			$menu->execute();

			switch ($value) {
				
				case 'menu': $this->comprovarCargo($menu);break;

				case 'aprendiz': $this->comAdmin($menu);break;
				
				default: break;
			}
		}

		public function registroInsertar($cargo,$nombre_us,$tipo_documento,$num_doc,$nombres,$apellidos,$direccion,$correo,$telefono,$celular,$contraver,$genero){

			$conexion=$this->conexion();
			$exe=$conexion->prepare("INSERT into usuario (cargo,nombre_usuario,tipo_documento,numero_documento,nombres,apellidos,direccion,correo,telefono,celular,contrasena,genero) values ('$cargo','$nombre_us','$tipo_documento','$num_doc','$nombres','$apellidos','$direccion','$correo','$telefono','$celular','$contraver','$genero')");
			$exe->execute();

			header("Location: ../vistas/registro__.php");
		}

		public function aprendices($nombres,$apellidos,$documento,$telefono,$celular,$ficha){

			$conexion=$this->conexion();		
			$exe=$conexion->prepare("INSERT into aprendices (nombres_aprendiz,apellidos_aprendiz,documento,tel_aprendiz,cel_aprendiz,ficha) values ('$nombres','$apellidos','$documento','$telefono','$celular','$ficha')");
			$exe->execute();

			header("Location: ../vistas/complete.php");	
		}

		public function ingresarAprendiz($nombres,$apellidos,$documento,$telefono,$celular,$ficha){
			
			$this->inAprendiz($nombres,$apellidos,$documento,$telefono,$celular,$ficha);
		}

		private function inAprendiz($nombres,$apellidos,$documento,$telefono,$celular,$ficha){

			$conexion=$this->conexion();
			$in=$conexion->prepare("SELECT documento from aprendices");
			$in->execute();

			$this->registroAprendiz($in,$nombres,$apellidos,$documento,$telefono,$celular,$ficha);
		}


		public function consultarUs($usuario,$sel=''){

			$conexion=$this->conexion();
			$usuario=$conexion->prepare("SELECT * from usuario where nombre_usuario='$usuario'");
			$usuario->execute();

			switch ($sel) {

				case 'us': $this->usCargo($usuario); break;

				case 'bo': $this->botonUs($usuario); break;

				case 'apren': $this->botonApren($usuario); break;

				default: return $usuario; break;
			}
		}

		public function consultarUsAc($usuario,$sel=''){

			$conexion=$this->conexion();
			$usuario=$conexion->prepare("SELECT * from usuario where numero_documento='$usuario'");
			$usuario->execute();

			return $usuario;
		}

		public function actualizarUsuario($nombreus,$documento,$nombres,$apellidos,$direccion,$correo,$telefono,$celular,$nombreusuario,$contrasena){

			$conexion=$this->conexion();
			$actualizar=$conexion->prepare("UPDATE usuario set nombre_usuario='$nombreus',numero_documento='$documento',nombres='$nombres',apellidos='$apellidos',direccion='$direccion',correo='$correo',telefono='$telefono',celular='$celular' where nombre_usuario='$nombreusuario'");
			$actualizar->execute();

			if($contrasena!=""){
				$contrasena=password_hash($contrasena,PASSWORD_BCRYPT);

				$this->actualizarContrasena($contrasena,$nombreusuario);
			}
		}

		public function actualizarContrasena($contrasena,$nombreusuario){

			$conexion=$this->conexion();
			$registro=$conexion->prepare("UPDATE usuario set contrasena='$contrasena' where nombre_usuario='$nombreusuario'");
			$registro->execute();
		}

		public function actualizarUsAc($nombreus,$nombres,$apellidos,$documento,$direccion,$correo,$telefono,$celular,$numdoc,$cargo){

			$conexion=$this->conexion();
			$actualizar=$conexion->prepare("update usuario set nombre_usuario='$nombreus',nombres='$nombres', apellidos='$apellidos', numero_documento='$documento',direccion='$direccion',correo='$correo',telefono='$telefono',celular='$celular' where numero_documento='$numdoc'");
			$actualizar->execute();

			if($cargo!="Seleccione"){

				$this->actualizarCargoByAdmin($cargo,$nombreus);
			}
		}

		public function actualizarCargoByAdmin($cargo,$nombreusuario){

			$conexion=$this->conexion();
			$registro=$conexion->prepare("UPDATE usuario set cargo='$cargo' where nombre_usuario='$nombreus'");
			$registro->execute();
		}

		public function actualizarAprendiz($nombres,$apellidos,$documento,$telefono,$celular,$ficha,$docac)
		{
			$conexion=$this->conexion();
			$actualizar=$conexion->prepare("UPDATE aprendices set nombres_aprendiz='$nombres',apellidos_aprendiz='$apellidos',documento='$documento',tel_aprendiz='$telefono',cel_aprendiz='$celular' where documento='$docac'");
			$actualizar->execute();

			if ($ficha!='seleccionar') {
				$this->modFicha($ficha,$docac);
			}			
		}

		private function modFicha($ficha,$docac)
		{
			$conexion=$this->conexion();
			$con=$conexion->prepare("UPDATE aprendices set ficha='$ficha' where documento='$docac'");
			$con->execute();
		}

		/*public function verificarNovedad($noovedad,$ficha,$nombres,$apellidos,$documento,$fecha_solicitud,$motivo,$descripcion,$tipo,$ingres="0"){		
			
			$conexion=$this->conexion();
			$novedad=$conexion->query("SELECT aprendices.documento FROM aprendices INNER JOIN $noovedad ON aprendices.documento=$noovedad.documento WHERE aprendices.documento='$documento'");
			$novedad->fetchall();

			Comprovaciones::comprovarNovedad($novedad,$ficha,$nombres,$apellidos,$documento,$fecha_solicitud,$motivo,$descripcion,$tipo,$ingres);
		}*/
	}
?>
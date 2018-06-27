<?php

class SecurityRegistro extends Security{

  private $cargo;
  private $nombre_us;
  private $tipo_documento;
  private $num_doc;
  private $nombres;
  private $apellidos;
  private $direccion;
  private $correo;
  private $correo1;
  private $telefono;
  private $celular;
  private $con1;
  private $con2;
  private $contraver;
  private $genero;

function __construct($cargo,$nombre_us,$tipo_documento,$num_doc,$nombres,$apellidos,$direccion,$correo,$correo1,$telefono,$celular,$con1,$con2,$contraver,$genero){

  $this->cargo =  $cargo;
  $this->nombre_us =  $nombre_us;
  $this->tipo_documento =  $tipo_documento;
  $this->num_doc =  $num_doc;
  $this->nombres =  $nombres;
  $this->apellidos =  $apellidos;
  $this->direccion =  $direccion;
  $this->correo =  $correo;
  $this->correo1 =  $correo1;
  $this->telefono =  $telefono;
  $this->celular =  $celular;
  $this->con1 = $con1;
  $this->con2 = $con2;
  $this->contraver =  $contraver;
  $this->genero =  $genero;
}

private function validar_correo($correo){
    
  if (filter_var($correo, FILTER_VALIDATE_EMAIL)){} 
  else{
    echo "<script language='JavaScript'>alert ('El correo electronico ingresado no es valido'); </script>";
  }
}

public function validar_correo_contrasena($con1,$con2,$correo1,$correo2){
  if (($con1==$con2) && ($correo1==$correo2)){
    setcookie("correcto","El usuario fue registrado correctamente",time()+80,"/");
  }
    else{
      setcookie("incorrecto","El correo o la contraseña no son iguales, por favor verificar",time()+80,"/");
    }
}

public function registro_completo(){

    $data=new Database("localhost","proyecto","root","");

    $this->validar_correo($this->correo);
    $this->validar_correo_contrasena($this->con1,$this->con2,$this->correo,$this->correo1);

    $data->registroVerificar($this->num_doc,$this->nombre_us);
    $data->registroInsertar($this->cargo,$this->nombre_us,$this->tipo_documento,$this->num_doc,$this->nombres,$this->apellidos,$this->direccion,$this->correo,$this->telefono,$this->celular,$this->contraver,$this->genero);
  }
  
}

?>
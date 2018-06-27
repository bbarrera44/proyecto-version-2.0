<?php 

require_once 'DB.php';

class Security{

  public function permisos(){

    if (empty($_COOKIE['usuarioo'])) {

      header("location: index.php");
    }else{}
    
  }

  public function permisosdispersos(){

    if (isset($_COOKIE['usuarioo'])) {
      
     header("location: index.php");
    }else{}
    
  }

  public function comprovar(){

    $data=new Database("localhost","proyecto","root","");
    $conexion=$data->conexion();
    $execute = $conexion->prepare("SELECT cargo from usuario where nombre_usuario=:nombre");
    $execute->execute(array(':nombre' => '$_COOKIE[usuarioo]'));

  foreach ($execute as $row) {
   
    if (($row['cargo']=="Administracion") or ($row['cargo']=="Apoyo_de_administracion")) {
     
    }else{header("Location: index.php");}
  }

  }

  public function loginincorrecto(){

     if (isset($_COOKIE['incorrecto'])){
        echo "<center><h7><p style='color:red;'>".$_COOKIE['incorrecto']."</p></h7></center>";}
        setcookie("incorrecto","",time()+1000,"/");
  }

  public function contrasena($usuario,$contrasena){

    try {

    $data=new Database("localhost","proyecto","root","");
    $data->conexionLogin($usuario,$contrasena);

    }catch (Exception $e) {  
          echo $e->getMessage();
    }
  }


}

?>
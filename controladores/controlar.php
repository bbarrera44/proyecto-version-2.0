<?php 
session_start();

switch ($_GET['n']) {

	case 'd':

		$_GET['novedad']='deserciones';
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;

	case 'a':

		$_GET['novedad']='aplazamiento';
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;

	case 'r':

		$_GET['novedad']='reingreso';
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;

	case 're':

		$_GET['novedad']='retirovoluntario';
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;

	case 'con':

		$_GET['aprendices']='aprendices';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'connov':

		$_GET['aprendices']='consultar_novedad';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'ina':
		
		$_GET['aprendices']='ingresar_aprendiz';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'fi':
		
		$_GET['fichas']='fichas';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['fichas']."");

		break;

	case 'ficon':
		
		$_GET['fichas']='consultar_fi';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['fichas']."");

		break;

	case 'consulnov':
		
		$_GET['aprendices']='con_nov_aprendiz';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'novdoc':
		
		$_GET['aprendices']='consul_nov';
		$_SESSION['documento']=$_POST['documento'];
		header("Location: ../vistas/usuario.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'infnovedad':
		
		$_GET['aprendices']='info_aprendiz';
		$_SESSION['documento']=$_POST['documento'];
		header("Location: ../vistas/usuario.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'usuario':
		
		$_GET['usuario']='usuario';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'actualizarDatos':
		
		$_GET['usuario']='actualizar';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'completado':
		
		$_GET['usuario']='act_completa';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'mod_us':
		
		$_GET['usuario']='modificar_usuario';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'mod_us_aparte':
		
		$_GET['usuario']='modificar_admin';
		$_SESSION['documento']=$_POST['us_documento'];
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'mod_aprendiz':
		
		$_GET['usuario']='modificar_apren';
		$_SESSION['documento']=$_POST['us_documento'];
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;
	
	default:

		header("Location: ../index.php");

		break;
}

?>
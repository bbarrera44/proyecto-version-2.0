<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/estilomenu.css">

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(window).on('scroll', function(){
	if($(window).scrollTop()){
		$('nav').addClass('black');
		}
		else
		{
			$('nav').removeClass('black');
			}
    })
	
$(document).ready(function(){
		$(".menu h3").click(function(){
			$(".nav ul li").toggleClass("active");
			
			});
    });
</script>
</head>

<body>

<div class="responsive-bar">
	<div class="logo">
  	<img src="../img/logo.png">
</div>

<div class="menu">
  <h3>Menu</h3>
 </div>
</div>

<nav>

	<div class="logo">
		<a href="index.php">
		<img src="../img/logo.png" title="Ir al inicio"></a>
	</div>

<ul>
<?php

require_once '../controladores/consultar.php';

	if(isset($_COOKIE['usuarioo'])){
		echo "<li><a href=\"../controladores/controlar.php?n=usuario\" class=\"active\">".$_COOKIE['usuarioo']."</a></li>";
		echo "<li><a href=\"../index.php\"class=\"active\">Inicio</a></li>";}
	else{
		echo "<li><a href=\"../index.php\"class=\"active\">Inicio</a></li>";
	}

	if(isset($_COOKIE['usuarioo'])){
		Consultar::menu($_COOKIE['usuarioo'],'menu');
	}

	if (isset($_COOKIE['usuarioo'])) {
		echo "<li><a href=\"cerrarsesion.php\" class=\"active\">"."Cerrar Sesion"."</a></li>";}
	else{
		echo"<li><a  href=\"login.php\" class=\"active\">Iniciar session</a></li>";
		echo"<li><a  href=\"registro.php\" class=\"active\">Crear cuenta</a></li>";
	}
?>
</ul>

</nav>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
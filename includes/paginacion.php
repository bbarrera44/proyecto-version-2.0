<?php

try {

	$conexion=new PDO("mysql:host=localhost;dbname=proyecto","root","");

} catch (PDOException $e) {

	echo "Error... ". $e->getMessage();
	
}
	

	$pagina= isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

	$post_pagina=5;

	$inicio=($pagina>1) ? ($pagina * $post_pagina -$post_pagina) : 0;

	$paginacion = $conexion->prepare("select SQL_CALC_FOUND_ROWS * from fichas limit $inicio, $post_pagina");

	$paginacion->execute();
	$paginacion = $paginacion->fetchAll();

	$total = $conexion->query("select FOUND_ROWS() as total");
	$total = $total->fetch()['total'];


	$numero_paginas=ceil($total/$post_pagina);

?>
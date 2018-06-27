<div class="form-area" style="top: 55%;">
  <h2 class="formulario__titulo" style="color:#FFF; top: 50%"><b>Consultar</b><br /></h2>
    <h5 class="fin">Dijie el numero de documento para ver los datos del aprendiz sena</h5>
  <hr color="#999999">
<br />

<form action="../controladores/controlar.php?n=infnovedad" method="post">
<p>Numero de Documento</p>
  <input type="text" name="documento" placeholder="Numero de documento">
<br />
<br />
<br />
  <input type="reset" value="Consultar Novedad" class="submit" onclick="window.location.href='../controladores/controlar.php?n=connov'" align="center">
<?php
  require_once '../controladores/consultar.php';

  Consultar::menu($_COOKIE['usuarioo'],'aprendiz');

?>  
  <input type="submit" value="Finalizar" align="center"> 

</form>
</div>
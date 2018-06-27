<div class="form-area" style="height: 1215px; top:76%;">
  <h2 class="formulario__titulo" style="color:#FFF;"><b>Reingreso</b><br />
    <h5 class="fin">Por favor llene las casillas con los datos del aprendiz que va a reingresar.</h5></h2>
      <hr color="#999999">
    <br />
  <br />
<form action="../controladores/reingreso_.php" method="post">
  <p>Ficha anterior</p>
    <input type="text" name="ficha_anterior" placeholder="Ficha anterior" required>
      <p>Ficha a ingresar</p>
<?php 
      require_once '../includes/novedades.php';

      $reingreso=new DatabaseNovedades('localhost','proyecto','root','');
      $reingreso->selFichas();
?>
 <br>
<br>
<p>Nombres</p>
  <input type="text" name="nombres" placeholder="Nombres" required>
    <p>Apellidos</p>
  <input type="text" name="apellidos" placeholder="Apellidos" required>
<p>Tipo de documento</p>
  <select name="tipo_documento">
    <option value="Seleccionar" selected="selected">Seleccionar</option>
    <option value="C.C">Cedula de ciudadania</option>
    <option value="T.I">Tarjeta de identidad</option>
    <option value="C.E">Cedula de extranjeria</option>
    <option value="Pasaporte">Pasaporte</option>
    <option value="D.N.I">Documento nacional de identificacion </option>
  </select><hr color="#FFFFFF">
    <p>Numero de Documento</p>
      <input type="text" name="documento" placeholder="Numero de documento" required>
        <p>Fecha Solicitud</p>
          <input type="text" name="" placeholder="AAAAMMDD" value="<?php echo date("d-M-Y");?>" required><input type="hidden" name="fecha_reingreso" placeholder="AAAAMMDD" value="<?php echo date("Ymd");?>" required>
            <p>Motivo Solicitud</p>
              <br />
                <textarea name="solicitud" placeholder="Motivo" required></textarea>
              <p>Descripcion</p>
            <br />
          <textarea name="descripcion" placeholder="Descripcion"></textarea>
        <br />
      <br />
    <br />
  <input type="submit" value="Atras" class="submit" formaction="javascript:window.history.back();">
  <input type="reset" value="Limpiar" onclick="location.reload()">
  <input type="submit" value="Finalizar">
  

</form>

</div>

<div class="login-box" style="height: 980px; top: 66%;">
	<br>
<h1><b>Actualizacion de Datos</b></h1>
<form action="../controladores/actualizar_.php" method="post">
	<table align="center" width="90%" border="0">
		<tr>
			<td width="50%"><h3>Nombres:</h3><center><br><div class="nom"><input type="text" name="nombres_ac" value="<?php echo $_COOKIE['nombres'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
			<td><h3>Apellidos:</h3><center><br><div class="nom"><input type="text" name="apellidos_ac" value="<?php echo $_COOKIE['apellidos'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
		</tr>
		<tr>
			<td><h3>Documento:</h3><center><br><div class="nom"><input type="text" name="documento_ac" value="<?php echo $_COOKIE['numero_documento'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
			<td><h3>Direccion:</h3><center><br><div class="nom"><input type="text" name="direccion_ac" value="<?php echo $_COOKIE['direccion'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
		</tr>
		<tr>
			<td><h3>Correo:</h3><center><br><div class="nom"><input type="text" name="correo_ac" value="<?php echo $_COOKIE['correo'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
			<td><h3>Nombre de usuario:</h3><center><br><div class="nom"><input type="text" name="usuario_ac" value="<?php echo $_COOKIE['nombre_usuario'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
		</tr>
		<tr>
			<td><h3>Celular:</h3><center><br><div class="nom"><input type="text" name="celular_ac" value="<?php echo $_COOKIE['celular'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
			<td><h3>Telefono:</h3><center><br><div class="nom"><input type="text" name="telefono_ac" value="<?php echo $_COOKIE['telefono'];?>"></div></center><hr color="#FFFFFF" width="90%"/></td>
		</tr>
		<tr>
        	<td colspan="2"><h3>Contraseña(Opcional):</h3><center><br><div class="nom"><input type="password" name="contrasena_ac"></div></center></td>
        </tr>
		<tr>
        	<td colspan="2" align="center"><br>
            <input type="submit" value="Atras" class="submit" formaction="javascript:window.history.back();">
            <input type="submit" value="Actualizar"></td>
		</tr>	
	</table>
</form>	
<br><br><br><br>
</div>


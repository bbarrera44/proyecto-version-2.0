<div class="login-box" style="top: 65%; height: 900px;"><br><br>
<h1><b>Datos del aprendiz</b></h1>
<hr color="#FFFFFF" width="90%"/>
<form action="../controladores/mod_aprendiz.php" method="post">
	<table border="0" align="center" width="100%">
		<tr>
			<td>
				<h3>Nombres:</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" name="nombres" value="<?php echo $_COOKIE['nombres_aprendiz']; ?>">
					</div>
				</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
			<td>
				<h3>Apellidos</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" name="apellidos" value="<?php echo $_COOKIE['apellidos_aprendiz']; ?>">
					</div>
				</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
		</tr>
		<tr>
			<td>
				<h3>Documento</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" name="documento" value="<?php echo $_COOKIE['documento']; ?>">
					</div>
				</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
			<td>
				<h3>Telefono(s)</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" name="telefono" value="<?php echo $_COOKIE['tel_aprendiz']; ?>">
					</div>
				</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
		</tr>
		<tr>
			<td>
				<h3>Celular</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" name="celular" value="<?php echo $_COOKIE['cel_aprendiz']; ?>">
					</div>
				</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
			<td>
				<h3>Ficha</h3>
				<center>
					<br>
					<div class="nom">
							<?php
							require_once '../includes/novedades.php'; 

								$fichas=new DatabaseNovedades('localhost','proyecto','root','');
								$fichas->selFichas('selec');
							?>	<option></option>							
						</div>
					</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h3>Estado del aprendiz</h3>
				<center>
					<br>
					<div class="nom">
						<input type="text" value="<?php echo $_COOKIE['estado']; ?>">
					</div>
				</center>
				<hr color="#FFFFFF" width="90%"/>
			</td>
		</tr>
	</div>        
</table>
<center>
	<input type="submit" value="Finalizar" class="submit">
</center>
</form>
<br><br><br><br>

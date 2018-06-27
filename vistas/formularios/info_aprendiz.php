<?php
	
	$registro=Consultar::infoNovedad($_SESSION['documento']);

	foreach($registro as $reg){

		if ($reg['documento']==$_SESSION['documento']) {
	?>
<div class="login-box" style="top: 70%; height: 910px;">
	<br/>
	<br/>
<h1>Informacion del aprendiz</h1>
<hr width="90%" color="#FFFFFF" >
	<table border="0" align="center" width="100%">
		<tr>
			<td>
				<h2>Nombres del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['nombres_aprendiz']; setcookie("nombres_aprendiz",$reg['nombres_aprendiz'],time()+(60*60),"/"); ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
			<td>
				<h2>Apellidos del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['apellidos_aprendiz']; setcookie("apellidos_aprendiz",$reg['apellidos_aprendiz'],time()+(60*60),"/"); ?>								
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
		</tr>
		<tr>
			<td>
				<h2>Documento de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['documento']; setcookie("documento",$reg['documento'],time()+(60*60),"/"); ?>						
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
			<td>
				<h2>Telefono(s) de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['tel_aprendiz']; setcookie("tel_aprendiz",$reg['tel_aprendiz'],time()+(60*60),"/"); ?>							
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
		</tr>
		<tr>
			<td>
				<h2>Celular del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['cel_aprendiz']; setcookie("cel_aprendiz",$reg['cel_aprendiz'],time()+(60*60),"/"); ?>							
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
			<td>
				<h2>Ficha:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['ficha']; ?>							
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
		</tr>
		<tr>
			<td>
				<h2>Programa de formacion:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['n_programa']; setcookie("n_programa",$reg['n_programa'],time()+(60*60),"/"); ?>					
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
			<td>
				<h2>Estado del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php Consultar::consultarEstado($reg['documento']);?>					
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</td>
        </tr>		
        </table> 
    </br>
	<center>
		
   			<input type="button" value="Nueva consulta" class="submit" onClick="window.location.href='javascript:window.history.back();'"/>
        	<?php Consultar::consultarUsuario($_COOKIE['usuarioo'],'apren'); ?>
  			<input type="button" value="Modificar" class="submit" onClick="window.location.href='../controladores/controlar.php?n=mod_aprendiz'"/>
  	</center>
  	</br></br></br></br>
</div>
<?php
}else{
?>
	<div class="sino">
        <h1>Informacion del aprendiz</h1><hr width="80%" color="#FFFFFF" ><br /><br />
		<h2>El aprendiz no se encuentra registrado en la base de datos<center><br />
		
        <input type="button" value="Nueva consulta" class="submit" onClick="window.location.href='consultar.php?aprendices=aprendices'"/>
		<input type="button" value="Finalizar" class="submit" onClick="window.location.href='index.php'"/></br></br></br></br></br></br></br>
	</div>
<?php
	}
}
if ($_SESSION['documento']=='') {
?>
	<div class="sino">
        <h1>Informacion del aprendiz</h1><hr width="80%" color="#FFFFFF" ><br /><br />
		<h2>El aprendiz no se encuentra registrado en la base de datos<center><br />
		
        <input type="button" value="Nueva consulta" class="submit" onClick="window.location.href='consultar.php?aprendices=aprendices'"/>
		<input type="button" value="Finalizar" class="submit" onClick="window.location.href='index.php'"/></br></br></br></br></br></br></br>
	</div>
<?php
}
?>

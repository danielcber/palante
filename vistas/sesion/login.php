	<div class="row">
		<div class="panel panel-default col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4" id="iniciar">
			 <div class="panel-heading"><label>Inicia sesión</label></div>
				<form action="modelos/sesion/control.php" method="post" name="login_form" id="loginsesion">

					<input type="hidden" name="sesion" value="login">

					<br>

					<div class="form-group">
						<label for="usuario">Correo Electrónico</label>
						<input type="text" class="form-control" name="email" id="email" maxlength="100" placeholder="Ingrese el usuario" value="" required>
					
					</div>

					<div class="form-group">
						<label for="clave">Clave</label>
						<input type="password" class="form-control" name="contrasena" id="contrasena" maxlength="100" placeholder="Ingrese la contraseña" value="" required>
					
					</div>
					
					<?php 
						if ( $_GET['error']=='si' )
						{
						  	$msj = "Verifica los datos";
						  	echo msjdanger($msj);
						}
					?>				

					<div class='form-group'>
						<button type='submit' class='btn btn-primary' name='BtnEnviar'>Enviar</button>
					</div>

				</form>
		</div>
	</div>

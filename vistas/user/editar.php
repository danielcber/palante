<?php session_start(); ?>

<input type="hidden" name="user" value="editar">
	
	
	<div class="row">
	<div class="col-xs-0 col-sm-0 col-md-3 col-lg-3">
		<?php @include('vistas/user/sidebar.php') ?>
	</div>
	<div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<h2>Queremos saber, ¿quién eres?</h2>

		<hr>
		<p id="actualizo"></p>
		
		<form method="post" action="modelos/user/editar.php" id="editaruser">
	
			<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['id']; ?>">
			<input type="hidden" id="contrasenaverificar" name="contrasenaverificar" value="<?php echo $_SESSION['contrasena']; ?>">

		<div class="contrasena">
			<div class="form-group">
			    <label for="contrasena">CONTRASENA</label>
			    <input type="password" class="form-control" id="contrasena" name="contrasena">
			    <p id="error"></p>
			</div>
			<div class="form-group">
			  	<a class="btn btn-palante cancelareditaruser">CANCELAR</a>
			  	<button type="submit" class="btn btn-default btneditaruser">ACTUALIZAR</button>
			</div>
		</div>

		<div class="formfade">
			
			<div class="form-group">
			    <label for="nombre">NOMBRE</label><br>
			    <?php echo $_SESSION['nombre']; ?>
			    <button data-toggle="collapse" data-target="#cambiarnombre" class='btn btn-default pull-right'>CAMBIAR</button>
					<div id="cambiarnombre" class="collapse">
						<br><input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre']; ?>">
					</div> 
			</div>

			<div class="form-group">
			    <label for="email">EMAIL</label><br>
			    <?php echo $_SESSION['email']; ?>
			    <button data-toggle="collapse" data-target="#cambiaremail" class="btn btn-default pull-right">CAMBIAR</button>
					<div id="cambiaremail" class="collapse">
						<br><input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
					</div> 
			</div>

			<?php 

				if ($_SESSION['telefono'] != "") {
					echo "
					<div class='form-group'>
					    <label for='telefono'>TELEFONO</label><br>"
					    .$_SESSION['telefono']."
					    <button data-toggle='collapse' data-target='#cambiartelefono' class='btn btn-default pull-right'>CAMBIAR</button>
							<div id='cambiartelefono' class='collapse'>
								<br><input type='text' class='form-control' id='telefono' name='telefono' value=".$_SESSION['telefono'].">
							</div> 
					</div>";
				} else {
				echo "
					<div class='form-group'>
					    <label for='telefono'>TELEFONO</label>
					    <input type='text' class='form-control' id='telefono' name='telefono'>
					</div>";
				}

			 ?>

			 <?php 

				if ($_SESSION['descripcion'] != "") {
				echo "
				<div class='form-group'>
				    <label for='descripcion'>BIOGRAFIA</label><br>"
				    .$_SESSION['descripcion']."
				    <button data-toggle='collapse' data-target='#cambiardescripcion' class='btn btn-default pull-right'>CAMBIAR</button>
						<div id='cambiardescripcion' class='collapse'>
							<br>
							<textarea class='form-control' id='descripcion' name='descripcion'>".$_SESSION['descripcion']."</textarea>
						</div> 
				</div>";
				} else {
				echo "
					<div class='form-group'>
					    <label for='descripcion'>BIOGRAFIA</label>
			    		<textarea class='form-control' id='descripcion' name='descripcion'></textarea>
					</div>";
				}

			 ?>

			<div class="form-group">
			    <label for="facebook">FACEBOOK</label>
			    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $_SESSION['facebook']; ?>">
			</div>

			<div class="form-group">
			    <label for="twitter">TWITTER</label>
			    <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $_SESSION['twitter']; ?>">
			</div>

			<div class="form-group">
			    <label for="instagram">INSTAGRAM</label>
			    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $_SESSION['instagram']; ?>">
			</div>

			<div class="form-group">
			  	<a class="btn btn-default contrasenaeditaruser">ACTUALIZAR</a>
			</div>
		</div>

		</form>

		</div>
	</div>
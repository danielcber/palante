<input type="hidden" name="org" value="registrar">

	<div class="row">
	<div class="col-xs-0 col-sm-0 col-md-2 col-lg-2"></div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<h1>Crea una organización</h1>

		<hr>
		

			<form class="form form-responsive" method="POST" action="modelos/org/registrar.php" id="registrarorg">

			  <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['id']; ?>">

			  <div class="form-group">
			    <label for="org">NOMBRE DE LA ORGANIZACION</label>
			    <input type="text" class="form-control" id="org" name="org">
			  </div>

			  <div class="form-group">
			    <label for="correo">CORREO ELECTRONICO</label>
			    <input type="text" class="form-control" id="correo" name="correo">
			  </div>

			  <div class="form-group">
			    <label for="telefono">TELEFONO</label>
			    <input type="text" class="form-control" id="telefono" name="telefono">
			  </div>

			  <div class="form-group">
			    <label for="descripcion">DESCRIPCION</label>
			    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="facebook">FACEBOOK</label><br>
			    <input type="text" id="facebook" name="facebook">
			  </div>

			  <div class="form-group">
			    <label for="twitter">Twitter</label><br>
			    @ <input type="text" id="twitter" name="twitter">
			  </div>

			  <div class="form-group">
			    <label for="instagram">INSTAGRAM</label><br>
			    @ <input type="text" id="instagram" name="instagram">
			  </div>

			  <div class="form-group">
			  	<button type="submit" class="btn btn-default">CREAR</button>
			  </div>

			</form>


		</div>
		</div>

	</div>
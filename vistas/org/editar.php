<!-- -->

<input type="hidden" name="org" value="editar">
	
	
	<div class="row">
	<div class="col-xs-0 col-sm-0 col-md-3 col-lg-3">
		<?php @include('vistas/user/sidebar.php') ?>
	</div>
	<div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<h2>Tu organización</h2>

		<hr>
		<p id="actualizo"></p>
		
		<form method="post" action="modelos/org/editar.php" id="editarorg">
	
			<input type="hidden" id="id" name="id">

		<div class="formfade">
			
			<div class="form-group">
			    <label for="nombre">ORGANIZACION</label><br>
			    <span class="actorg"></span>
			    <button data-toggle="collapse" data-target="#cambiarnombre" class='btn btn-default pull-right'>CAMBIAR</button>
					<div id="cambiarnombre" class="collapse">
						<br><input type="text" class="form-control actorg" id="actorg" name="actorg">
					</div> 
			</div>

			<div class="form-group">
			    <label for="email">EMAIL</label><br>
			    <span class="actcorreo"></span>
			    <button data-toggle="collapse" data-target="#cambiaremail" class="btn btn-default pull-right">CAMBIAR</button>
					<div id="cambiaremail" class="collapse">
						<br><input type="text" class="form-control actcorreo" id="actcorreo" name="actcorreo">
					</div> 
			</div>

			<div class='form-group'>
			    <label for='telefono'>TELEFONO</label>
			    <input type='text' class='form-control acttelefono' id='acttelefono' name='acttelefono'>
			</div>

			<div class='form-group'>
			    <label for='descripcion'>DESCRIPCION</label>
	    		<textarea class='form-control' id='actdescripcion' name='actdescripcion'></textarea>
			</div>

			<div class="form-group">
			    <label for="facebook">FACEBOOK</label>
			    <input type="text" class="form-control" id="actfacebook" name="actfacebook">
			</div>

			<div class="form-group">
			    <label for="acttwitter">TWITTER</label>
			    <input type="text" class="form-control" id="acttwitter" name="acttwitter">
			</div>

			<div class="form-group">
			    <label for="instagram">INSTAGRAM</label>
			    <input type="text" class="form-control" id="actinstagram" name="actinstagram">
			</div>

			<div class="form-group">
			  	<button type="submit" class="btn btn-default">ACTUALIZAR</button>
			</div>
		</div>

		</form>

		</div>
	</div>
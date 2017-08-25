<input type="hidden" name="evento" value="listar">
<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id']; ?>">
	
	<div class="row">
	<div class="col-xs-0 col-sm-0 col-md-3 col-lg-3">
		<?php @include('vistas/user/sidebar.php') ?>
	</div>
	<div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<h2>Mis eventos</h2>

		<hr>
		<div class="miseventos"></div>
		
		</div>
	</div>
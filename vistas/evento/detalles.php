<?php session_start(); ?>

<br><br>
<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id']; ?>">
<input type="hidden" name="evento" value="detalles">
		<div class="row">
		<div class="contrasena">
			Hola!
		</div>
			<div class="eventoimg col-xs-12 col-md-12 col-md-8 col-lg-8"></div>
			<div class="barrita col-xs-12 col-md-12 col-md-4 col-lg-4" style="background-color: #F7F7F7; ">
				<p><strong>TE INVITA</strong></p>
				<p id="organizacion" class="wrap">
					
				</p>
				<p>
				<strong>PRECIO</strong><br>
				<span id="entradaprecio"></span>

				<p> 
				<strong>FECHA Y HORA</strong><br>
				<span id="fecha"></span>
					<!-- <span id="startdate"></span> - <span id="enddate"></span><br>
					<span id="starttime"></span> - <span id="endtime"></span> -->
				</p>
				
				<p>
				<strong>UBICACION</strong><br>
				<span id="ubicacion" class="wrap"></span>
				</p>

				<button id="asistir" class="btn btn-default text-bottom" style="width: 100%; border: none; border-radius: 0px; background-color: #A286E6; color: black; font-family: 'Raleway';">¡Quiero ir!</button>
				<button id='agenda' class='btn btn-default' style='width: 100%; border: none; border-radius: 0px; background-color: #A286E6; color: white; font-family: "Raleway"; display: none;'>Mi agenda</button>
			</div>
		</div>
		<div class="row">
			<div class="evento col-xs-12 col-md-12 col-md-12 col-lg-12">
				<h1 id="titulo" class="wrap">
				</h1>
				
				<h3>
					<span id="descripcion" class="card-text wrap"></span>
				</h3>
			</div>
		</div>
	</div>




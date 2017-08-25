<input type="hidden" name="evento" value="registrar">
	
	<div class="row">
	<div class="col-xs-0 col-sm-0 col-md-2 col-lg-2"></div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<h1>Edita tu evento</h1>

		<hr>
		

			<form class="form form-responsive" method="POST" action="modelos/evento/editar.php" id="editarevento">
				<input type="hidden" id="id" name="id">
			 
			  <div class="form-group">
			    <label for="titulo">TITULO</label>
			    <input type="text" class="form-control" id="titulo" name="titulo">
			  </div>
			 
			  <div class="form-group">
			    <label for="ubicacion">UBICACION</label>
			    <textarea class="form-control" id="ubicacion" name="ubicacion"></textarea>
			  </div>
			   <?php
					mysql_connect("localhost", "root","") or die(mysql_error());
					mysql_select_db("palante") or die(mysql_error());

					$query = "SELECT * from `categorias`;";
					$result = mysql_query($query) or die(mysql_error()."[".$query."]");
				?>
			  <div class="form-group">
		    	<label for="">CATEGORIA</label><br>
		    	<div id='cambiarcat'>
			    	<select  id="categoria" name='categoria' class="form-control" required="required" style='height: 30px;'>
			    		<option style='height: 20px;' id="catactual"> </option>
			    		<?php 
						while ($row = mysql_fetch_array($result))
						{
						    echo "<option style='height: 20px;' value=".$row['idcategorias'].">".$row['nombre']."</option>";
						}
						?> 
					</select>
				</div>
		    </div>
			  
			  <?php
					mysql_connect("localhost", "root","") or die(mysql_error());
					mysql_select_db("palante") or die(mysql_error());

					$query2 = "SELECT * from `organizaciones` where `user_id`=".$_SESSION['id'].";";
					$result2 = mysql_query($query2) or die(mysql_error()."[".$query2."]");
				?>

			  <div class="form-group">
			    <label for="organizacion">ORGANIZACION</label>
			    <select class="form-control" id="organizacion" name="organizacion" required="required" style="height: 30px;">
			    	<option style='height: 20px;' id="orgactual"></option>
			    	<?php 
					while ($row = mysql_fetch_array($result2))
					{
					    echo "<option style='height: 20px;' value=".$row['id'].">".$row['id'].". ".$row['org']."</option>";
					}
					?>    
			    </select>
			  </div>



			  <div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    <label for="start_time">EMPIEZA</label><br>
				    <div class="panel">
				    Fecha <input type="text" placeholder="dd/mm/aaaa" id="startdate" name="startdate"><br><br>
				    Hora&nbsp;&nbsp; <input type="text" placeholder="07:00pm" id="starttime" name="starttime">
				    </div>
				  </div>
				  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    <label for="end_time">TERMINA</label><br>
				    <div class="panel">
				    Fecha <input type="text" placeholder="dd/mm/aaaa" id="enddate" name="enddate"><br><br>
				    Hora&nbsp;&nbsp; <input type="text" placeholder="07:00pm" id="endtime" name="endtime">
				    </div>
				  </div>
			  </div><br>

			  <div class="form-group">
			  	<label for="entrada">ENTRADA</label>
				  <div class="row">
					  	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    	<div class="panel">
					    	Cantidad disponible <input type="number" id="entradacantidad" name="entradacantidad"><br>
					    	</div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    	<div class="panel">
					    	Precio Bs.F <input type='number' id="entradaprecio" name="entradaprecio">
					    	</div>
					  </div>
				  </div>
			  </div><br>

			  <div class="form-group">
			    <label for="descripcion">DESCRIPCION</label>
			    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
			  </div>

			  <div class="form-group">
			  	<button type="submit" class="btn btn-default">ACTUALIZAR</button>
			  </div>
			</form>

		</div>
		</div>
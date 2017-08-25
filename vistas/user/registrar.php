<input type="hidden" name="user" value="registrar">

	<h1>Regístrate</h1>

	<form method="post" action="modelos/user/registrar.php" id="registraruser">

		<div class="form-group">
			<label for="nombre">Nombre y apellido:</label>
			<input type="text" class="form-control" id="nombre" name="nombre" required>
		</div>

		<div class="form-group">
			<label for="email">Correo Electrónico:</label>
			<input type="text" class="form-control" id="email" name="email" required>
		</div>

		<div class="form-group">
			<label for="contrasena">Contraseña</label>
			<input type="password" class="form-control" id="contrasena" name="contrasena" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Seis carácteres o más, una mayúscula, una minúscula, y un número" required>
		</div>

		<div class="form-group">
			<label for="confirmacion">Confirme Contraseña</label>
			<input type="password" class="form-control" id="confirmacion" name="confirmacion" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Pa'lante</button>
		</div>

	</form>


;
// _____________________________________________
// ------------------REGISTRAR------------------
// _____________________________________________
$(document).ready(function(){
	$('#registrarorg').validate({
		rules:{
			nombre:{
				required:true,
				minlength:5
			},
			correo:{
				required:true,
				email:true,
				minlength:6
			},
		},
		messages:{
			nombre:{
				minlength: 'Introduzca mas de 4 caracteres'
			},
			correo: 'Introduzca un correo electrónico válido',
		},
		submitHandler:function(){
		var datos = {
			id: $('#id').val(),
			org: $('#org').val(),
			correo: $('#correo').val(),
			telefono: $('#telefono').val(),
			descripcion: $('#descripcion').val(),
			facebook: $('#facebook').val(),
			twitter: $('#twitter').val(),
			instagram: $('#instagram').val(),
		}
		$.ajax({
			url: 'modelos/org/registrar.php',
			type: 'POST',
			data: datos,
			success:function(data){
				window.location.replace("index.php?org=listar");
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
	});
	window.console.log('cargo');
});

;

/*=========================================================
=            				LISTAR      		      =
=========================================================*/
$(document).ready(function(){
		if(window.location == "http://localhost/palante/index.php?org=listar"){
			misorganizaciones();
		}
	});

function misorganizaciones() {

		console.log("FUNCIONA!");
		var userid = $('#userid').val();
		var dato = {
			id: userid,
		}
		$.ajax({
			url: 'modelos/org/listar.php',
			type: 'POST',
			data: dato,
			success:function(resp){
			console.log(resp);
			resp = $.parseJSON(resp);
			$('.misorganizaciones').append(`<table class='table table-responsive'>
				<thead>
					<tr>
						<th>Organización</th>
						<th>Borrar</th>
						<th>Actualizar</th>
					</tr>
				</thead>
				<tbody id="listadomisorgs"></tbody>
			</table>`);
			for (var i = 0; i < resp.length; i++) {
				$('#listadomisorgs').append("<tr><td>"+resp[i].org+"</td><td><button class='btn btn-default borrarorg' value="+resp[i].id+">Borrar</button></td>"+
					"<td><a class='btn btn-default actualizarorg' href='index.php?org=editar#"+resp[i].id+"' value="+resp[i].id+">Actualizar</a></td></tr>");
				}
			},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			$('.borrarorg').click(function () {
				console.log($(this).val());
				borrarOrg($(this).val());
			});
			console.log("complete");
		});
}


/*=========================================================
=                       BORRAR                          =
=========================================================*/
function borrarOrg(id) {
	var datos = {
		id:id
	}
	$.ajax({
		url: 'modelos/org/borrar.php',
		type: 'POST',
		data: datos,
		success:function(resp) {
			console.log(resp);
			$('.misorganizaciones').empty();
			misorganizaciones();
		}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}

/*=======================================================================================
=          					  COLOCAR DATOS DE LA ORGANIZACION PARA EDITAR            =
=======================================================================================*/
$(document).ready(function(){

		var location = window.location.search;
		console.log(location);

		if (location == '?org=editar'){

		var res = window.location.hash;
		res = (res.substr(1));
		
		var datos = {
			id: res
		}

		$.ajax({
			url: 'modelos/org/actualizar.php',
			type: 'POST',
			data: datos,
			success:function (argument) {
						console.log(argument);
						resp = $.parseJSON(argument);
						console.log(resp.org);
						$('#id').val(resp.id);
						$('.actorg').val(resp.org);
						$('.actorg').append(resp.org);
						$('.actcorreo').val(resp.correo);
						$('.actcorreo').append(resp.correo);
						if (resp.telefono != 0) {
							$('#acttelefono').val(resp.telefono);
						}
						$('#actdescripcion').val(resp.descripcion);
						$('#actfacebook').val(resp.facebook);
						$('#acttwitter').val(resp.twitter);
						$('#actinstagram').val(resp.instagram);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	}

});

/*===========================================================================
=            Se ejecuta cuando se aprieta el boton en actualizar            =
===========================================================================*/
$(document).ready(function(){
	$('#editarorg').validate({
		rules:{
				org:{
					required:true,
					minlength:5
				},
				correo:{
					required:true,
					email:true,
					minlength:6
				},
				telefono:{
					digits:true,
					minlength: 6,
				},
			},
			messages:{
				nombre:{
					required: 'Tu organización debe tener nombre!',
					minlength: 'Introduzca más de 4 caracteres',
				},
				email: 'Introduzca un correo electrónico válido',
				telefono: 'Introduza un número de teléfono válido, solo utilice números',
			},
		submitHandler:function(){
			var datos = {
				actid: $('#id').val(),
				actorg: $('#actorg').val(),
				actcorreo: $('#actcorreo').val(),
				acttelefono: $('#acttelefono').val(),
				actdescripcion: $('#actdescripcion').val(),
				actfacebook: $('#actfacebook').val(),
				acttwitter: $('#acttwitter').val(),
				actinstagram: $('#actinstagram').val(),
				}
			$.ajax({
				url: 'modelos/org/editar.php',
				type: 'POST',
				data: datos,
				success:function (data) {
					console.log(data);
					data = $.parseJSON(data);
					console.log(data);
					location.reload();
				}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
});

/*===========================================================================
=        					    detalles  						         =
===========================================================================*/

$(document).ready(function(){

		var location = window.location.search;
		console.log(location);

		if (location == '?org=detalles'){

			var res = window.location.hash;
			res = (res.substr(1));
			console.log("Este es #:"+res);
			
			var datos = {
				id: res
			}

			$.ajax({
				url: 'modelos/org/detalles.php',
				type: 'POST',
				data: datos,
				success:function (argument) {
					console.log(argument);
					resp = $.parseJSON(argument);
					$('#id').val(resp.id),
					$('#org').html(resp.org);
					$('#correo').html("<strong>CORREO</strong><br>"+resp.correo);
					if (resp.telefono != 0) {
						$('#telefono').html("<strong>TELEFONO</strong><br>"+resp.telefono);
					}
					$('#descripcion').html(resp.descripcion);
					if (resp.facebook != "") {
						$('#facebook').html("<a href="+resp.facebook+"><i class='ionicons ion-social-facebook medios'></i></a>&nbsp;&nbsp;");
					}
					if (resp.twitter != "") {
						$('#twitter').html("<a href=https://www.twitter.com/"+resp.twitter+"><i class='ionicons ion-social-twitter medios'></i></a>&nbsp;&nbsp;");
					}
					if (resp.instagram != "") {
						$('#instagram').html("<a href=https://www.instagram.com/"+resp.instagram+"><i class='ionicons ion-social-instagram medios'></i></a>");
					}
				}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

	}
});




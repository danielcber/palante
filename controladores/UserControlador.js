;
// _____________________________________________
// ------------------REGISTRAR------------------
// _____________________________________________
$(document).ready(function(){
	$('#registraruser').validate({
		rules:{
			nombre:{
				required:true,
				minlength:5
			},
			email:{
				required:true,
				email:true,
				minlength:6
			},
			contrasena:{
				required:true,
				minlength:8,
			},
			confirmacion:{
				required:true,
				minlength:8,
				equalTo: "#contrasena"
			},
		},
		messages:{
			nombre:{
				minlength: 'Introduzca mas de 4 caracteres'
			},
			email: 'Introduzca un correo electrónico válido',
			contrasena: 'Seis carácteres o más y debe tener al menos un número',
			confirmacion: 'Las contraseñas introducidas no son iguales, intente de nuevo'

		},
		submitHandler:function(){
		var datos = {
			nombre: $('#nombre').val(),
			email: $('#email').val(),
			contrasena: $('#contrasena').val(),
			confirmacion: $('#confirmacion').val(),
		}
		$.ajax({
			url: 'modelos/user/registrar.php',
			type: 'POST',
			data: datos,
			success:function(data){
				window.location.replace("index.php?pag=principal");
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

// _____________________________________________
// ---------------------EDITAR------------------
// _____________________________________________

$(document).ready(function(){
	$('.contrasena').hide();
	$('.contrasenaeditaruser').click(function(){
		$('.formfade').fadeTo("slow", 0.1);
		$('.contrasena').show();
	});
	$('.cancelareditaruser').click(function(){
			$('.formfade').fadeTo("slow", 1);
			$('.contrasena').hide();
	});
	// $('.btneditaruser').click(function() {
		$('#editaruser').validate({
			rules:{
				nombre:{
					required:true,
					minlength:5
				},
				email:{
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
					minlength: 'Introduzca mas de 4 caracteres'
				},
				email: 'Introduzca un correo electrónico válido',
				telefono: 'Introduza un número de teléfono válido, solo utilice números',
			},
			submitHandler:function(){
			var datos = {
				id: $('#id').val(),
				nombre: $('#nombre').val(),
				email: $('#email').val(),
				telefono: $('#telefono').val(),
				descripcion: $('#descripcion').val(),
				facebook: $('#facebook').val(),
				twitter: $('#twitter').val(),
				instagram: $('#instagram').val(),
				contrasenaverificar: $('#contrasenaverificar').val(),
				contrasena: $('#contrasena').val(),
			}
			$.ajax({
				url: 'modelos/user/editar.php',
				type: 'POST',
				data: datos,
				success:function(data){
					console.log(data);
					data = $.parseJSON(data);
					console.log(data);
					if (data.tipo != true){
						$(document).ready(function(){
							console.log(data.mensaje);
							$('#error').html("");
							$('#error').html(data.mensaje);
						});
					}
					if (data.tipo == true){
						window.location.replace("index.php?user=editar");
						$(document).ready(function(){
							$('#error').append(data.mensaje);
						});
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
		window.console.log('cargo');
	// });
});
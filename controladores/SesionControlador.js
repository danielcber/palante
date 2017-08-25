;
$(document).ready(function(){
	$('#loginsesion').validate({
		rules:{
			email:{
				required:true,
				email:true,
			},
			contrasena:{
				required:true,
			},
		},
		messages:{
			email: 'Introduzca un correo electrónico válido',
			contrasena: 'Contraseña no es válida',

		},
		submitHandler:function(){
		var datos = {
			email: $('#email').val(),
			contrasena: $('#contrasena').val(),
		}
		$.ajax({
			url: 'modelos/sesion/control.php',
			type: 'POST',
			data: datos,
			success:function(data){
				window.location.replace("index.php");
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
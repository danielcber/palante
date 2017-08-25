;
// _____________________________________________
// ------------------REGISTRAR------------------
// _____________________________________________
$(document).ready(function(){
	$('#registrarevento').validate({
		rules:{
			titulo:{
				required:true,
				minlength:5
			},
			ubicacion:{
				required:true,
				minlength:6
			},
			organizacion:{
				required: true,
				digits: true,
			},
			categoria:{
				required: true,
				digits: true,
			},
			startdate:{
				required: true,
				// date: true,
			},
			starttime:{
				required: true,
			},
			enddate:{
				required: true,
				// date: true,
			},
			endtime:{
				required: true,
			},
			entradacantidad:{
				required: true,
				digits: true,
			},
			entradaprecio:{
				required: true,
				digits: true,
			},
			descripcion:{
				required: true,
				minlength: 50,
			}
		},
		messages:{
			titulo:{
				required: 'Pero ponele un título, ¡qué molleja!',
				minlength: 'Introduzca mas de 4 caracteres, ¿o vos creeís que que?'
			},
		},
		submitHandler:function(){
		var datos = new FormData($("#registrarevento")[0]);
		
		$.ajax({
			url: 'modelos/evento/registrar.php',
			type: 'POST',
			data: datos,
			success:function(data){
				console.log(data);
				window.location.replace("index.php?evento=listar");
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
/*=========================================================
=            				LISTAR      		      =
=========================================================*/
$(document).ready(function(){
		if(window.location == "http://localhost/palante/index.php?evento=listar"){
			miseventos()
		}
	});

function miseventos() {

		console.log("FUNCIONA!");
		var userid = $('#userid').val();
		console.log(userid);
		var dato = {
			id: userid,
		}
		$.ajax({
			url: 'modelos/evento/listar.php',
			type: 'POST',
			data: dato,
			success:function(resp){
			console.log(resp);
			resp = $.parseJSON(resp);
			$('.miseventos').append(`<table class='table table-responsive'>
				<thead>
					<tr>
						<th>Evento</th>
						<th>Borrar</th>
						<th>Actualizar</th>
						<th>Admin</th>
					</tr>
				</thead>
				<tbody id="listadomiseventos"></tbody>
			</table>`);
			for (var i = resp.length-1; i > 0; i--) {
				$('#listadomiseventos').append("<tr><td>"+resp[i].titulo+"</td><td><button class='btn btn-default borrarevento' value="+resp[i].id+">Borrar</button></td>"+
					"<td><a class='btn btn-default actualizarevento' href='index.php?evento=editar#"+resp[i].id+"' value="+resp[i].id+">Actualizar</a></td><td><a class='btn btn-default adminevento' href='index.php?evento=admin#"+resp[i].id+"'>Admin</a></td></tr>");
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
			$('.borrarevento').click(function () {
				console.log($(this).val());
				borrarEvento($(this).val());
			});
			console.log("complete");
		});
}


/*=========================================================
=                       BORRAR                          =
=========================================================*/
function borrarEvento(id) {
	var datos = {
		id:id
	}
	$.ajax({
		url: 'modelos/evento/borrar.php',
		type: 'POST',
		data: datos,
		success:function(resp) {
			console.log(resp);
			$('.miseventos').empty();
			miseventos();
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
=          					  COLOCAR DATOS DEL EVENTO PARA EDITAR            =
=======================================================================================*/
$(document).ready(function(){

		var location = window.location.search;
		console.log(location);

		if (location == '?evento=editar'){

			var res = window.location.hash;
			res = (res.substr(1));
			console.log(res);
			
			var datos = {
				id: res
			}

			$.ajax({
				url: 'modelos/evento/actualizar.php',
				type: 'POST',
				data: datos,
				success:function (argument) {
							console.log(argument);
							resp = $.parseJSON(argument);
							$('#id').val(resp.id),
							$('#titulo').val(resp.titulo),
							$('#ubicacion').val(resp.ubicacion),
							$('#startdate').val(moment(resp.startdate).format("DD/MM/YYYY")),
							$('#starttime').val(moment(resp.starttime, "hhmm").format("h:mma")),
							$('#enddate').val(moment(resp.enddate).format("DD/MM/YYYY")),
							$('#endtime').val(moment(resp.endtime, "hhmm").format("h:mma")),
							$('#entradacantidad').val(resp.entradacantidad),
							$('#entradaprecio').val(resp.entradaprecio),
							$('#descripcion').val(resp.descripcion);
							$('#catactual').html(resp.categoria);
							$('#catactual').val(resp.idcat);
							$('#orgactual').val(resp.orgid);
							$('#orgactual').append(resp.organizacion);
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
	$('#editarevento').validate({
		rules:{
			titulo:{
				required:true,
				minlength:5
			},
			ubicacion:{
				required:true,
				minlength:6
			},
			organizacion:{
				required: true,
				digits: true,
			},
			categoria:{
				required: true,
				digits: true,
			},
			startdate:{
				required: true,
				// date: true,
			},
			starttime:{
				required: true,
			},
			enddate:{
				required: true,
				// date: true,
			},
			endtime:{
				required: true,
			},
			entradacantidad:{
				required: true,
				digits: true,
			},
			entradaprecio:{
				required: true,
				digits: true,
			},
			descripcion:{
				required: true,
				minlength: 50,
			}
		},
		messages:{
			titulo:{
				required: 'Pero ponele un título, ¡qué molleja!',
				minlength: 'Introduzca mas de 4 caracteres, ¿o vos creeís que que?'
			},
		},
		submitHandler:function(){
			var datos = {
				id: $('#id').val(),
				titulo: $('#titulo').val(),
				ubicacion: $('#ubicacion').val(),
				organizacion: $('#organizacion').val(),
				categoria: $('#categoria').val(),
				startdate: $('#startdate').val(),
				starttime: $('#starttime').val(),
				enddate: $('#enddate').val(),
				endtime: $('#endtime').val(),
				entradacantidad: $('#entradacantidad').val(),
				entradaprecio: $('#entradaprecio').val(),
				descripcion: $('#descripcion').val(),
			}
			$.ajax({
				url: 'modelos/evento/editar.php',
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

// _____________________________________________
// ------------------INDEX----------------------
// _____________________________________________
$(document).ready(function(){
		if(window.location == "http://localhost/palante/index.php?evento=index"){
			eventosindex()
		}
	});

function eventosindex() {

		console.log("EVENTOS INDEX!");
		$.ajax({
			url: 'modelos/evento/index.php',
			success:function(resp){
			console.log(resp);
			resp = $.parseJSON(resp);

			for (var i = resp.length-1; i > 0; i--) {

					moment.locale('es');

				  $('.eventosindex').append(
						`<div class="card">
					    	<div class="grid mask">
								<figure> <a href="index.php?evento=detalles#`+resp[i].id+`">
									<img class="img-responsive imgcard" src="`+resp[i].imagen.substr(6)+`" alt="">
									<figcaption>
										<p class="card-text">`+resp[i].descripcion.substr(0,75)+`</p>
									</figcaption>
								</a></figure>
					    	</div>
					    	<div class="cardtext" style="padding: 10px; height:100%;">
						    	<h4 class="card-text"> `+resp[i].titulo+` </h4>
			  		           	<h5 class="card-text"> `+resp[i].organizacion+` </h5>
			  		          	<p class="card-text"> `+resp[i].ubicacion+`</p>
			  			    	<p class="card-text">`+moment(resp[i].starttime, 'hhmm').format('h:mma')+`, `+moment(resp[i].startdate).format('LL')+`</p>
		  			    	</div>
						</div>`);
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
			console.log("complete");
		});
}

// _____________________________________________
// ------------------DETALLES------------------
// _____________________________________________


$(document).ready(function(){
		$('#agenda').hide();
		var location = window.location.search;
		console.log(location);
		moment.locale('es');

		if (location == '?evento=detalles'){

			var res = window.location.hash;
			res = (res.substr(1));
			console.log("Este es #:"+res);
			
			var datos = {
				id: res
			}

			$.ajax({
				url: 'modelos/evento/detalles.php',
				type: 'POST',
				data: datos,
				success:function (argument) {
					console.log(argument);
					resp = $.parseJSON(argument);
					$('#id').val(resp.id),
					$('#titulo').html(resp.titulo);
					$('#asistir').val(resp.id);
					$('#ubicacion').html(resp.ubicacion),
					$('#organizacion').html("<a href='index.php?org=detalles#"+resp.idorg+"'>"+resp.organizacion+"</a>");
					if (resp.startdate == resp.enddate) {
						$('#fecha').html((moment(resp.startdate).format('LL')+"<br>"+moment(resp.starttime, 'hhmm').format('h:mma')+" - "+moment(resp.endtime, 'hhmm').format('h:mma')));
					}
					if (resp.startdate != resp.enddate) {
						$('#fecha').html((moment(resp.starttime, 'hhmm').format('h:mma')+" "+moment(resp.startdate).format('LL')+" - <br>"+moment(resp.endtime, 'hhmm').format('h:mma')+" "+moment(resp.enddate).format('LL')));
					}
					$('#startdate').html(resp.startdate),
					$('#starttime').html(resp.starttime),
					$('#enddate').html(resp.enddate),
					$('#endtime').html(resp.endtime),
					$('#entradacantidad').html(resp.entradacantidad);
					if (resp.entradaprecio != 0) {
						$('#entradaprecio').html(resp.entradaprecio);
					}
					if (resp.entradaprecio == 0) {
						$('#entradaprecio').html("Gratis");
					}
					$('#descripcion').html(resp.descripcion);
					$('.eventoimg').html("<img src='"+resp.imagen.substr(6)+"'>");
					// $('#catactual').html(resp.idcat);
					// $('#catactual').html(resp.categoria);
					// $('#orgactual').html(resp.idorg);
					// $('#orgactual').append(resp.organizacion);
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


// _____________________________________________
// ------------------BUSCAR---------------------
// _____________________________________________

function buscar_datos(consulta){
	$.ajax({
      url: 'modelos/evento/buscar.php',
      type: 'POST',
      dataType: 'html',
      data: {consulta: consulta},
	})
	.done(function(respuesta){
		$(".datos").html(respuesta);
		$(".datos").addClass('datosadd');
	})

	.fail(function(){
		console.log("error");
	})

}

// para la busqueda en tiempo real

$(document).on('keyup', '#caja_busqueda', function(){
	$(".datos").empty();
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	} else{
		console.log("No hay busqueda");
		$(".datos").removeClass('datosadd');
	}
});

//
// ------------------BUSCAR2---------------------
// _____________________________________________
function buscar_datos2(consulta){
	$.ajax({
      url: 'modelos/evento/buscar2.php',
      type: 'POST',
      dataType: 'html',
      data: {consulta: consulta},
	})
	.done(function(respuesta){
		$(".datos2").html(respuesta);
		$(".datos2").addClass('datosadd2');
	})

	.fail(function(){
		console.log("error");
	})

}

// para la busqueda en tiempo real

$(document).on('keyup', '#caja_busqueda2', function(){
	$(".datos2").empty();
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos2(valor);
	} else{
		console.log("No hay busqueda");
		$(".datos2").removeClass('datosadd2');
	}
});


// _____________________________________________
// -----------CAMBIAR CON NUMERAL---------------
// _____________________________________________

$(window).on('hashchange',function(){ 
    window.location.reload(true); 
});


// _____________________________________________
// ------------------ASISTENCIA-----------------
// _____________________________________________



$('#asistir').on('click', function(){
	
	var res = window.location.hash;
	res = (res.substr(1));

	var datos = {
		userid: $('#userid').val(),
		eventoid: res,
	}
	$.ajax({
			url: 'modelos/evento/asistencia.php',
			type: 'POST',
			data: datos,
			success:function(resp){
			console.log(resp);
			resp = $.parseJSON(resp);
			},
		})
		.done(function() {
			$('#asistir').fadeOut(1000);
			$('#agenda').delay(1500).fadeIn(1000);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
});

// _____________________________________________
// ------------------AGENDA--------------------
// _____________________________________________

$(document).ready(function(){
		if(window.location == "http://localhost/palante/index.php?evento=agenda"){
			miagenda()
		}
	});

function miagenda() {

		var userid = $('#userid').val();
		console.log(userid);
		var dato = {
			userid: userid,
		}
		$.ajax({
			url: 'modelos/evento/agenda.php',
			type: 'POST',
			data: dato,
			success:function(resp){
			console.log(resp);
			resp = $.parseJSON(resp);
			$('.miagenda').append(`
				<div id="listadomiagenda"></div>
			</table>`);
			for (var i = 0; i < resp.length; i++) {
				$('#listadomiagenda').append("<h3>"+resp[i].titulo+"</h3><br><p>"+resp[i].ubicacion+"</p><span class='pull-right'><a href='index.php?evento=detalles#"+resp[i].eventoid+"'>Ver</a></span><p>"+moment(resp[i].startdate).format('LL')+"</p><hr>");
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
			$('.borrarevento').click(function () {
				console.log($(this).val());
				borrarEvento($(this).val());
			});
			console.log("complete");
		});
}
;

// _____________________________________________
// ---------------------ADMIN-------------------
// _____________________________________________

$(document).ready(function(){
		
		console.log(location);

		if (location == '?evento=admin'){

			console.log("popopop");

			var res = window.location.hash;
			res = (res.substr(1));
			console.log("Este es #:"+res);
				
			var datos = {
				id: res
			}

			$.ajax({
				url: 'modelos/evento/admin.php',
				type: 'POST',
				data: dato,
				success:function(resp){
				console.log(resp);
				resp = $.parseJSON(resp);
				$('.miadmin').append(`
					<div id="listadomiadmin"></div>
				</table>`);
				for (var i = 0; i < resp.length; i++) {
					$('#listadomiadmin').append("<h3>"+resp[i].nombre+"</h3><br><p>"+resp[i].email+"</p><p>"+resp[i].telefono+"</p><hr>");
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
				$('.borrarevento').click(function () {
					console.log($(this).val());
					borrarEvento($(this).val());
				});
				console.log("complete");
			});
	}
});






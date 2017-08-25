;
// _____________________________________________
// ------------REGISTRAR CON EVENTO------------
// _____________________________________________

// $(document).ready(function(){
	
// 	var location = window.location.search;
// 		console.log(location);

// 		if (location == '?evento=registrar'){

// 			$.ajax({
// 				url: 'modelos/categoria/seleccionar.php',
// 				success:function(resp){
// 					console.log(resp);
// 					resp = $.parseJSON(resp);
// 					for (var i = 0; i < resp.length; i++) {
// 						$('#categoria').append("<option value="+resp[i].id+">"+resp[i].nombre+"</option>");
// 					}
// 				}
// 			});
// 		}
// });

// _____________________________________________
// ------------EDITAR EN EVENTO------------
// _____________________________________________

// $(document).ready(function(){
	
// 	var location = window.location.search;
// 		console.log(location);

// 		if (location == '?evento=editar'){

// 			$.ajax({
// 				url: 'modelos/categoria/seleccionar.php',
// 				success:function(resp){
// 					console.log(resp);
// 					resp = $.parseJSON(resp);
// 					for (var i = 0; i < resp.length; i++) {
// 						$('#categoria').append("<option value="+resp[i].id+">"+resp[i].nombre+"</option>");
// 					}
// 				}
// 			});
// 		}
// });

/*=========================================================
=            				INDEX           		      =
=========================================================*/
$(document).ready(function(){

		console.log("CATEGORIAS INDEX!");


		var location = window.location.search;
		console.log(location);

		if (location == '?categoria=index'){

			var res = window.location.hash;
			res = (res.substr(1));
			console.log("Este es #:"+res);
			
			var datos = {
				id: res
			}


		$.ajax({
			url: 'modelos/categoria/index.php',
			type: 'POST',
			data: datos,
			success:function(resp){
				console.log(resp);
				resp = $.parseJSON(resp);
				$('#catactual').html(resp[0].categoria);
				for (var i = 0; i < resp.length; i++) {
					$('.eventocategoria').append(
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
	  			    	<p class="card-text">`+resp[i].startdate+" "+resp[i].starttime+`</p>
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
});

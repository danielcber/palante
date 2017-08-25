// _____________________________________________
// ------------------INDEX----------------------
// _____________________________________________
$(document).ready(function(){
		if(window.location == "http://localhost/palante/index.php?pag=principal"){
			estasemana()
		}
	});

function estasemana() {

		console.log("Esta semana!");
		$.ajax({
			url: 'modelos/calendario/semana.php',
			success:function(resp){
			console.log(resp);
			resp = $.parseJSON(resp);

				moment.locale('es');

			  	$('#dia1').html(`<h4>`+moment().format('ddd D'))+`</h4>`;
			  	$('#dia2').html(`<h4>`+moment().add(1, 'd').format('ddd D'))+`</h4>`;
				$('#dia3').html(`<h4>`+moment().add(2, 'd').format('ddd D'))+`</h4>`;
				$('#dia4').html(`<h4>`+moment().add(3, 'd').format('ddd D'))+`</h4>`;
				$('#dia5').html(`<h4>`+moment().add(4, 'd').format('ddd D'))+`</h4>`;
				$('#dia6').html(`<h4>`+moment().add(5, 'd').format('ddd D'))+`</h4>`;
				$('#dia7').html(`<h4>`+moment().add(6, 'd').format('ddd D'))+`</h4>`;

				for (var i = 0; i < resp.length; i++) {
					if (resp[i].startdate == moment().format("YYYY-MM-DD")) {
					  $('#dia1').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
					if (resp[i].startdate == moment().add(1, 'd').format("YYYY-MM-DD")) {
					  $('#dia2').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
					if (resp[i].startdate == moment().add(2, 'd').format("YYYY-MM-DD")) {
					  $('#dia3').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
					if (resp[i].startdate == moment().add(3, 'd').format("YYYY-MM-DD")) {
					  $('#dia4').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
					if (resp[i].startdate == moment().add(4, 'd').format("YYYY-MM-DD")) {
					  $('#dia5').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
					if (resp[i].startdate == moment().add(5, 'd').format("YYYY-MM-DD")) {
					  $('#dia6').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
					if (resp[i].startdate == moment().add(6, 'd').format("YYYY-MM-DD")) {
					  $('#dia7').append(`			
							<span>`+resp[i].titulo+`</span><br>
						`);
					}
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

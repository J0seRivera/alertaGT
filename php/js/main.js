
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		console.log(respuesta);
		console.log("coneccion exitosa");
	})
	.fail(function(){
		console.log("error");
	});
}

buscar_datos();

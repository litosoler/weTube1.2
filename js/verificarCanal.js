$(document).ready(function(){
	$.ajax({
		url: "../ajax/administrarContenido.php?opcion=5",
		method: "POST",
		dataType: "json",
		success: function(respuesta){
			if (respuesta.codigo == 0) {
				$("#nombre").val(respuesta.nombre);
				$("#apellido").val(respuesta.apellido);
				$("#crearCanal").modal('show');	
			}
		}
	});
});
$("#cancelar").click(function(){
	location.href = "inicio.php";
});
$("#crear").click(function(){
	var nombre, apellido;
	nombre = $("#nombre").val();
	apellido = $("#apellido").val();
	if (nombre == " " ){
		$("#nombre").addClass("error");
	}else{
		$("#nombre").removeClass("error");	
	}
	if (apellido == " " ){
		$("#apellido").addClass("error");
	}else{
		$("#apellido").removeClass("error");	
	}
	if (nombre != "" && apellido != "") {
		parametros = "nombre="+nombre+"&apellido="+apellido;
		$.ajax({
			url: "../ajax/administrarSesion.php?codigo=5",
			method:"POST",
			data: parametros,
			success: function(respuesta){
				if (respuesta.codigo == 1) {
					location.href = "canal.php";
				}else{
				$("#prueba").html(respuesta);
			}
			}
		});
	}	
});
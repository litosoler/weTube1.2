generarTargetasUsuario = function(){
	$.ajax({
		url: "ajax/inicio.php",
		method: "POST",
		success : function(resultado){
		$("#div-video").html(resultado);
		}
	});
}
generarTargetasUsuario();
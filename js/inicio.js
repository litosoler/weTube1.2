generarTargetasVideo = function(){
	$.ajax({
		url: "ajax/inicio.php",//	url: "ajax/acciones.php?accion=1",
		method: "POST",
		success : function(resultado){
		$("#div-videos").html(resultado);
		}
	});
}
generarTargetasVideo();
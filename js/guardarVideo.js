$("#guardar").click(function(){
	var nombre_video, resolucion, duracion, codigoIdioma, descripcion;
	//verificar que los campos esten llenos
	nombre_video = $("#nombre").val();
	if (nombre_video == "") {
		$("#div-nombre").addClass("has-error");
	}else{
		$("#div-nombre").removeClass("has-error");
	}

	if ($("#ancho").val() == "" || $("#ancho").val() == "") {
		if ($("#ancho").val() == "")
			$("#ancho").addClass("error");
		if ($("#alto").val() == "")
			$("#alto").addClass("error");
	}else{
		$("#ancho").removeClass("error");
		$("#alto").removeClass("error");
		resolucion = $("#ancho").val() +"x"+$("#alto").val() ;
	}
	if ($("#hora").val() == "" || $("#minutos").val() == "") {
		if ($("#hora").val() == "")
			$("#hora").addClass("error");
		if ($("#minutos").val() == "")
			$("#minutos").addClass("error");
	}else{
		$("#hora").removeClass("error");
		$("#minutos").removeClass("error");
		duracion = ($("#hora").val() * 60*60) + ($("#minutos").val()*60) ;
	}

	codigoIdioma = $("#idioma").val().trim(); 
		 if(codigoIdioma == 0) {
		 	$("#div-idioma").addClass("has-error");
		 }else{
       		$("#div-idioma").removeClass("has-error");
		 }

	descripcion = $("#descripcion").val();
	if (descripcion == "") {
		$("#div-descripcion").addClass("has-error");
	}else{
		$("#div-descripcion").removeClass("has-error");
	}

	if (nombre_video != "" && resolucion != "" && duracion != "" && codigoIdioma != "" && descripcion != "") {
		parametros = "nombre_video="+nombre_video+"&resolucion="+resolucion+"&duracion="+duracion+"&codigoIdioma="+codigoIdioma+"&descripcion="+descripcion+"&"+$("#oculto").val();
		$.ajax({
			url:"../ajax/administrarVideos.php?opcion=1",
			method:"POST",
			data: parametros,
			dataType: "json",
			success:function(repuesta){	
				if (repuesta.codigo == 1) {
					alert("te enviamos a la pagina anterior por si quieres subir otro video");
					location.href = "subirVideo.php";
				}

				$("#prueba").html(repuesta.mensaje);
				$("#nombre").val("");
				$("#ancho").val(""); 
				$("#alto").val("");
				$("#hora").val("");
				$("#minutos").val(""); 
				$("#descripcion").val("");
			},
			error: function (jqXHR, exception) {
				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				$('#prueba').html(msg);
			}
		});
	}
});
$("#cancelar").click(function(){
		parametros = $("#oculto").val();
		$.ajax({
			url:"../ajax/administrarVideos.php?opcion=2",
			method:"POST",
			data: parametros,
			dataType: "json",
			success:function(repuesta){	
				if (repuesta.codigo == 1) {
					alert("te enviamos a la pagina anterior por si quieres subir otro video");
					location.href = "subirVideo.php";
				}
			},
			error: function (jqXHR, exception) {
				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				$('#prueba').html(msg);
			}
		});
});
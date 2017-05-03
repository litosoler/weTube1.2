$("#editar").click(function(){
		$("#txt-descripion").attr("disabled",false);
		$("#editar").addClass("oculto");
		$("#guardar").removeClass("oculto");
		$("#cancelar").removeClass("oculto");
});

$("#cancelar").click(function(){
	$("#txt-descripion").val($("#original").val());
	$("#txt-descripion").attr("disabled",true);
		$("#editar").removeClass("oculto");
		$("#guardar").addClass("oculto");
		$("#cancelar").addClass("oculto");
});
$("#guardar").click(function(){
	parametro= "descripcion="+ $("#txt-descripion").val();

	$.ajax({
		url:"../ajax/administrarContenido.php?opcion=6",
		method:"POST",
		data:parametro,
		dataType:"json",
		success: function(respuesta){
			if (respuesta.codigo==1) {
				alert(respuesta.mensaje);
				$("#txt-descripion").attr("disabled",true);
				$("#editar").removeClass("oculto");
				$("#guardar").addClass("oculto");
				$("#cancelar").addClass("oculto");
			}else{
				alert(respuesta.mensaje);
				$("#txt-descripion").val($("#original").val());
				$("#txt-descripion").attr("disabled",true);
				$("#editar").removeClass("oculto");
				$("#guardar").addClass("oculto");
				$("#cancelar").addClass("oculto");
			}
			//$("#prueba").html(respuesta);// se usa este para depurar, junto con dataType:html
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
				alert(msg);
		}
	});


});

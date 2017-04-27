// $(".secciones").height(($(window).height() - 230)/2);

$("#guardar-categoria").click(function(){
	$("#guardar-categoria").button("loading");
	var id, descripcion;
	id = $("#anadir-ctg-id").val();
	if (id == "" ){
		$("#div-ctg-anadir-id").addClass("has-error");
			$("#guardar-categoria").button("reset");
	}else{
		$("#div-ctg-anadir-id").removeClass("has-error");	
	}
	descripcion = $("#anadir-ctg-desc").val();
	if (descripcion == "" ){
		$("#div-ctg-anadir-desc").addClass("has-error");
		$("#guardar-categoria").button("reset");

	}else{
		$("#div-ctg-anadir-desc").removeClass("has-error");	
	}

	if (id!= "" && descripcion!= "") {
	parametros = "id="+id+"&descripcion="+descripcion;
		$.ajax({
			url:"../ajax/administrarContenido.php?opcion=1",
			method:"POST",
			data: parametros,
			dataType: "json",
			success:function(respuesta){
				$("#guardar-categoria").button("reset");
				if (respuesta.codigo==1) {
				$("#prueba").html(respuesta.mensaje);
				$("#anadir-ctg-id").val("");
				$("#anadir-ctg-desc").val("");

			}
			}
		});
	}
});
var  pwd, correo;
/*validacion*/
$("#enviar").click(function(){
	// Password
	pwd = $("#pwd").val(); 
	if (pwd == "" ){
		$("#div-password").addClass("has-error");
	}else{
		$("#div-password").removeClass("has-error");	
	}


	//correo
	correo = $("#correo").val(); 
	if (correo == "" ){
		$("#div-correo").addClass("has-error");
	}else{
		$("#div-correo").removeClass("has-error");	
	}

	/*validacion*/
	if (pwd != "" && correo != "") {
		var parametro = "correo="+correo+"&pwd="+pwd;
		$.ajax({
			url: "../ajax/administrarSesion.php?codigo=3",
			method: "POST",
			data: parametro,
			dataType:"json",
			success: function(respuesta){
				if (respuesta.codigo == 1) {
					location.href ="inicio.php";
				}else if (respuesta.codigo == 2) {
					location.href = "opcionesAdmin.php";
				}else{
				$("#respesta").html("codigo:"+respuesta.codigo + "<br>mensaje: "+ respuesta.mensaje);
				}	

			}
		});
	}
});





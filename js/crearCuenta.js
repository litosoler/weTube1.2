	var  nombre, apellido, email, pwd, pwd2, dia,mes,año, telefono, codigoPais, genero;


$("#btn-siguiente").click(function(){
	$("#btn-siguiente").button("loading");
	//usuario
	nombre = $("#nombre").val(); 
		if (nombre == "" ){
			$("#nombre").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#nombre").removeClass("error");

		}
	apellido = $("#apellido").val(); 
		if (apellido == "" ){
			$("#apellido").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#apellido").removeClass("error");

		}

	//email
	email = $("#email").val(); 
		if (email == "" ){
			$("#div-email").addClass("has-error");
			$(this).button("reset");
		}
		else{
			$("#div-email").removeClass("has-error");	
		}
	// comparar contraseñas
	pwd = $("#pwd").val(); 
	pwd2 = $("#pwd2").val();
	if (pwd != pwd2) {
		pwd ="";
		pwd2="";
		$("#pwd").val("");
		$("#pwd2").val("");
	} 

	//crear contraseña
		if (pwd == "" ){
			$("#div-pwd").addClass("has-error");
			$(this).button("reset");
		}
		else{
			$("#div-pwd").removeClass("has-error");	
		}

		//confirmar contraseña
		if (pwd2 == "" ){
			$("#div-pwd2").addClass("has-error");
			$(this).button("reset");
		}
		else{
			$("#div-pwd2").removeClass("has-error");	
		}
	//fecha nacimiento
	dia = $("#dia").val(); 
		if (dia == "" ){
			$("#dia").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#dia").removeClass("error");	
		}
	mes = $("#mes").val(); 
		if (mes == 0 ){
			$("#mes").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#mes").removeClass("error");	
		}
	año = $("#año").val(); 
		if (año == "" ){
			$("#año").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#año").removeClass("error");	
		}	
		//telefono
	telefono = $("#numero").val(); 
		if (telefono == "" ){
			$("#numero").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#numero").removeClass("error");	
		}

		//genero
	genero = $("#genero").val().trim(); 
		 if ( genero == 0) {
		 	$("#div-genero").addClass("has-error");
		 	$(this).button("reset");
		 }else{
       		$("#div-genero").removeClass("has-error");
		 }
    


		// ubicacion
	codigoPais = $("#ubicacion").val().trim(); 
		 if(codigoPais == 0) {
		 	$("#codigo-area").addClass("error");
		 	$("#div-ubicacion").addClass("has-error");
		 	$(this).button("reset");
		 }else{
		 	 $("#codigo-area").removeClass("error");
       		$("#div-ubicacion").removeClass("has-error");
		 }



	/*Guardar Registro*/
	if(nombre != "" && apellido != "" && email != "" && pwd == pwd2 && pwd != "" && dia != "" && mes != 0 && año != "" && telefono != "" && genero != 0 && codigoPais != 0){
		parametro = "nombre="+nombre+"&apellido="+apellido+"&email="+email+"&pwd="+pwd+"&pwd2="+pwd2+"&fechaNacimiento="+año+"-"+mes+"-"+dia+"&telefono="+telefono+"&genero="+genero+"&codigoPais="+codigoPais;
		$.ajax({
			url: "../ajax/administrarSesion.php?codigo=2",
			method:"POST",
			data: parametro,
			dataType: "json",
			success:function(resultado){
				$("#btn-siguiente").button("reset");
				if (resultado.codigo == 1) {
					location.href ="../ur/iniciarSesion.php";
				}else{
					$("#p").html(resultado.mensaje);
				}				

			}

		});
	}
});
$("#nombre").click(function(){
	  
		if ($("#nombre").val() == "" ){
			$("#nombre").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#nombre").removeClass("error");

		}
});
$("#nombre").change(function(){
	  
		if ($("#nombre").val() == "" ){
			$("#nombre").addClass("error");
			$(this).button("reset");
		}
		else{
			$("#nombre").removeClass("error");

		}

});

$("#mes").click(function(){
	if ($("#mes").val() == 0 ){
		$("#mes").addClass("error");
	}
	else{
		$("#mes").removeClass("error");	
	}

});

$("#genero").click(function(){

	if ( $("#genero").val().trim() == 0) {
		$("#div-genero").addClass("has-error");
	}else{
		$("#div-genero").removeClass("has-error");
	}

});
// actualisa el input del codigo del telefono
$("#ubicacion").click(function(){
	parmetros = "CODIGO_PAIS="+$("#ubicacion").val(); 
	$.ajax({
		url: "../ajax/administrarSesion.php?codigo=1",
		method:"POST",
		data: parmetros,
		dataType: "html",
		success:function(resultado){
			$("#codigo-area").val(resultado);
		}

	});
	if($("#ubicacion").val() == 0) {
		 	$("#codigo-area").addClass("error");
		 	$("#div-ubicacion").addClass("has-error");;
		 }else{
		 	 $("#codigo-area").removeClass("error");
       		$("#div-ubicacion").removeClass("has-error");
		 }
});

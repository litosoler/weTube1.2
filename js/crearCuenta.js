	var  usr, email, pwd, pwd2, telefono, ubicacion, genero;


$("#btn-siguiente").click(function(){
	//usuario
	usr = $("#usr").val(); 
		if (usr == "" ){
			$("#div-usr").addClass("has-error");
		}
		else{
			$("#div-usr").removeClass("has-error");	
		}

	//email
	email = $("#email").val(); 
		if (email == "" ){
			$("#div-email").addClass("has-error");
		}
		else{
			$("#div-email").removeClass("has-error");	
		}

	//crear contraseña
	pwd = $("#pwd").val(); 
		if (pwd == "" ){
			$("#div-pwd").addClass("has-error");
		}
		else{
			$("#div-pwd").removeClass("has-error");	
		}

		//confirmar contraseña
	pwd2 = $("#pwd2").val(); 
		if (pwd2 == "" ){
			$("#div-pwd2").addClass("has-error");
		}
		else{
			$("#div-pwd2").removeClass("has-error");	
		}

		//telefono
	telefono = $("#telefono").val(); 
		if (telefono == "" ){
			$("#div-telefono").addClass("has-error");
		}
		else{
			$("#div-telefono").removeClass("has-error");	
		}

		//genero
	genero = $("#genero").val(); 
		 if ($('#genero').val().trim() === '') {
       		 alert('Elige una Genero Correcto');
  		  } 
    


		// ubicacion
	ubicacion = $("#ubicacion").val(); 
		 if ($('#ubicacion').val().trim() === '') {
       		 alert('Ubicacion INCORRECTA, elige una ubicacion Correcta');
  		  }
    

	

});


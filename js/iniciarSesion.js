var  password, correo;

// Password
$("#btn-siguiente").click(function(){
	password = $("#password").val(); 
		if (password == "" ){
			$("#div-password").addClass("has-error");
		}
		else{
			$("#div-password").removeClass("has-error");	
		}

//correo

$("#btn-siguiente").click(function(){
	correo = $("#correo").val(); 
		if (correo == "" ){
			$("#div-correo").addClass("has-error");
		}
		else{
			$("#div-correo").removeClass("has-error");	
		}

});



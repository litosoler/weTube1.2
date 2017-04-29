/*CODIGO_PAIS, CODIGO_TIPO_USUARIO, CODIGO_ESTADO_USUARIO, NOMBRE, APELLIDO, CORREO_ELECTRONICO, PASSWORD, FOTOGRAFIA, USUARIO, SEXO, FECHA_NACIMIENTO, FECHA_REGISTRO, TELEFONO*/
var codigoArea;
function rellenarCampos(){
	$(".form").attr("disabled",true);
	$.ajax({
		url:"../ajax/administrarContenido.php?opcion=2",
		method:"POST",
		dataType:"json",
		success: function(respuesta){
			$("#nombre").val(respuesta.NOMBRE);
			$("#apellido").val(respuesta.APELLIDO);
			$("#usuario").val(respuesta.USUARIO);
			$("#email").val(respuesta.CORREO_ELECTRONICO);
			$("#ubicacion option[value="+respuesta.CODIGO_PAIS+"]").attr("selected",true);
			$("#numero").val(respuesta.TELEFONO);
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
			var partes = respuesta.FECHA_NACIMIENTO.split(' ');
			partes = partes[0].split('-');
			$("#dia").val(partes[2]);
			$("#mes option[value="+partes[1]+"]").attr("selected",true);
			$("#año").val(partes[0]);
		}
	});
}
$(document).ready(function(){
	rellenarCampos();
});

// actualisa el input del codigo del telefono
$("#ubicacion").change(function(){
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
//habilitar los inputs para poder modificarlos
$("#actualizar").click(function(){
	$(".form").attr("disabled",false);
	$("#guardar").removeClass("oculto");	
	$("#cancelar").removeClass("oculto");	
});
//actualizar la info en la base
$("#guardar").click(function(){
	var  nombre, apellido, email, dia, mes, año, telefono, codigoPais, genero;
	//usuario
	nombre = $("#nombre").val(); 
	if (nombre == "" ){
		$("#nombre").addClass("error");
	}
	else{
		$("#nombre").removeClass("error");
	}
	apellido = $("#apellido").val(); 
	if (apellido == "" ){
		$("#apellido").addClass("error");
	}
	else{
		$("#apellido").removeClass("error");
	}

	//usuario
	usuario = $("#usuario").val(); 
	if (usuario == "" ){
		$("#div-usuario").addClass("has-error");
	}
	else{
		$("#div-usuario").removeClass("has-error");	
	}

	//email
	email = $("#email").val(); 
	if (email == "" ){
		$("#div-email").addClass("has-error");
	}
	else{
		$("#div-email").removeClass("has-error");	
	}
	
	//fecha nacimiento
	dia = $("#dia").val(); 
	if (dia == "" ){
		$("#dia").addClass("error");
	}
	else{
		$("#dia").removeClass("error");	
	}
	mes = $("#mes").val(); 
	if (mes == 0 ){
		$("#mes").addClass("error");
	}
	else{
		$("#mes").removeClass("error");	
	}
	año = $("#año").val(); 
	if (año == "" ){
		$("#año").addClass("error");
	}
	else{
		$("#año").removeClass("error");	
	}	

	//telefono
	telefono = $("#numero").val(); 
	if (telefono == "" ){
		$("#numero").addClass("error");
	}
	else{
		$("#numero").removeClass("error");	
	}

	// ubicacion
	codigoPais = $("#ubicacion").val().trim(); 
	if(codigoPais == 0) {
		$("#codigo-area").addClass("error");
		$("#div-ubicacion").addClass("has-error");
	}else{
		$("#codigo-area").removeClass("error");
		$("#div-ubicacion").removeClass("has-error");
	}
	//actualizar registro
	if(nombre != "" && apellido != "" && usuario!= ""& email != "" && dia != "" && mes != 0 && año != "" && telefono != "" && codigoPais != 0){
		parametro = "nombre="+nombre+"&apellido="+apellido+"&usuario="+usuario +"&email="+email+"&fechaNacimiento="+año+"-"+mes+"-"+dia+"&telefono="+telefono+"&codigoPais="+codigoPais;
		$.ajax({
			url: "../ajax/administrarContenido.php?opcion=4",
			method:"POST",
			data: parametro,
			dataType: "json",
			success:function(resultado){
				if (resultado.codigo==1) {			
					$(".form").attr("disabled",true);
					$("#cancelar").addClass("oculto");		
					$("#guardar").addClass("oculto");
					$("#prueba2").html(resultado.mensaje);
					rellenarCampos();
				}else{
					$("#prueba2").html(resultado.mensaje);
				}
			}

		});
	}
});
//descartar los cambios en informacion
$("#cancelar").click(function(){
	rellenarCampos();
	$("#cancelar").addClass("oculto");		
	$("#guardar").addClass("oculto");
});
//descartar los cambios en contraseñas
$("#cerrar").click(function(){
	$("#pwd-actual").val("");
	$("#pwd-nueva").val("");
	$("#pwd-confirmacion").val("");
});
// actualiza los datos de la cotraseña
$("#actulizarContrasena").click(function(){
	var pwd_actual, pwd_nueva , pwd_confirmacion;
	pwd_actual = $("#pwd-actual").val();
	pwd_nueva = $("#pwd-nueva").val();
	pwd_confirmacion = $("#pwd-confirmacion").val();
	//$("#prueba").html(pwd_nueva +pwd_actual + pwd_confimacion);
	if(pwd_actual == "") {
		$("#div-actual").addClass("has-error");
	}else{
		$("#div-actual").removeClass("has-error");
	}

	if(pwd_nueva != pwd_confirmacion){
		$("#pwd-nueva").val("");
		$("#pwd-confirmacion").val("");
		pwd_confimacion = "";
		pwd_nueva= "";
	}

	if(pwd_nueva == "") {
		$("#div-nueva").addClass("has-error");
	}else{
		$("#div-nueva").removeClass("has-error");
	}

	if(pwd_confirmacion == "") {
		$("#div-confirmacion").addClass("has-error");
	}else{
		$("#div-confirmacion").removeClass("has-error");
	}

	if (pwd_nueva != "" && pwd_actual != "" ){
		parmetros ="pwd-actual="+pwd_actual+"&pwd-nueva="+pwd_nueva;
		$.ajax({
			url: "../ajax/administrarContenido.php?opcion=3",
			method: "POST",
			data: parmetros,
			dataType: "json",
			success: function(respuesta){
				if (respuesta.codigo == 1) {
					$("#prueba").html(respuesta.mensaje);
					$("#pwd-actual").val("");
					$("#pwd-nueva").val("");
					$("#pwd-confirmacion").val("");	
				}else{
					$("#prueba").html(respuesta.mensaje);
				}
			}
		});
	}
});
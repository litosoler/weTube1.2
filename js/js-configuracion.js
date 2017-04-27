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
	$(".form").attr("disabled",true);
	$("#cancelar").addClass("oculto");		
	$(this).addClass("oculto");
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
})
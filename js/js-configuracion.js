$("#actualizar").click(function(){
 	$(".form-control").attr("disabled", false);
 	$("#guardar").removeClass("oculto");
});
$("#guardar").click(function(){
	$(".form-control").attr("disabled",true);
	$(this).addClass("oculto");
});


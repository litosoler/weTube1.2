$("#icono-subirVideo").hover(
	function(){
		$("#icono-subirVideo").attr("src","../img/icono-subirVideo2.png");
	},
	function(){
		$("#icono-subirVideo").attr("src","../img/icono-subirVideo.png");		
	}
);
$("#cerrarSesion").click(function(){
	$.ajax({
		url:"../ajax/administrarSesion.php?codigo=4",
		method: "POST",
		success:function(){
			location.href ="../uNr/inicio.php";
		}
	});

});
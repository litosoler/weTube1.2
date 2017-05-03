$(document).ready(function() {
	parametro = "codigo="+$("#info").val();
	$.ajax({
		url: "../ajax/administrarVideos.php?opcion=3",
		method: "POST",
		data: parametro,
		dataType:"json",
		success: function(respuesta){
			projekktor('#player_a', {
				poster: respuesta.URL_IMG , 
				width: 750,
				height: 400,
				playlist: [
				{
					0: {src: respuesta.RUTA_VIDEO, type: "video/mp4"}
				}
				]    
    			}, function(player) {} // on ready 
   				 );
			//$("#prueba").html(respuesta.RUTA_VIDEO);
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
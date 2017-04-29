<?php
	/*determina si hay una sesion iniciada, si no te regresa al inicio de sesion*/
	session_start();
	if (!array_key_exists("codigoUsuario", $_SESSION)){
		header("Location: iniciarSesion.php");
	}
	if ($_SESSION["codigoTipoUsuario"] != 2){
		header("Location: iniciarSesion.php");
	}
	if ($_SESSION["CODIGO_CANAL"]!= -1) {
		header("Location: canal.php");
	}
	echo "codigo usuario: ".$_SESSION["codigoUsuario"]."<br>tipo usuario: ".$_SESSION["codigoTipoUsuario"]."<br>codigo Canal: ".$_SESSION["CODIGO_CANAL"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Canal</title>
	<!-- Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="../css/css-basica.css">
</head>
<body>
<!-- modal para cuando no hay un canal regirstrado -->
<div id="crearCanal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h1>Usar YouTube como...</h1>
			</div>
			<div class="modal-body">
				<div class="form-group">
				<div id="div-nombre" class="form-group">
					<input type="text" id="nombre" class="input">
				</div>
				<div id="div-apellido" class="form-group">
					<input type="text" id="apellido" class="input error">
				</div>
				</div>
				<p>Al hacer clic en "Crer canal", aceptas las <a href="#">Condiciones de Servicio de YouTube.</a><a href="#">Mas informacion</a></p>
				<br>
				<p id="prueba"></p>
			</div>
			<div class="modal-footer">
				<button type="button" id="cancelar" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
				<button type="button" id="crear" class="btn btn-success" >Crear Canal</button>
			</div>
		</div>

	</div>
</div>
 <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="../js/verificarCanal.js" type="text/javascript"></script>
</body>
</html>
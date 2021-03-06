<?php
//include_once
include_once("../class/class-conexion.php");
// determina si hay una sesion iniciada, si no te regresa al inicio de sesion
session_start();
if (!array_key_exists("codigoUsuario", $_SESSION)){
	header("Location: iniciarSesion.php");
}
if ($_SESSION["codigoTipoUsuario"] != 2){
	header("Location: iniciarSesion.php");
}
if ($_SESSION["CODIGO_CANAL"] ==-1){
	header("Location: verificarCanal.php");
}

//consultas a la base de datos
	//consulta para rellenar la barra superior
	$conexion = new Conexion();
	$sql = "SELECT CORREO_ELECTRONICO, USUARIO FROM tbl_usuarios WHERE CODIGO_USUARIO ='".$_SESSION["codigoUsuario"]."';";
	$consulta = $conexion->ejecutar($sql);
	$fila = $conexion->obtenerFila($consulta);
	//consulta para obtener infomacion del canal
	$sql = "SELECT NOMBRE_CANAL, DESCRIPCION, CANTIDAD_SUSCRIPTORES, FECHA_CREACION, URL_CANAL FROM tbl_canales WHERE CODIGO_CANAL='".$_SESSION["CODIGO_CANAL"]."';";
	$consulta_1 = $conexion->ejecutar($sql);
	$fila_1 = $conexion->obtenerFila($consulta_1);
	echo "<input type='text' id='original' class='oculto' value='".$fila_1["DESCRIPCION"]."'>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Youtube</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/css-basica.css">
	<link rel="stylesheet" type="text/css" href="../css/canal.css">
</head>
<body>
	<!-- encabezado -->
	<div class="container-fluid barra-superior">
		<div class="row">
			<div class=" col-xs-4 col-sm-2 col-md-2">
				<span class="dropdown">
					<span id="icono-menu" class="glyphicon glyphicon-menu-hamburger dropdown-toggle" data-toggle="dropdown"></span>
					<ul class="dropdown-menu">
						<li><a href="inicio.php">Inicio</a></li>
						<li><a href="verificarCanal.php">Mi canal</a></li>
						<li><a href="#">Tendencias</a></li>
						<li><a href="#">Suscripciones</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">BIBLIOTECA</li>
						<li><a href="#">Historial</a></li>
						<li><a href="#">Ver más tarde</a></li>
						<li><a href="#">Videos favoritos</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">SUSCRIPCIONES</li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li class="divider"></li>
						<li><a href="#">Explorar Canales</a></li>
					</ul>
				</span>
				<a href="inicio.php"><img class="hidden-sm hidden-xs logo-youtube " src="../img/logo-youtube.png"></a>
				<a href="inicio.php"><img id="logo-sm" class="hidden-md hidden-lg" src="../img/logo-reproduccion.png"></a>         
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7">
				<div class="input-group ">
					<input type="text" class="form-control" placeholder="Search" >
					<div class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="col-xs-0 col-sm-1 col-md-1">       		 	
			</div>
			<div class="input-group-btn col-xs-2 col-sm-2  col-md-2">
				<span class="dropdown">   
					<a class="btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></a>
					<ul id="dropdown-menu-usuario" class="dropdown-menu">
						<li><a href="ConfiguracionUsuario.php"><span class="glyphicon glyphicon-cog"></span>Configuraciones</a></li>
						<li class="divider"></li>
						<li><a>Correo: <?php echo $fila["CORREO_ELECTRONICO"];  ?></a></li>	
						<li><a>Usuario: <?php echo $fila["USUARIO"];  ?></a></li>
						<li class="divider"></li>
						<li><a id="cerrarSesion" class="btn">Cerrar Sesión</a></li>
					</ul>
				</span>
				<span class="dropdown"> 
					<a class="btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span></a>
					<ul id="dropdown-menu-noti" class="dropdown-menu">
						<li class="dropdown-header">Notificaciones</li>
						<li class="divider"></li>
						<li><a href="">Sin notificaiones pendientes</a></li>
					</ul>
				</span>
				<a class="btn btn-primary" href="subirVideo.php"><span class="glyphicon glyphicon-open"></span></a>

			</div>
		</div>
	</div>
	<div class="barra2">
	</div>	
<!-- cuerpo -->
<div class="container cuerpo">
	<div class="row">
		<div id="cuerpo-canal" class="col-md-12">
			<div id="intro-canal">
				<div id="perfil">
					<!-- <img id="img-perfil" src="../img/perfil.jpg" class="img-responsive"> -->
				</div>
				<div id="canal-info">

					<h3><strong>Nombre Canal:</strong> <?php echo $fila_1["NOMBRE_CANAL"];?></h3>
					<div class="form-group">
					<label for="txt-descripion">Descricion:</label>
					<textarea id="txt-descripion" class="form-control" rows="5" disabled="true"><?php echo $fila_1["DESCRIPCION"];  ?></textarea>
					<br>
						<div>
						<button id="editar" class="btn btn-warning">Editar Descricion</button>
						<button id="guardar" class="btn btn-primary oculto">Guardar</button>
						<button id="cancelar" class="btn btn-warning oculto">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			<div id="prueba">
				
			</div>
			<div id="canal-suscripciones">
				<h5>Suscripciones</h5>
			</div>
			<div id="canal-videos-subidos">
				<h5>Videos Subidos</h5>
				
			</div>
			<div id="listas-creadas">
				<h5>Lista de reproduciones creadas</h5>
				
			</div>
			<div id="videos-favoritos">
				<h5>Vídeos favoritos</h5>
				
			</div>
			<div id="listas-guardadas">
				<h5>Listas de reproducción guardadas</h5>
				
			</div>
		</div>
	</div>
</div>

<!-- pie de pagina -->
<div class="barra-inferior">

	<ul class="HLista">
		<a href="#"><li><img class="logo-youtube" src="../img/logo-youtube.png"></li></a>
		<hr class="clear">
	</ul>  
	<ul class="HLista2 hidden-xs hidden-sm">
		<a data-toggle="modal" data-target="#myModal"><li>Información</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Prensa</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Derechos de autor</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Creadores</li></a> 
		<a data-toggle="modal" data-target="#myModal"><li>Publicidad</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Desarrolladores</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>+Youtube</li></a>               
	</ul>
	<ul class="HLista3 hidden-xs hidden-sm">
		<a data-toggle="modal" data-target="#myModal"><li>Términos</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Privacidad</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Politica y seguridad</li></a>
		<a data-toggle="modal" data-target="#myModal"><li>Enviar sugerencias</li></a> 
		<a data-toggle="modal" data-target="#myModal"><li>Probar las nuevas funciones</li></a>
		<li>© 2017 YouTube, LLC </li>   
	</ul>
</div>

<!-- ventana modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Lo sentimos, estamos trabajando en esta Funcionalidad.</h5>
			</div>
			<div class="modal-body">
				<img src="../img/icono-enfermo.png" class="img-responsive">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/js-basica.js" type="text/javascript" ></script>
<script src="../js/canal.js" type="text/javascript"></script>
</body>
</html>
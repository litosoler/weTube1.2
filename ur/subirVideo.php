<?php
// include once
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
	//rellena la info de la cabezera
	$conexion = new Conexion();
	$sql = "SELECT CORREO_ELECTRONICO, USUARIO FROM tbl_usuarios WHERE CODIGO_USUARIO ='".$_SESSION["codigoUsuario"]."';";
	$consulta = $conexion->ejecutar($sql);
	$fila = $conexion->obtenerFila($consulta);
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
	<link rel="stylesheet" type="text/css" href="../css/css-subirVideo.css">


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
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div id="subirVideo" class="segmentoBody col-md-12">

				<form action="guardarVideo.php" method="post" enctype="multipart/form-data" class="form-group col-md-offset-4 col-md-4">
					<div class="form-group">
					<label for="video" style="float: left;">Seleccione un video:</label>
					<input type="file" name="video" id="video" class="btn btn-warning" required=""></input>
					</div>
					<div class="form-group">
					<label for="img" style="float: left;">Seleccione una miniatura:</label>
					<input type="file" name="img" id="img" class="btn btn-warning" required=""></input>
					</div>
					<input type="submit" value="Guardar archivo" class="btn btn-primary" style="float: left;"></input>

				</form>

				<!-- <img id="icono-subirVideo" src="../img/icono-subirVideo.png">
				<h4>Selecciona los archivos que quieras subir</h4>
				<h5>O arrastra y suelta archivos de vídeo</h5>
				<select>
					<option>Público</option>
					<option>Oculto</option>
					<option>Privado</option>
				</select> -->
			</div>
			<div id="ayuda" class="segmentoBody col-md-12">
				AYUDA Y SUGERENCIAS
				<br>
				<span>¿Quieres subir vídeos de más de 15 minutos?<a href="#">Aumenta el límite</a></span>
				<br>
				<span>Al enviar tus vídeos a YouTube confirmas que aceptas las <a href=""> Condiciones de Servicio</a> y las <a href="">Normas de la Comunidad</a> de YouTube. 
					Asegúrate de que no infringes los derechos de privacidad o derechos de autor de otros.<a href="">Más información</a></span>
					<ul >
						<li >
							<a class="quitar-borde" href="">Instrucciones de subida</a>
						</li>
						<li>
							<a href="">Solución de problemas</a>
						</li>
						<li>
							<a href="">Subidas desde móvil</a>
						</li>
					</ul>	
				</div>
			</div>
			<div class="col-md-3">
				<div id="importar" class="segmentoBody col-md-12">
					<p> IMPORTAR VÍDEOS</p>
					<div>
						<img class="float-left" src="../img/icono-importar.png">
						<p>Importar tus vídeos de otro lado</p>
						<button class="btn btn-sm">Importar</button>
					</div> 		
				</div>
				<div id="emision" class="segmentoBody col-md-12">
					<p>EMISIÓN EN DIRECTO </p>
					<div>
						<img class="float-left" src="../img/icono-emision.png">
						<p>Configura tu canal y organiza emisiones en directa para tus fans</p>
						<button class="btn btn-sm">Empezar</button>
					</div>
				</div>
				<div id="crear" class="segmentoBody col-md-12">
					<p>CREAR VÍDEOS</p>
					<div>
						<img class="float-left" src="../img/icono-crear.png">
						<p>Presentación de diapositivas de fotos</p>
						<button class="btn btn-sm">Crear</button>
					</div>
					<p></p>
					<div>
						<img class="float-left" src="../img/icono-editar.png">
						<p>Editor de vídeo</p>
						<button class="btn btn-sm">Editar</button>
					</div>
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
					<h3 class="modal-title">Lo sentimos, estamos trabajando en esta Funcionalidad.</h3>
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
</body>
</html>
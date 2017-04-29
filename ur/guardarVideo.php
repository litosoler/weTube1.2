<?php
include_once("../class/class-conexion.php");
/*determina si hay una sesion iniciada, si no te regresa al inicio de sesion*/
session_start();
if (!array_key_exists("codigoUsuario", $_SESSION)){
	header("Location: iniciarSesion.php");
}
if ($_SESSION["codigoTipoUsuario"] != 2){
	header("Location: iniciarSesion.php");
}
if($_SESSION["CODIGO_CANAL"] == -1){
	header("Location: verificarCanal.php");
}

echo "codigo usuario: ".$_SESSION["codigoUsuario"]."<br>tipo usuario: ".$_SESSION["codigoTipoUsuario"]."<br>codigo Canal: ".$_SESSION["CODIGO_CANAL"];

if (!$_FILES["video"]) {
	header("Location: subirVideo.php");
}
if ($_FILES['video']["error"] > 0)
{
	header("Location: subirVideo.php?error=1");
}
else
{
	$nombre_video = $_FILES['video']['name'];
	$tipo_video = $_FILES['video']['type'];
	$tamaño_video=$_FILES["video"]["size"];
	$carpeta_temp_video= $_FILES['video']['tmp_name'];
	$destino_video = "../videos/archivo/".$nombre_video;
	$nombre_img = $_FILES['img']['name'];
	$destino_img = "../videos/miniatura/".$nombre_img;
	$parametros = "tipo_video=".$tipo_video."&tamaño_video=".$tamaño_video."&destino_video=".$destino_video."&nombre_img=".$nombre_img."&destino_img=".$destino_img;
	echo "<input type='text' id='oculto' hidden='true' value='".$parametros."'>";
	move_uploaded_file($_FILES["img"]["tmp_name"], $destino_img);
	move_uploaded_file($_FILES["video"]["tmp_name"], $destino_video);
}


//rellena el campo de idiomas
$conexion = new Conexion();
$sql = "SELECT CODIGO_IDIOMA, NOMBRE_IDIOMA, ABREVIATURA FROM tbl_idiomas;";
$consulta = $conexion->ejecutar($sql);


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
							<li><a href="#">Inicio</a></li>
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
						<ul class="dropdown-menu">
							<li>Correo Electronico</li>	
							<li class="divider"></li>
							<a href="ConfiguracionUsuario.php"><span class="glyphicon glyphicon-cog"></span></a>
							<li>Nombre Usuario</li>
							<li># Suscriptores</li>
							<li class="divider"></li>
							<a class="btn btn-primary form-control" href="../uNr/inicio.php">Cerrar Sesión</a>
						</ul>
					</span>
					<span class="dropdown"> 
						<a class="btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Notificaciones</li>
							<li class="divider"></li>
							<li><a href="#">Notificaion 1</a></li>
							<li class="divider"></li>
							<li><a href="#">Notificacion 2</a></li>
						</ul>
					</span>
					<a class="btn btn-primary" href="subirVideo.php"><span class="glyphicon glyphicon-open"></span></a>

				</div>
			</div>
		</div>
		<div class="barra2">
		</div>	
	</div>
	<!-- cuerpo -->
	<div class="container cuerpo">
		<div class="row">
		<div id="prueba"></div>
			<div id="cuerpo-guardadVideo" class="col-md-12">
				<div>
					<div class="col-md-6">
						<div>
							<img id="miniatura" src="<?php echo $destino_img?>" class="img img-responsive">
						</div>
						<br>
						<div id="div-nombre" class="form-group">
							<label for="nombre">Nombre del Video:</label>
							<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre_video;?>">
						</div>
						<div class="form-group">
							<label for="resolucion">Resolucion:</label>
							<p id="resolucion" >
							<input type="number" name="ancho" id="ancho" class="input col-md-6" placeholder="Anchura">
							<input type="number" name="alto" id="alto" class="input col-md-6" placeholder="Altura">
							</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="duracion">duracion del Video:</label>
							<p id="duracion">
							<input type="number" id="hora" name="hora" class="input col-md-6" placeholder="horas">
							<input type="number" id="minutos" name="minutos" class="input col-md-6" placeholder="minutos">
							</p>
						</div>
						<div id="div-idioma" class="form-group">
							<label for="idioma">idioma</label>
							<select id="idioma" name="idioma" class="form-control">
							<option value="0">---Escoga el idioma---</option>
							<?php  
								while ($fila= $conexion->obtenerFila($consulta)) {
									echo "<option value='".$fila["CODIGO_IDIOMA"]."'>".$fila["NOMBRE_IDIOMA"]."</option>";
								}
							?>
							</select>
						</div>
						<div id="div-descripcion" class="form-group">
							<label for="descripcion">Descripcion:</label>
							<textarea class="form-control" rows="5" id="descripcion"></textarea>
						</div>				
					</div>
					<div class="col-md-offset-3 col-md-6 btn-group">
						<button id="guardar" class="btn btn-primary col-md-6">Guardar</button> 
						<button id="cancelar" class="btn btn-warning col-md-6">Cancelar</button> 
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
	<script src="../js/guardarVideo.js" type="text/javascript" ></script>
</body>
</html>
<?php 
	$conexion->cerrarConexion();
 ?>
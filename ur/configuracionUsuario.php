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

//consultas a la base de datos
	$conexion = new Conexion();
	$sql_1 = "SELECT CORREO_ELECTRONICO, USUARIO FROM tbl_usuarios WHERE CODIGO_USUARIO ='".$_SESSION["codigoUsuario"]."';";
	$consulta_1 = $conexion->ejecutar($sql_1);
	$fila_1 = $conexion->obtenerFila($consulta_1);

$sql ="SELECT CODIGO_PAIS, NOMBRE_PAIS, CODIGO_AREA FROM tbl_paises;";
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
	<link rel="stylesheet" type="text/css" href="../css/css-configuracion.css">


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
						<li><a>Correo: <?php echo $fila_1["CORREO_ELECTRONICO"];  ?></a></li>	
						<li><a>Usuario: <?php echo $fila_1["USUARIO"];  ?></a></li>
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
			<div class="col-md-3">
				<div id="nav">
					<p>	CONFIGURACIÓN DE LA CUENTA</p>
					<ul>
						<li class="activo"><a>Vision General</a></li>
					</ul>
				</div>
			</div>
			<div id="informacion" class="col-md-9">
				<div >
					<div id="informacion-hd">
						<span>Vision General</span>
						<button id="actualizar" class="btn btn-primary btn-sm">Modificar Informaicon</button>
						<button data-toggle="modal" data-target="#establecerContrasena" id="contrasena" class="btn btn-primary btn-sm">Modificar Contraseña</button>
					</div>
					<p id="prueba2"></p>
					<hr>
					<div id="info-cuerpo" class="col-md-12">
						<div class="form-group col-xs-12 col-sm-12  col-md-offset-3 col-md-6">
							<!-- nombre -->
							<div  class="form-group">
								<label for="">Nombre:</label>
								<p  class="form-group">
									<input id="nombre" type="text" class="col-md-6 input form" placeholder="Nombre">
									<input id="apellido" type="text" class="col-sm-6 input form" placeholder="Apellido">
								</p>
							</div>
							<!-- nombre usuario -->
							<div id="div-usuario" class="form-group ">
								<label for="usuario">Nombre Usuario:</label>
								<input type="text" class="form-control form" id="usuario">
							</div>
							<!-- correo -->
							<div id="div-email" class="form-group">
								<label for="email">Correo Electronico:</label>
								<input type="email" class="form-control form" id="email">
							</div>
							<!-- fecha Nacimiento -->
							<div  class="form-group">
								<label for="">Fecha de Nacimiento:</label>
								<p  class="form-group">
									<input id="dia" type="number" class="col-md-2 input form" placeholder="dia">
									<select id="mes" class="input col-md-6 form">
										<option value="0">mes</option>
										<option value="1">Enero</option>
										<option value="2">Febrero</option>
										<option value="3">Marzo</option>
										<option value="4">Abril</option>
										<option value="5">Mayo</option>
										<option value="6">Junio</option>
										<option value="7">Julio</option>
										<option value="8">Agosto</option>
										<option value="9">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>
									</select>
									<input id="año" type="number" class="col-sm-4 input form" placeholder="año">
								</p>
							</div>
							<!-- pais -->
							<div id="div-ubicacion" class="form-group">
								<label for='ubicacion'>Ubicación:</label>
								<select class='form-control form' id='ubicacion'>
									<option value='0'>---Secliona un Pais---</option>
									<?php 
									while($fila = $conexion->obtenerFila($consulta)){
										echo "<option value='".$fila["CODIGO_PAIS"]."'>".$fila["NOMBRE_PAIS"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
									}
									?>
								</select>
							</div>
							<!-- telefono -->
							<div  class="form-group">
								<label for="">Telefono:</label>
								<p id="div-telefono" class="form-group">
									<input id="codigo-area" type="text" class="col-md-2 input" disabled="disabled">
									<input id="numero" type="text" required placeholder="solo numeros y espacios"  class="col-sm-10 input form">
								</p>
							</div>
							<div class="form-group" id="guardar-div">
								<br>
								<button id="guardar" class="btn btn-primary oculto" >Guardar</button>
								<button id="cancelar" class="btn btn-warning oculto" >Cancelar</button>
							</div>
						</div>
					</div>
					<br>
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
	<!-- modal, modificar contraseña -->
	<div id="establecerContrasena" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Ingresa los datos</h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="form-group" id="div-actual">
						<label for="pwd-actual">Contraseña Actual</label>
						<input type="password" id="pwd-actual" class="form-control">
						</div>
						<div class="form-group" id="div-nueva">
						<label for="pwd-nueva">Contraseña Nueva</label>
						<input type="password" id="pwd-nueva" class="form-control">
						</div>
						<div class="form-group" id="div-confirmacion">
						<label for="pwd-confirmacion">Confirmar Contraseña</label>
						<input type="password" id="pwd-confirmacion" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<p id="prueba"></p>
					<button type="button" id="actulizarContrasena" class="btn btn-default" >Actualizar</button>
					<button  type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">cerrar</button>
				</div>
			</div>

		</div>
	</div>
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/js-basica.js" type="text/javascript" ></script>
	<script src="../js/js-configuracion.js" type="text/javascript"></script>
</body>
</html>
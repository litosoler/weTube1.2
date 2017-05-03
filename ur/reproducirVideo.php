<?php 
// include once
	include_once("../class/class-conexion.php");
//determina se le ha dado click a algun video para reproducirlo
	if (!isset($_GET["video"])){
		header("Location: inicio.php");
	}else{
		echo "<input id='info' tipe='text' class='oculto' value=".$_GET["video"].">";
	}
// determina si hay una sesion iniciada, si no te regresa al inicio de sesion
	session_start();
	if (!array_key_exists("codigoUsuario", $_SESSION)){
		header("Location: iniciarSesion.php");
	}
	if ($_SESSION["codigoTipoUsuario"] != 2){
		header("Location: iniciarSesion.php");
	}
	//inicia una conexion
	$conexion = new Conexion();
	//rellena la info de la cabezera
	$conexion = new Conexion();
	$sql = "SELECT CORREO_ELECTRONICO, USUARIO FROM tbl_usuarios WHERE CODIGO_USUARIO ='".$_SESSION["codigoUsuario"]."';";
	$consulta = $conexion->ejecutar($sql);
	$fila = $conexion->obtenerFila($consulta);
	//obtiene info del video actal
	$sql = "SELECT a.CODIGO_CANAL, NOMBRE_VIDEO, URL_IMG, DURACION_SEGUNDOS, CANTIDAD_LIKES, CANTIDAD_DISLIKES, CANTIDAD_VISUALIZACIONES, FECHA_SUBIDA, RUTA_VIDEO, a.DESCRIPCION, NOMBRE_CANAL
            FROM tbl_videos a
            INNER JOIN tbl_canales b 
            ON(a.CODIGO_CANAL = b.CODIGO_CANAL)
            WHERE CODIGO_VIDEO=".$_GET["video"].";";
     // echo $sql;
    $consulta = $conexion->ejecutar($sql);
    $fila_1 = $conexion->obtenerFila($consulta);
    $fecha_publicacion = explode(" ", $fila_1["FECHA_SUBIDA"])
 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	    <!-- Load player theme -->
	    <link rel="stylesheet" href="../reproductor/themes/maccaco/projekktor.style.css" type="text/css" media="screen" />

	    <!-- Load jquery -->
	    <script type="text/javascript" src="../reproductor/jquery-1.9.1.min.js"></script>

	    <!-- load projekktor -->
	    <script type="text/javascript" src="../reproductor/projekktor-1.3.09.min.js"></script>
		    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Youtube</title>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="../css/css-basica.css">
	    <link rel="stylesheet" type="text/css" href="../css/css-reproducirVideo.css">
	    
	    
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
    			<div class="col-md-8">
    				<div id="player_a" class="projekktor">
    				</div>
    				<div id="info-video" class="seccion">
    					<h3><?php echo $fila_1["NOMBRE_VIDEO"]?></h3>
    					<hr>
    					<a class="btn" href=""><span class="glyphicon glyphicon-plus"></span>Añadir a</a>
    					<a class="btn" href=""><span class="glyphicon glyphicon-share-alt"></span>Compartir</a>
    					<a class="btn" href=""><span class="glyphicon glyphicon-flag"></span>Denunciar</a>
    					<a class="btn" href=""><span class="glyphicon glyphicon-option-horizontal"></span>Compartir</a>
    					<span class="float-right">
    						<a class="btn" href=""><span class="	glyphicon glyphicon-thumbs-up"></span><?php echo $fila_1["CANTIDAD_LIKES"];?></a>
    						<a class="btn" href=""><span class="glyphicon glyphicon-thumbs-down"></span><?php echo $fila_1["CANTIDAD_DISLIKES"];?></a>
    					</span>
    				</div>
    				<div id="compartir-video" class="seccion">
    					<h4>esa seccion es para la opciones de compartir</h4>
     				</div>
    				<div id="info-publicacion" class="seccion">
    					<p>publicado: <?php echo $fecha_publicacion[0];?></p>
    					<p><?php echo $fila_1["DESCRIPCION"];?></p>
    				</div>
    				<div id="comentarios" class="seccion" >
 
						<h6>COMENTARIOS-#</h6>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="email" type="text" class="form-control" placeholder="comentario">
						</div>
						<hr>
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">comentarios principales
					 		<span class="caret"></span></button>
					  		<ul class="dropdown-menu">
					    		<li><a href="#">Comentarios Principales</a></li>
					   			<li><a href="#">Más recientes primero</a></li>
					 		</ul>
						</div>
						<br>
						<!-- comentarios -->
						<?php 
							for ($i=0; $i < 5; $i++) {
							echo "
							<div class='letra-comentario'>
								<img src='../img/icono-usuario2.png' class='col-md-1 img-responsive float-left'> 
								<span>
									Usuario fecha
								</span>
								<br>
								<span>
									aqui va el comentario
								</span>
								<br>
								<span><a>Responder</a> - #<span>
	    							<a class=btn' href='#'><span class='	glyphicon glyphicon-thumbs-up'></span></a>
	    							<a class='btn' href='#'><span class='glyphicon glyphicon-thumbs-down'></span></a>
	    							</span>
								</span>
							</div>";
						}
						?>	
    				</div>
    			</div>
    			<div class="col-md-4
    			" id="lista">
    			<?php
                    $sql = "SELECT CODIGO_VIDEO, a.CODIGO_CANAL, NOMBRE_VIDEO, URL_IMG, DURACION_SEGUNDOS, CANTIDAD_VISUALIZACIONES, FECHA_SUBIDA, RUTA_VIDEO, URL, NOMBRE_CANAL
            FROM tbl_videos a
            INNER JOIN tbl_canales b 
            ON(a.CODIGO_CANAL = b.CODIGO_CANAL);";
           // echo $sql."<br>";
            $consulta= $conexion->ejecutar($sql);
	    			
	    				for ($i=1; $i < 11; $i++) { 
	    				$fila =	 $conexion->obtenerFila($consulta);	
	    				if (!$fila)
	    				break;	 
	    				echo "<div class='row'>
	    					<a href='reproducirVideo.php?video=".$fila["CODIGO_VIDEO"]."'><img src='".$fila["URL_IMG"]."' class='float-left col-md-6 img-responsive'>
							<span class='descripcion col-md-6'>
								<span>".$fila["NOMBRE_VIDEO"]."</span></a>
								<br>
								<span>".$fila["NOMBRE_CANAL"]."</span>
								<br>
								<span>".$fila["CANTIDAD_VISUALIZACIONES"]." visualizaciones</span>
							</span>
						</div>";	
	    				 } 
	    			 ?>
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
  	<script src="../js/js-reproducirvideo.js" type="text/javascript"></script>
  </body>
</html>
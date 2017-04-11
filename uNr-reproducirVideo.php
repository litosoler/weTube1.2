<!DOCTYPE html>
<html lang="es">
  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	    <!-- Load player theme -->
	    <link rel="stylesheet" href="reproductor/themes/maccaco/projekktor.style.css" type="text/css" media="screen" />

	    <!-- Load jquery -->
	    <script type="text/javascript" src="reproductor/jquery-1.9.1.min.js"></script>

	    <!-- load projekktor -->
	    <script type="text/javascript" src="reproductor/projekktor-1.3.09.min.js"></script>
		    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Youtube</title>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="css/css-basica.css">
	    <link rel="stylesheet" type="text/css" href="css/css-reproducirVideo.css">
	    
	    
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
					      <li><a href="#">Tendencias</a></li>
					      <li><a href="#">Historial</a></li>
					      <li class="divider"></li>
					      <li class="dropdown-header">LO MEJOR DE YOUTUBE</li>
					      <li><a href="#">Música</a></li>
					      <li><a href="#">Deportes</a></li>
					      <li><a href="#">Juegos</a></li>
					      <li><a href="#">Noticias</a></li>
					      <li><a href="#">En Directo</a></li>
					      <li><a href="#">Video en 360°</a></li>
					      <li class="divider"></li>
					      <li><a href="#">Explorar Canales</a></li>
					      <li class="divider"></li>
					      <li class="dropdown-header">Inicia sesión para ver tus canales y recomendaciones.</li>
					      <li><a class="btn btn-primary btn-sm" href="ur-iniciarSesion.php">Iniciar Sesión</a></li>
					    </ul>
					    </span>
			          	<a href="uNr-inicio.php"><img class="hidden-sm hidden-xs logo-youtube " src="img/logo-youtube.png"></a>
			          	<a href="uNr-inicio.php"><img id="logo-sm" class="hidden-md hidden-lg" src="img/logo-reproduccion.png"></a>         
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
			            <a class="btn btn-primary hidden-xs"  href="ur-iniciarSesion.php"><span class="glyphicon glyphicon-open"></span></a>
			           	<a class="btn btn-primary" href="ur-iniciarSesion.php"><span class="glyphicon glyphicon-log-in"></span> <span class="hidden-sm hidden-xs" >Iniciar Sesion </span> </a>
			        </div>
			    </div>
		    </div>
	    	<div class="barra2">
	    	</div>	
	    </div>
	    <!-- cuerpo -->
    	<div class="container">
    		<div class="row">
    			<div class="col-md-9">
    				<div>
    					<div class="cuerpo-interno1"><div id="player_a" class="projekktor">
    				</div>
					    <script type="text/javascript">
						    $(document).ready(function() {
						        projekktor('#player_a', {
						        poster: 'reproductor/media/intro.png',
						        width: 848,
						        height: 400,
						        playlist: [
						            {
						            0: {src: "reproductor/media/1.mp4", type: "video/mp4"}
						            },
						            //0: {src: "media/2.mp4", type: "video/mp4"}
						            {
						            0: {src: 'reproductor/media/2.mp4', escriba: 'video/mp4'}
						             },
						             {
						            0: {src: "reproductor/media/3.mp4", type: "video/mp4"}
						            },

						        ]    
						        }, function(player) {} // on ready 
						        );
						    });
						</script>

    					<!--<iframe width="100%" height="480" src="https://www.youtube.com/embed/47fwjM1XKhA" frameborder="0" allowfullscreen></iframe>-->
    				</div>
    				<div id="info-video" class="seccion">
    					<p>Aqui va el nombre del video</p>
    					<hr>
    					<a class="btn" href=""><span class="glyphicon glyphicon-plus"></span>Añadir a</a>
    					<a class="btn" href=""><span class="glyphicon glyphicon-share-alt"></span>Compartir</a>
    					<a class="btn" href=""><span class="glyphicon glyphicon-flag"></span>Denunciar</a>
    					<a class="btn" href=""><span class="glyphicon glyphicon-option-horizontal"></span>Compartir</a>
    					<span class="float-right">
    						<a class="btn" href=""><span class="	glyphicon glyphicon-thumbs-up"></span>#</a>
    						<a class="btn" href=""><span class="glyphicon glyphicon-thumbs-down"></span>#</a>
    					</span>
    				</div>
    				<div id="opciones-video" class="seccion">
    					<h4>esa seccion es para la opciones de compartir</h4>
     				</div>
    				<div id="info-publicacion" class="seccion">
    					esta es la seccion para la informacion de publicaiocn del video
    				</div>
    				<div id="comentarios" class="seccion" >
    					Esta es la seccion de comentarios	
    				</div>
    			</div>
    			<div class="col-md-3">
    				<div id="lista">
    					<?php
    					for ($i=1; $i <= 4; $i++) { 
    						echo "<div class='col-md-12'>";
    						echo "<div class='thumbnail'>";
    						echo "<a href=''><img src ='img/icono$i.jpg' class='img-responsive'>";
    						echo "</div></div>";
    					}
    				?>	
    				</div>
    			</div>
    		</div>
    	</div>
	
 		<!-- pie de pagina -->
 		<div class="barra-inferior">
			
			<ul class="HLista">
	        	<a href="#"><li><img class="logo-youtube" src="img/logo-youtube.png"></li></a>
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
						<img src="img/icono-enfermo.png" class="img-responsive">
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
  	<script src="js/js-basica.js" type="text/javascript" ></script>
  </body>
</html>
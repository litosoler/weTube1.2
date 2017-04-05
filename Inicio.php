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
	    <link rel="stylesheet" type="text/css" href="css/css-basica.css">
	    
	    
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
					      <li><a class="btn btn-primary btn-sm">Iniciar Sesión</a></li>
					    </ul>
					    </span>
			          	<a href="Inicio.php"><img class="hidden-sm hidden-xs logo-youtube " src="img/logo-youtube.png"></a>
			          	<a href="Inicio.php"><img id="logo-sm" class="hidden-md hidden-lg" src="img/logo-reproduccion.png"></a>            
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
			            <a class="btn btn-primary hidden-xs"  href="#"><span class="glyphicon glyphicon-open"></span></a>
			           	<a class="btn btn-primary" href="iniciarSesion.html"><span class="glyphicon glyphicon-log-in"></span> <span class="hidden-sm hidden-xs" >Iniciar Sesion </span> </a>
			        </div>
			    </div>
		    </div>
	    	<div class="barra2">
	    	</div>	
	    </div>
	    <!-- cuerpo -->
    	<div class="container ">
    		<div class="row">
    			<div class="col-md-12 segmentos">
    					<?php
    					$contador = 0;
    					for ($i=1; $i <= 4; $i++) { 
    						echo "<div class='col-md-2'>";
    						echo "<div class='thumbnail'>";
    						echo "<a href=''><img src ='img/icono$i.jpg' class='img-responsive'>";
    						echo "</div></div>";

    						if ($i==2) {
    							if ($contador != 1) 
    							$i=0;
    							$contador++;
    						}
    					}
    					?>	
    			</div>
    			<hr>
    			<div class="col-md-12 segmentos">
    					<?php
    					$contador = 0;
    					for ($i=1; $i <= 4; $i++) { 
    						echo "<div class='col-md-2'>";
    						echo "<div class='thumbnail'>";
    						echo "<a href=''><img src ='img/icono$i.jpg' class='img-responsive'>";
    						echo "</div></div>";

    						if ($i==2) {
    							if ($contador != 1) 
    							$i=0;
    							$contador++;
    						}
    					}
    					?>	
    			</div>
    			<hr>
    			<div class="col-md-12 segmentos">
    					<?php
    					$contador = 0;
    					for ($i=1; $i <= 4; $i++) { 
    						echo "<div class='col-md-2'>";
    						echo "<div class='thumbnail'>";
    						echo "<a href=''><img src ='img/icono$i.jpg' class='img-responsive'>";
    						echo "</div></div>";

    						if ($i==2) {
    							if ($contador != 1) 
    							$i=0;
    							$contador++;
    						}
    					}
    					?>	
    			</div>
    			<hr>
    			<div class="col-md-12 segmentos">
    					<?php
    					$contador = 0;
    					for ($i=1; $i <= 4; $i++) { 
    						echo "<div class='col-md-2'>";
    						echo "<div class='thumbnail'>";
    						echo "<a href=''><img src ='img/icono$i.jpg' class='img-responsive'>";
    						echo "</div></div>";

    						if ($i==2) {
    							if ($contador != 1) 
    							$i=0;
    							$contador++;
    						}
    					}
    					?>	
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
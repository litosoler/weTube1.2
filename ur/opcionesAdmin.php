<?php	
	/*determina si hay una sesion iniciada, si no te regresa al inicio de sesion*/
	session_start();
	if (!array_key_exists("codigoUsuario", $_SESSION)){
		header("Location: iniciarSesion.php");
	}
	if ($_SESSION["codigoTipoUsuario"] != 3){
		header("Location: iniciarSesion.php");
	}
	echo "codigo usuario: ".$_SESSION["codigoUsuario"]."<br>tipo usuario: ".$_SESSION["codigoTipoUsuario"];
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
	    <link rel="stylesheet" type="text/css" href="../css/css-opcionesAdmin.css">
	    
	    
  </head>
  <body>
    	<!-- encabezado -->
		    <div class="container-fluid barra-superior">
			    <div class="row">
			        <div class=" col-xs-4 col-sm-2 col-md-2">
				   		<a href="opcionesAdmin.php" style="padding-left: 20px;"><img class="hidden-sm hidden-xs logo-youtube " src="../img/logo-youtube.png"></a>
			          	<a href="opcionesAdmin.php"><img id="logo-sm" class="hidden-md hidden-lg" src="../img/logo-reproduccion.png"></a>         
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
						       <li>Nombre Usuario</li>
						       <li class="divider"></li>
						       <li><button id="cerrarSesion" class="btn btn-primary form-control" >Cerrar Sesión</button></li>
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
			        </div>
			    </div>
		    </div>
	    	<div class="barra2">
	    	</div>	
	    </div>
	    <!-- cuerpo -->
    	<div class="container">
    	
    		<div class="row">
    			<div class="col-md-5 ">
	    			<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Usuario/Canal</h3>
		    				<br>
		    				<div class="btn-large">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#quitar-usuario">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    		
	    		<div class="col-md-offset-2 col-md-5 ">
	        		<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Video/Playlist</h3>
		    				<br>
		    				<div class="btn-large">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#quitar-video">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	        	</div>
        	</div>
        	<div class="row">
	    		<div class="col-md-5 ">
		    		<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Categorias</h3>
		    				<br>
		    				<div class="btn-group">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#categoria-añadir">AÑADIR</button>
		    				<button class="btn btn-default" data-toggle="modal" data-target="#categoria-quitar">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    		<div class="col-md-offset-2 col-md-5 ">
	    			<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Reportes</h3>
		    				<br>
		    				<div class="btn-group">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#reporte-añadir">VER</button>
		    				<button class="btn btn-default" data-toggle="modal" data-target="#reporte-quitar">QUITAR</button>
		    				</div>
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
		       <a data-toggle="modal" data-target="#enProceso"><li>Información</li></a>
		       <a data-toggle="modal" data-target="#enProceso"><li>Prensa</li></a>
		       <a data-toggle="modal" data-target="#enProceso"><li>Derechos de autor</li></a>
		       <a data-toggle="modal" data-target="#enProceso"><li>Creadores</li></a> 
		       <a data-toggle="modal" data-target="#enProceso"><li>Publicidad</li></a>
		       <a data-toggle="modal" data-target="#enProceso"><li>Desarrolladores</li></a>
		       <a data-toggle="modal" data-target="#enProceso"><li>+Youtube</li></a>               
	        </ul>
		  	<ul class="HLista3 hidden-xs hidden-sm">
		        <a data-toggle="modal" data-target="#enProceso"><li>Términos</li></a>
		        <a data-toggle="modal" data-target="#enProceso"><li>Privacidad</li></a>
		        <a data-toggle="modal" data-target="#enProceso"><li>Politica y seguridad</li></a>
		        <a data-toggle="modal" data-target="#enProceso"><li>Enviar sugerencias</li></a> 
		        <a data-toggle="modal" data-target="#enProceso"><li>Probar las nuevas funciones</li></a>
		        <li>© 2017 YouTube, LLC </li>   
	      	</ul>
		</div>
		<!-- ventanas modales -->
		<!--Estamos trabajando en esta funcionalidad  -->
		<div id="enProceso" class="modal fade" role="dialog">
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
		<!-- formulario quitar usuario/canal -->
		<div id="quitar-usuario" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Eliminar Usuario/Canal</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="opcion">Elimar:</label>
									<select id="opcion" class="form-control">
										<option>Quiero eliminar un...</option>
										<option>Usuario</option>
										<option>canal</option>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre">Nombre del Usuario/Canal:</label>
									<input type="text" id="nombre" class="form-control">
								</div>
								<div class="form-group">
									<label for="correo">Correo electronico asociado.</label>
									<input type="text" id="correo" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-default">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- formulario quitar video/playlist -->
		<div id="quitar-video" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Eliminar Video/Playlist</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="opcion">Elimar:</label>
									<select id="opcion" class="form-control">
										<option>Quiero eliminar un...</option>
										<option>Video</option>
										<option>Playlist</option>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre">url del Video/Playlist:</label>
									<input type="text" id="nombre" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-default">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- administrar categorias -->
		<!-- añadir -->
		<div id="categoria-añadir" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Añadir Categoria</h3>
							<div class="form-group">
								<div class="form-group" id="div-ctg-anadir-id">
									<label for="nombre-categoria">id:</label>
									<input type="text" id="anadir-ctg-id" class="form-control">
								</div>
								<div class="form-group" id="div-ctg-anadir-desc">
									<label for="nombre-categoria2">Descripcion:</label>
									<input type="text" id="anadir-ctg-desc" class="form-control">
								</div>
								<div class="form-group">
									<p id="prueba"></p>
									<button id="guardar-categoria" class="btn btn-default">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- quitar -->
		<div id="categoria-quitar" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Quitar Categoria</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="nombre-quitarCategoria">Nombre de la categoria:</label>
									<select id="nombre-quitarCategoria" class="form-control">
											<option>---escoga una categoria---</option>
											<?php  
												for ($i=0; $i < sizeof($listaCategorias); $i++) { 
													echo "<option>".$listaCategorias[$i]."</option>";
												}
											?>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre-quitarCategoria2">Confirmar categoria:</label>
									<select id="nombre-quitarCategoria2" class="form-control">
										<option>---confirme la categoria---</option>
										<?php  
												for ($i=0; $i < sizeof($listaCategorias); $i++) { 
													echo "<option>".$listaCategorias[$i]."</option>";
												}
											?>
									</select>
								</div>
								<div class="form-group">
									<button class="btn btn-default">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- administrar reportes -->
		<!-- añadri -->
		<div id="reporte-añadir" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Aqui Mostraremos los reportes</h3>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- quitar -->
		<div id="reporte-quitar" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Eliminar Reportes</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="nombre-quitarReporte">Reporte:</label>
									<select id="nombre-quitarRerporte" class="form-control">
											<option>---numero---</option>
											<?php  
												for ($i=0; $i < sizeof($listaCategorias); $i++) { 
													echo "<option>Reporte #: $i </option>";
												}
											?>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre-quitarRerporte2">Reporte escogido:</label>
									<textarea  id="nombre-quitarRerporte2"  class="form-control" disabled="true" rows="5">Aqui se mostraran el reporte seleccionado Aqui se mostraran el reporte seleccionado Aqui se mostraran el reporte seleccionado Aqui se mostraran el reporte seleccionado
									</textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-default">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="../js/js-basica.js" type="text/javascript" ></script>
  	<script src="../js/js-opcionesAdmin.js" type="text/javascript"></script>
  </body>
</html>
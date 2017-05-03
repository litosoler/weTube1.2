<?php 
include_once("../class/class-conexion.php");

	$conexion = new Conexion();
	$mostrarVideo = $conexion->ejecutar(
			 	'SELECT CODIGO_VIDEO, NOMBRE_VIDEO, URL_IMG, CANTIDAD_VISUALIZACIONES
				FROM tbl_videos;'
				);

		while($mostrar =$conexion->obtenerFila($mostrarVideo)){
	?>		
			<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 card-container">
			 <div class="card-profile">
			 <!--Este boton redireccionara a la piagan de video donde mostrar el nombre del video, el canal,numero de vizualizaciones, cantidad de links, codigo del canal, fecha desubida-->
			 <button type="button" class="btn btn-primary btn-xs" style="position:absolute;"
			title="usuario" onclick="seleccionarUsuario(<?php echo $mostrar["codigo_usuario"];  ?>,<?php echo $mostrar["nombre_usuario"];  ?>;">
			 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			 </button>
			 <img src="<?php echo $mostrar["URL_IMG"];  ?>" class="img-responsive">
			 <span class="profile-name"><?php echo $mostrar["NOMBRE_VIDEO"];  ?></span>
			 <span class="profile-name"><?php echo $mostrar["CANTIDAD_VISUALIZACIONES"];  ?></span>
			 <span class="profile-name"><?php echo $mostrar["CODIGO_CANAL"];  ?></span>
			 </div>
			</div>
<?php
	}
?>
<?php
	include_once("../class/class-conexion.php");
	$conexion = new Conexion();
	$infoVideos= $conexion->ejecutar(
		'SELECT nombre_usuario, url_imagen_perfil
		FROM tbl_usuarios;'
		);

		while($info =$conexion->obtenerFila($infoVideos)){
?>
		       <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2  card-container">
                 <div class="card-profile">
                  <img src="<?php echo $info["url_imagen_perfil"];  ?>"class="img-responsive">
                   <span class="profile-name"><?php echo $info["nombre_usuario"]; ?></span>  
                 </div>
               </div>
<?php
		}
		
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

//Conectar la base de datos
$conexion = new Conexion();


switch ($_GET["opcion"]) {
	//guarda un video
	case 1:
		$sql = sprintf("INSERT INTO tbl_videos(CODIGO_USUARIO, CODIGO_ESTADO_VIDEO, CODIGO_IDIOMA, CODIGO_CANAL, NOMBRE_VIDEO, URL_IMG, DURACION_SEGUNDOS, CANTIDAD_LIKES, CANTIDAD_DISLIKES, CANTIDAD_VISUALIZACIONES, FECHA_SUBIDA, RUTA_VIDEO, DESCRIPCION, CANTIDAD_SHARES) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
			$conexion->getEnlace()->real_escape_string(stripslashes($_SESSION["codigoUsuario"])),
			1,
			$conexion->getEnlace()->real_escape_string(stripslashes($_POST["codigoIdioma"])),
			$conexion->getEnlace()->real_escape_string(stripslashes($_SESSION["CODIGO_CANAL"])),
			$conexion->getEnlace()->real_escape_string(stripslashes($_POST["nombre_video"])),
			$conexion->getEnlace()->real_escape_string(stripslashes($_POST["destino_img"])),
			$conexion->getEnlace()->real_escape_string(stripslashes($_POST["duracion"])),
			0,
			0,
			0,
			date("Y-m-d"),
			$conexion->getEnlace()->real_escape_string(stripslashes($_POST["destino_video"])),
			$conexion->getEnlace()->real_escape_string(stripslashes($_POST["descripcion"])),
			0);
			$consulta = $conexion->ejecutar($sql);
			$resultadoInsert = $conexion->ejecutar($sql);
				$resultado=array();
				if ($consulta === TRUE) {
					$resultado["codigo"]=1;
					$resultado["mensaje"]="Exito, el  registro fue almacenado";
				} else {
					$resultado["codigo"]=0;
					$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
				}
			echo json_encode($resultado);
	break;
	//Elimina un video de la carpeta contenedora en el proyecto
	case 2:
		$resultado= array();
		unlink($_POST["destino_video"]);
		unlink($_POST["destino_img"]);
		$resultado["codigo"]= 1;
		echo json_encode($resultado);
	break;
	//regresa la url del video a reproducir
	case 3:
		$sql="SELECT URL_IMG ,RUTA_VIDEO FROM tbl_videos WHERE CODIGO_VIDEO=".$_POST["codigo"].";";
		$consulta = $conexion->ejecutar($sql);
		$fila = $conexion->obtenerFila($consulta);
		echo json_encode($fila);
		// echo $sql;
		break;
	default:
		# code...
		break;
}

$conexion->cerrarConexion();
?>
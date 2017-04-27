<?php 
	include_once("../class/class-conexion.php");
	include_once("../class/class-usuario.php");
	session_start();
	$conexion = new Conexion();

	switch ($_GET["opcion"]) {
		case 1:
			$sql= sprinTf("INSERT INTO tbl_clasificaciones(CODIGO_CLASIFICACION, NOMBRE_CLASIFICACION) VALUES ('%s','%s');",
				$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["id"])),
				$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["descripcion"]))
				);
			$consulta = $conexion->ejecutar($sql);
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
		case 2:
				$sql = "SELECT CODIGO_PAIS, CODIGO_TIPO_USUARIO, CODIGO_ESTADO_USUARIO, NOMBRE, APELLIDO, CORREO_ELECTRONICO, PASSWORD, FOTOGRAFIA, USUARIO, SEXO, FECHA_NACIMIENTO, FECHA_REGISTRO, TELEFONO FROM tbl_usuarios WHERE CODIGO_USUARIO=".$_SESSION["codigoUsuario"].";";
				$consulta = $conexion->ejecutar($sql);
				$fila= $conexion->obtenerFila($consulta);
				echo json_encode($fila);
			break;
		default:
			# code...
			break;
	}

	$conexion->cerrarConexion();
 ?>
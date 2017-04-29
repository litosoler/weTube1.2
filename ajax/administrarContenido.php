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
	case 3:
		$sql = "SELECT PASSWORD FROM tbl_usuarios WHERE CODIGO_USUARIO=".$_SESSION["codigoUsuario"].";";
		$consulta = $conexion->ejecutar($sql);
		$fila = $conexion->obtenerFila($consulta);
		$resultado = array();
		if($fila["PASSWORD"] == $_POST["pwd-actual"]){
			$sql= sprintf("UPDATE tbl_usuarios SET PASSWORD= '%s' WHERE CODIGO_USUARIO = '%s';",
				$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["pwd-nueva"])),	
				$_SESSION["codigoUsuario"]);
			$consulta = $conexion->ejecutar($sql);
			if ($consulta === TRUE) {
				$resultado["codigo"]=1;
				$resultado["mensaje"]="Exito, el  registro fue actualizado";
			}else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
			}
		}else{
			$resultado["codigo"]=0;
			$resultado["mensaje"]="La contraseña actual no coincide con la que esta en nuestros registros";
			
		}
		echo json_encode($resultado);
		break;
	case 4:
		$sql =  sprintf("UPDATE tbl_usuarios SET CODIGO_PAIS='%s', NOMBRE='%s',APELLIDO='%s',CORREO_ELECTRONICO='%s',USUARIO='%s',FECHA_NACIMIENTO='%s',TELEFONO='%s' WHERE CODIGO_USUARIO='%s';",
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["codigoPais"])),	
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["nombre"])),	
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["apellido"])),	
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["email"])),	
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["usuario"])),	
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["fechaNacimiento"])),	
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["telefono"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_SESSION["codigoUsuario"]))
			);
		$consulta = $conexion->ejecutar($sql);
		$resultado = array();
		if ($consulta === TRUE) {
			$resultado["codigo"]=1;
			$resultado["mensaje"]="Exito, el  registro fue actualizado";
		}else {
			$resultado["codigo"]=0;
			$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
		}
		echo json_encode($resultado);
		break;
	case 5:
		$sql = "SELECT CODIGO_PAIS, CODIGO_TIPO_USUARIO, CODIGO_ESTADO_USUARIO, NOMBRE, APELLIDO, CORREO_ELECTRONICO, PASSWORD, FOTOGRAFIA, USUARIO, SEXO, FECHA_NACIMIENTO, FECHA_REGISTRO, TELEFONO FROM tbl_usuarios WHERE CODIGO_USUARIO=".$_SESSION["codigoUsuario"].";";
		$consulta = $conexion->ejecutar($sql);
		$fila= $conexion->obtenerFila($consulta);
		$respuesta = array();
		$codigo = $_SESSION["CODIGO_CANAL"];

		if($codigo == -1){
			$respuesta["codigo"] = 0;
			$respuesta["nombre"] = $fila["NOMBRE"];
			$respuesta["apellido"] = $fila["APELLIDO"];
		}else{
			$respuesta["codigo"]=1;	
		}
		echo json_encode($respuesta);
		break;
	default:
			# code...
	break;
}
$conexion->cerrarConexion();
?>
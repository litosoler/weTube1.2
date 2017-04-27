<?php	
	include_once("../class/class-conexion.php");
	include_once("../class/class-usuario.php");
	session_start();
	$conexion = new Conexion();

	switch ($_GET["codigo"]) {
		case 1:
		$sql ="SELECT CODIGO_AREA FROM tbl_paises WHERE CODIGO_PAIS ='".$_POST["CODIGO_PAIS"]."';";
		$consulta = $conexion->ejecutar($sql);

		$fila = $conexion->obtenerFila($consulta);
		echo $fila["CODIGO_AREA"];
		break;
		//logica para guardar registro
		case 2:
		$usuario = new Usuario(
			$_POST["codigoPais"],
			2,
			1,
			$_POST["nombre"],
			$_POST["apellido"],
			$_POST["nombre"].".".$_POST["apellido"],
			$_POST["email"],
			$_POST["pwd"], 
			"",    
			$_POST["genero"],
			$_POST["fechaNacimiento"],  
			date("Y-m-d"),
			$_POST["telefono"]
			);
		$usuario->guardarRegistro($conexion);

		break;
		case 3:
		$sql = "SELECT CODIGO_USUARIO, CODIGO_TIPO_USUARIO, PASSWORD FROM tbl_usuarios WHERE CORREO_ELECTRONICO ='".$_POST["correo"]."';";
		$consulta = $conexion->ejecutar($sql);
		$fila = $conexion->obtenerFila($consulta);

		if (isset($fila)) {
			if ($fila["PASSWORD"] == $_POST["pwd"]){
				if($fila["CODIGO_TIPO_USUARIO"]==2){
				$resultado["codigo"]=1;
				$resultado["mensaje"]="exitos";
				$_SESSION["codigoUsuario"] = $fila["CODIGO_USUARIO"];
				$_SESSION["codigoTipoUsuario"] = $fila["CODIGO_TIPO_USUARIO"];
				}else if ($fila["CODIGO_TIPO_USUARIO"]==3) {
				$resultado["codigo"]=2;
				$resultado["mensaje"]="exitos";
				$_SESSION["codigoUsuario"] = $fila["CODIGO_USUARIO"];
				$_SESSION["codigoTipoUsuario"] = $fila["CODIGO_TIPO_USUARIO"];
				}
			} else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Las Contraseñas no coinsiden";
			}
		}else{
			$resultado["codigo"]=0;
			$resultado["mensaje"]="El correo no esta registrado en nuestro sitio.";
		}
		echo json_encode($resultado);
		break;
		case 4:
			session_unset();
			break;
		default:
			# code...
			break;
	}


	$conexion->cerrarConexion();
	
?>
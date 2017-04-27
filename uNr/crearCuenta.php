<?php  
include_once("../class/class-conexion.php");

$conexion = new Conexion();
$sql ="SELECT CODIGO_PAIS, NOMBRE_PAIS, CODIGO_AREA FROM tbl_paises;";
$consulta = $conexion->ejecutar($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/css-crearCuenta.css">
	
</head>

<body>
	<div class="container-fluid" id= "encabezado"">
		<a href="uNr/inicio.php"><img src="../img/logo-youtube.png" id="img-1"></a>
		<a href="../ur/iniciarSesion.php" class="btn btn-primary" id="btn-1" role="button">Acceder</a>
	</div>

	<h1 id="titulo" class="container-fluid"> Crea tu cuenta en Wetube </h1> 

	<div class="container">

		<div class="row">

			<img src="../img/registro.png" id="img-registro" class="col-md-6 hidden-xs hidden-sm">

			<div class="form-group col-xs-12 col-sm-12 col-md-6">

				<div  class="form-group">
					<label for="">Nombre:</label>
					<p  class="form-group">
						<input id="nombre" type="text" class="col-md-6 input" placeholder="Nombre">
						<input id="apellido" type="text" class="col-sm-6 input" placeholder="Apellido">
					</p>
				</div>
				<div id="div-email" class="form-group">
					<label for="email">Correo Electronico:</label>
					<input type="email" class="form-control" id="email">
				</div>
				<span class="help-block" ><a href="#" hidden="hidden">Me gustaría tener una nueva dirección de Gmail</a></span>

				<div id="div-pwd" class="form-group">
					<label for="pwd">Crea tu contraseña:</label>
					<input type="password" class="form-control" id="pwd">
				</div>

				<div id="div-pwd2" class="form-group">
					<label for="pwd2">Confirmar la contraseña:</label>
					<input type="password" class="form-control" id="pwd2">
				</div>
				<div  class="form-group">
					<label for="">Fecha de Nacimiento:</label>
					<p  class="form-group">
						<input id="dia" type="number" class="col-md-2 input" placeholder="dia">
						<select id="mes" class="input col-md-6">
							<option value="0">mes</option>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
						<input id="año" type="number" class="col-sm-4 input" placeholder="año">
					</p>
				</div>
				<div id="div-genero" class="form-group">
					<label for="genero">Genero:</label>
					<select class="form-control" id="genero">
						<option value="0" >Soy....</option>
						<option value="hombre" >Hombre</option>
						<option value="mujer" >Mujer</option>
						<option value="otro" >Otro</option>
					</select>
				</div>
				<div id="div-ubicacion" class="form-group">
					<label for='ubicacion'>Ubicación:</label>
					<select class='form-control' id='ubicacion'>
						<option value='0'>---Secliona un Pais---</option>
						<?php 
						while($fila = $conexion->obtenerFila($consulta)){
							echo "<option value='".$fila["CODIGO_PAIS"]."'>".$fila["NOMBRE_PAIS"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
						}
						?>
					</select>
				</div>
				<div  class="form-group">
					<label for="">Telefono:</label>
					<p id="div-telefono" class="form-group">
						<input id="codigo-area" type="text" class="col-md-2 input" disabled="disabled">
						<input id="numero" type="text" required placeholder="solo numeros y espacios"  class="col-sm-10 input">
					</p>
				</div>
				<div id='p'></div>
				<div>
					<button id="btn-siguiente" class="btn btn-primary  btn-2" > Siguiente </button> 
				</div>
			</div>

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/crearCuenta.js"> </script>
	
</body>
</html>
<?php
$conexion->cerrarConexion();
?>
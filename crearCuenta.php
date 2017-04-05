<!DOCTYPE html>
<html lang="es">
	<head>
		 
		  <title>Registro</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <link rel="stylesheet" type="text/css" href="css/pagina-crearCuenta.css">
	
	</head>

	<body>
		<div class="container-fluid" id= "encabezado"">
			<a href="Inicio.php"><img src="img/logo-youtube.png" id="img-1"></a>
			<a href="iniciarSesion.html" class="btn btn-primary" id="btn-1" role="button">Acceder</a>
		</div>

		 <h1 id="titulo" class="container-fluid"> Crea tu cuenta en Wetube </h1> 

		 <div class="container">

		 	<div class="row">

			 <img src="img/registro.png" id="img-registro" class="col-md-6 hidden-xs hidden-sm">

			 <div class="form-group col-xs-12 col-sm-12 col-md-6">
			 		
			 					<div class="form-group">
								  <label for="usr">Nombre:</label>
								  <input type="text" class="form-control" id="usr">
								</div>

			 					
			 				
			 					<div class="form-group">
								    <label for="email">Correo Electronico:</label>
								    <input type="email" class="form-control" id="email">
								</div>
								<span class="help-block"><a href="#">Me gustaría tener una nueva dirección de Gmail</a></span>
			 				
					 			<div class="form-group">
									  <label for="pwd">Crea tu contraseña:</label>
									  <input type="password" class="form-control" id="pwd">
								</div>
			 				
			 					<div class="form-group">
									  <label for="pwd-2">Confirmar la contraseña:</label>
									  <input type="password" class="form-control" id="pwd-2">
								</div>
			 					<div class="form-group">
			 					 <label for="fecha">Fecha de Nacimiento:</label>
			 					<input type="date" name="fecha" class="form-control" >
			 					<span class="text-danger"> No puedes dejar este campo en blanco</span>
			 					</div>
			 					<div class="form-group">
									  <label for="genero">Genero:</label>
									 <select class="form-control" id="genero">
									 	<option>Soy....</option>
									    <option>Hombre</option>
									    <option>Mujer</option>
									    <option>Otro</option>
									    <option>Prefiero no decir</option>
								  </select>
								 </div>
				 				
			 					<div class="form-group">
			 					 <label for="telefono">Teléfono celular:</label>
			 					 <button class="btn btn-info "></button>
			 					<input type="phone" name="telefono" class="form-control" value="+504" >
			 					</div>
			 				
								<label for="ubicacion">Ubicación:</label>
								<select class="form-control" id="ubicacion">
									 	<option>Soy de..</option>
									    <option>Honduras</option>
									    <option>Guatemala</option>
									    <option>El Salvador</option>
									    <option>Prefiero no decir</option>
								</select>

						
				 			
				 					 <input type="submit" name="siguiente" class="btn btn-primary  btn-2" value="siguiente">
				 				
			 </div>

		     </div>
		 </div>

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</body>
</html>
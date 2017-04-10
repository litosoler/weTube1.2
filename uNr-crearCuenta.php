<!DOCTYPE html>
<html lang="es">
	<head>
		 
		  <title>Registro</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <link rel="stylesheet" type="text/css" href="css/css-crearCuenta.css">
	
	</head>

	<body>
		<div class="container-fluid" id= "encabezado"">
			<a href=""><img src="img/logo-youtube.png" id="img-1"></a>
			<a href="ur-iniciarSesion.php" class="btn btn-primary" id="btn-1" role="button">Acceder</a>
		</div>

		 <h1 id="titulo" class="container-fluid"> Crea tu cuenta en Wetube </h1> 

		 <div class="container">

		 	<div class="row">

			 <img src="img/registro.png" id="img-registro" class="col-md-6 hidden-xs hidden-sm">

			 <div class="form-group col-xs-12 col-sm-12 col-md-6">
			 		
			 					<div id="div-usr" class="form-group">
								  <label for="usr">Nombre:</label>
								  <input type="text" class="form-control" id="usr">
								</div>

			 					
			 				
			 					<div id="div-email" class="form-group">
								    <label for="email">Correo Electronico:</label>
								    <input type="email" class="form-control" id="email">
								</div>
								<span class="help-block"><a href="#">Me gustaría tener una nueva dirección de Gmail</a></span>
			 				
					 			<div id="div-pwd" class="form-group">
									  <label for="pwd">Crea tu contraseña:</label>
									  <input type="password" class="form-control" id="pwd">
								</div>
			 				
			 					<div id="div-pwd2" class="form-group">
									  <label for="pwd2">Confirmar la contraseña:</label>
									  <input type="password" class="form-control" id="pwd2">
								</div>
			 					<div class="form-group">
			 					 <label for="fecha">Fecha de Nacimiento:</label>
			 					<input type="date" id="fecha" class="form-control" >
			 					<span class="text-danger"> No puedes dejar este campo en blanco</span>
			 					</div>
			 					<div class="form-group">
									  <label for="genero">Genero:</label>
									 <select class="form-control" id="genero">
									 	<option value="" >Soy....</option>
									    <option value="1" >Hombre</option>
									    <option value="2" >Mujer</option>
									    <option value="3" >Otro</option>
									    <option value="4" >Prefiero no decir</option>
								  </select>
								 </div>
				 				
			 					<div id="div-telefono" class="form-group">
			 					 <label for="telefono">Teléfono celular:</label>
			 					 <button class="btn btn-info "></button>
			 					<input type="phone" id="telefono" class="form-control" value="" placeholder="+504" >
			 					</div>
			 					
								<label for="ubicacion">Ubicación:</label>
								<select class="form-control" id="ubicacion">
									 	<option selected="selected" value="" >Soy de..</option>
									    <option value="1" >Honduras</option>
									    <option value="2" >Guatemala</option>
									    <option value="3" >El Salvador</option>
									    <option value="4" >Prefiero no decir</option>
								</select>

						
				 			
				 					 <button id="btn-siguiente" class="btn btn-primary  btn-2" > Siguiente </button> 
				 				
			 </div>

		     </div>
		 </div>

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <script src="js/crearCuenta.js"> </script>
		  
	</body>
</html>
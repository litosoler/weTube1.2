<!DOCTYPE html>

<html lang="es">
	<head>
		 <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/css-iniciarSesion.css">
  		<title>WeTube</title>
  	</head>
	<body>
  		<div class="CPrincipal">
  			<div class="CCabezera">
				<div class="logo" aria-label="WeTube"></div>
			</div>
			<div class="CContenido">
				<div class="banner">
				<h1>Una Cuenta para Todos</h1>
				<h2>Acceder a WeTube para continuar.</h2>
  				</div>
  			</div>
  			<div class="FormLogin" >
  				<div>
  					<img id="user_img" class="user_img" src="img/icono-usuario.png">
  					<form action="" method="post">
  						<input type="text" name="correo" placeholder="Ingrese su correo" class="form-control" required="required">
  						<input type="password" name="password" placeholder="Ingrese su contraseña" class="form-control" required="required">
  						<input type="submit" name="submit" value="Siguiente" class="btn btn-primary">
  					</form>
            <p ><a class="link" href="uNr-crearCuenta.php">Crear una Cuenta</a></p>
  				</div>
  			</div>

		</div>

				<div class="CPieBarra">
              <ul class="HLista">
                <a data-toggle="modal" data-target="#myModal"><li>Acerca de WeTube</li></a>
                <a data-toggle="modal" data-target="#myModal"><li>Privacidad</li></a>
                <a data-toggle="modal" data-target="#myModal"><li>Condiciones</li></a>
                <a data-toggle="modal" data-target="#myModal"><li>Ayuda</li></a>               
              </ul>
        </div>
        <!-- ventana modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Lo sentimos, estamos trabajando en esta Funcionalidad.</h3>
					</div>
					<div class="modal-body">
						<img src="img/icono-enfermo.png" class="img-responsive">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
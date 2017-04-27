<?php

	class Usuario{

		private $codigoPais;
		private $tipoUsuaio;
		private $estadoUsuario;
		private $nombre;
		private $apellido;
		private $usuario;
		private $correo;
		private $contrasena;
		private $urlFoto;
		private $sexo;
		private $fechaNacimiento;
		private $fechaRegistro;
		private $telefono;
		public $mensaje;

		public function __construct(
					$Pais,
					$tipoUsuaio,
					$estadoUsuario,
					$nombre,
					$apellido,
					$usuario,
					$correo,
					$contrasena,
					$urlFoto,
					$sexo,
					$fechaNacimiento,
					$fechaRegistro,
					$telefono){
			$this->codigoPais = $Pais;
			$this->tipoUsuaio = $tipoUsuaio;
			$this->estadoUsuario = $estadoUsuario;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->usuario = $usuario;
			$this->correo = $correo;
			$this->contrasena = $contrasena;
			$this->urlFoto = $urlFoto;
			$this->sexo = $sexo;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->fechaRegistro = $fechaRegistro;
			$this->telefono	 = $telefono;
			$this->mensaje = "bien echo";
		}

		public function guardarRegistro($conexion){
			$sql = sprintf("INSERT INTO tbl_usuarios(CODIGO_PAIS, CODIGO_TIPO_USUARIO, CODIGO_ESTADO_USUARIO, NOMBRE, APELLIDO, USUARIO, CORREO_ELECTRONICO, PASSWORD, SEXO, FECHA_NACIMIENTO, FECHA_REGISTRO, TELEFONO) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->codigoPais)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->tipoUsuaio)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->estadoUsuario)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->nombre)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->apellido)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->usuario)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->correo)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->contrasena)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->sexo)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->fechaNacimiento)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->fechaRegistro)),
				$conexion->getEnlace()->real_escape_string(stripslashes( $this->telefono))
				);
			$resultadoInsert = $conexion->ejecutar($sql);
			$resultado=array();
			if ($resultadoInsert === TRUE) {
				$resultado["codigo"]=1;
				$resultado["mensaje"]="Exito, el  registro fue almacenado";
			} else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
			}
			echo json_encode($resultado);
		}

		public function getCodigoLugar(){
			return $this->codigoLugar;
		}
		public function setCodigoLugar($codigoLugar){
			$this->codigoLugar = $codigoLugar;
		}
		public function getPais(){
			return $this->Pais;
		}
		public function setPais($Pais){
			$this->Pais = $Pais;
		}
		public function getTipoUsuaio(){
			return $this->tipoUsuaio;
		}
		public function setTipoUsuaio($tipoUsuaio){
			$this->tipoUsuaio = $tipoUsuaio;
		}
		public function getEstadoUsuario(){
			return $this->estadoUsuario;
		}
		public function setEstadoUsuario($estadoUsuario){
			$this->estadoUsuario = $estadoUsuario;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getUrlFoto(){
			return $this->urlFoto;
		}
		public function setUrlFoto($urlFoto){
			$this->urlFoto = $urlFoto;
		}
		public function getSexo(){
			return $this->sexo;
		}
		public function setSexo($sexo){
			$this->sexo = $sexo;
		}
		public function getFechaNacimiento(){
			return $this->fechaNacimiento;
		}
		public function setFechaNacimiento($fechaNacimiento){
			$this->fechaNacimiento = $fechaNacimiento;
		}
		public function getFechaRegistro(){
			return $this->fechaRegistro;
		}
		public function setFechaRegistro($fechaRegistro){
			$this->fechaRegistro = $fechaRegistro;
		}
		public function getTelefono	(){
			return $this->telefono	;
		}
		public function setTelefono	($telefono	){
			$this->telefono	 = $telefono	;
		}

	}
?>
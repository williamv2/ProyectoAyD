<?php

class conexion{

	private $conexion;
	private $host_db = "localhost";
	private $user_db = "root";
	private $pass_db = "";
	private $db_master = "jornadas_deportivas";
	private $tbl_name = "usuario";
	private $usuario;
	private $clave;
	public static $_singleton;//variable estatica para realizar llamados fuera de la clase



	public function __construct(){

		$this->conexion = new mysqli($this->host_db, $this->user_db, $this->pass_db, $this->db_master);

		if($this->conexion->connect_errno){

			die ("fallo en tratar de conectar con MYSQL: (". $this->conexion->connect_errno.")");
		}

	}

	/** EVITA QUE SE REALICE MAS DE UNA CONEXION**/

	public static function getInstance()
	{
		if (is_null (self::$_singleton))
		{
			self::$_singleton = new conexion;
		}
		return self::$_singleton;
	}

	/**FUNCION PARA COMPROBAR SI HAY O NO CONEXION CON LA BASE DE DATOS**/
		
	public function isConexion(){
		if($this->conexion)
			return true;
		return false;
	}

	public function cerrar(){

		$this->conexion->close();
	}


	public function login($user,$pass){

		$this->usuario = $user;
		$this->clave = $pass;

		$query = "SELECT * FROM usuario INNER JOIN deportista ON deportista.codigo = usuario.codigo WHERE usuario.codigo ='".$this->usuario."'AND usuario.clave ='".$this->clave."'";

		$consulta= $this->conexion->query($query);



		if($row = mysqli_fetch_array($consulta)){

			session_start();
			$_SESSION['user']= $row['codigo'];
			$_SESSION['pass']= $row['clave'];
			$_SESSION['tipo']= $row['tipo'];
			$_SESSION['nombre']= $row['nombre'];

			if($_SESSION['tipo']=='A'){

			echo '<script>alert("Bienvenido Administrador")</script>';
			echo '<script>window.location="./dash_adm.php";</script>';

			}
			else if ($_SESSION['tipo']=='D') {
			
			echo '<script>alert("Bienvenido Delegado")</script>';
			echo '<script>window.location="./dash_del.php";</script>';
			
			}

						
		}
		else{

			echo '<script>alert("Usuario o contraseña incorrectos.")</script>';
			echo '<script>window.location="../index.html";</script>';
		}


	}

	public function consulta($string){


		return mysqli_query($this->conexion,$string);
	}	
}
?>
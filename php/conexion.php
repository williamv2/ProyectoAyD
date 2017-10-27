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

	public function __construct(){

		$this->conexion = new mysqli($this->host_db, $this->user_db, $this->pass_db, $this->db_master);

		if($this->conexion->connect_errno){

			die ("fallo en tratar de conectar con MYSQL: (". $this->conexion->connect_errno.")");
		}

	}

	public function cerrar(){

		$this->conexion->close();
	}


	public function login($user,$pass){

		$this->usuario = $user;
		$this->clave = $pass;

		$query = "SELECT * FROM usuario WHERE codigo ='".$this->usuario."'AND clave = '".$this->clave."'";

		$consulta= $this->conexion->query($query);



		if($row = mysqli_fetch_array($consulta)){

			session_start();
			$_session['user']= $row['codigo'];
			$_session['pass']= $row['clave'];
			$_session['tipo']= $row['tipo'];

			if($_session['tipo']=='A'){

			echo '<script>alert("Bienvenido Administrador")</script>';
			echo '<script>window.location="./dash_adm.php";</script>';

			}
			else if ($_session['tipo']=='D') {
			
			echo '<script>alert("Bienvenido Delegado")</script>';
			echo '<script>window.location="./dash_del.php";</script>';
			
			}

						
		}
		else{

			echo '<script>alert("Usuario o contraseña incorrectos.")</script>';
			echo '<script>window.location="../index.html";</script>';
		}


	}	
}
?>
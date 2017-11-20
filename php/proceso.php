<?php

include('conexion_sandbox.php');

$usuario = $_POST['username'];
$clave = $_POST['pwd'];

$con = new conexion;

$con->login($usuario,$clave);
$con->cerrar();

/*$query = "SELECT * FROM usuario INNER JOIN deportista ON deportista.codigo = usuario.codigo WHERE usuario.codigo ='".$usuario."'AND usuario.clave ='".$clave."'";

$con->consulta($query);
$resul = $con->datosArray();


if($row = $resul){

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
	
	$con->cerrar();
*/	
?>
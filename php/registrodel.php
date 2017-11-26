<?php 


include ("conexion.php");
include('clases/delegado.php');

$codigo = $_POST['depts'];
$clave = $_POST['delpass'];
$tipo = 'D';
$asigna = $_POST['deljor'];
$con = new conexion;

$delegado = new delegado($codigo,$clave,$tipo,$asigna);


$query = "INSERT INTO usuario(codigo, clave, tipo, asigna) VALUES ('$codigo', '$clave', '$tipo', '$asigna')";

$verificar_nombre = $con->consulta("SELECT * FROM usuario WHERE codigo= '$codigo'");

	
	if(mysqli_num_rows($verificar_nombre)> 0){

		echo '<script>alert("El Delegado ya esta registrado");
		window.history.go(-1);
		</script>';
		exit;
	}

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al registrase");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Delegado registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>


<?php 


include ("conexion.php");

$codigo = $_POST['mcoddts'];
$nombre = $_POST['mnomdts'];
$apellido = $_POST['mapedts'];
$edad = $_POST['meddts'];
$genero = $_POST['mgedts'];
$correo = $_POST['mcordts'];

$con = new conexion;

$query = "UPDATE deportista SET nombre='$nombre', apellido='$apellido', edad='$edad', genero='$genero', correo='$correo' WHERE codigo ='$codigo'";

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al Modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Deportista modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_deportes.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>
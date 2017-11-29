<?php 


include ("conexion1.php");

$iddeporte = $_POST['middepor'];
$nombre = $_POST['mnomdep'];
$cantj = $_POST['mnumjug'];
$jornada = $_POST['mjord'];

$con = new conexion;

$query = "UPDATE deporte SET nombre='$nombre', cantidadJugadores='$cantj', idJornada='$jornada' WHERE idDeporte ='$iddeporte'";

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al Modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Deporte modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_deportes.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>
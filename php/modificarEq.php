<?php 


include ("conexion1.php");

$idEq = $_POST['midequi'];
$nom = $_POST['mnomEq'];
$deporte = $_POST['mdeporte'];

$con = new conexion;

$query = "UPDATE equipo SET nombre='$nom', idDeporte='$deporte' WHERE idEquipo ='$idEq'";

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al Modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Equipo modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>














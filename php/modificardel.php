<?php 


include ("conexion.php");

$iddel = $_POST['middel'];
$clave = $_POST['mclvdel'];

$con = new conexion;

$query = "UPDATE usuario SET clave='$clave' WHERE id ='$iddel'";

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al Modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Delegado modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>
<?php

include ("conexion.php");


$fecha = $_POST['fech'];
$lugar = $_POST['lugar'];
$fase = $_POST['fase'];
$eqlocal = $_POST['eqlocal'];
$eqvisi = $_POST['eqvisi'];
$pvisi = $_POST['pvisi'];
$plocal = $_POST['plocal'];

$con = new conexion;
	if ($eqlocal!=$eqvisi) {
		
		$query = "INSERT INTO partido(fecha, lugar, fase, local, visitante, puntosVisitante, puntosLocal) VALUES ('$fecha','$lugar','$fase','$eqlocal','$eqvisi','$pvisi','$plocal')";

		$verificar_partido = $con->consulta("SELECT * FROM partido WHERE local= '$eqlocal' AND visitante ='$eqvisi' AND fase = '$fase'");

	
	if(mysqli_num_rows($verificar_partido)> 0){

		echo '<script>alert("El Partido ya esta registrado");
		window.history.go(-1);
		</script>';
		exit;
	}

	if($pvisi>$plocal){

		$puntos = "UPDATE equipo SET puntos =puntos+5 WHERE idEquipo = '$eqvisi'";
		$con->consulta($puntos);

	}
	else if($plocal>$pvisi){

		$puntos = "UPDATE equipo SET puntos =puntos+5 WHERE idEquipo = '$eqlocal'";
		$con->consulta($puntos);
	}
	else{

		$piguales = "UPDATE equipo SET puntos =puntos+2 WHERE idEquipo = '$eqvisi'";
		$con->consulta($piguales);
		$puiguales = "UPDATE equipo SET puntos =puntos+2 WHERE idEquipo = '$eqlocal'";
		$con->consulta($puiguales);

	}


	//Ejecutar Consulta
	$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al registrase");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Partido registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_partido.php';</script>";
		
	}


}
else{

	echo '<script>alert("Equipos iguales, Error crear partido");
		window.history.go(-1);
		</script>';
		exit;

}



//cerrar conexion
	$con->cerrar();

?>
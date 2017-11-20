<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard Administrador</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../css/header-v6.min.css">
    <link type="text/css" rel="stylesheet" href="../css/header-v8.min.css">
    <link type="text/css" rel="stylesheet" href="../css/header.min.css">
    <link rel="stylesheet" type="text/css" href="../css/ufps.css">
    <link rel="stylesheet" type="text/css" href="../css/ufps.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php

  		session_start();

  		if(isset($_SESSION['user'])){

  			$nombre = $_SESSION['nombre'];

            echo "";

        }
        else{

            header("location:../index.html");
        }


  		?>
    
		<div class="ufps-navbar ufps-navbar-fixed ufps-navbar-light" id="menu">
		       
		             <div class="ufps-navbar-brand">
		                 <div class="ufps-btn-menu" onclick="toggleMenu('menu')">
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                </div>
		                Dashboard Administrador
		             </div>
		             <div class="ufps-navbar-left">
		                 <a href="#" class="ufps-navbar-btn">Inicio</a>
		                 <a href="./dash_adm_crono.php" class="ufps-navbar-btn">Cronograma</a>
		                 <a href="" class="ufps-navbar-btn">Deportes</a>
		                 <a href="" class="ufps-navbar-btn">Partidos</a>
		             </div>
		             <div class="ufps-navbar-right">
		             	<a href="" class="ufps-navbar-btn"><span class="glyphicon glyphicon-user"></span><?php echo $nombre;  ?></a>
		                <a href="./log-out.php" class="ufps-navbar-btn"><span class="glyphicon glyphicon-log-out"></span>Salir</a>
		             </div>
		             <div class="ufps-navbar-right">
		                 <div class="ufps-navbar-corporate">
		                     <img src="../img/logo_ingsistemas.png" alt="Logo ingeniería de sistemas">
		                     <img src="../img/logo_ufps_inverted.png" alt="Logo UFPS">
		                 </div>
		             </div>
		       
	
   		</div>

   <div class="container-fluid ufps-fix-navbar-fixed">
       <div class="ufps-row">
        		<div class="ufps-col-mobile-6 ufps-col-tablet-3">
					<div class="ufps-accordion">
					    <button class="ufps-btn-accordion" id="inicio">Inicio</button>
					   
					    <button class="ufps-btn-accordion">Delegados</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="listdeg">Listar Delegados</a></li>
					    	</ul>
					        
					    </div>
					    <button class="ufps-btn-accordion">Equipos</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="listEq">Listar Equipos</a></li>
					    	</ul>
					        
					    </div>
					    
					</div>         
		 		</div>
		 		<div class="ufps-col-mobile-6 ufps-col-tablet-9">
		 			
		 			<section id="dash_ini">
                		<h1 class="page-header">Dashboard</h1>
                		<p>
                    	A continuación se presentan la cantidad de integrantes inscritos por cada deporte, los deportes escojidos y delegados a cargo.
                		</p>

            		</section>
            		<section id="dash_table">
            			
            			<h1 class="page-header">Fechas de Partidos</h1>
            			<p>
                    	A continuación se presentan las fechas de los partidos acorde al cronograma.
                		</p>
                		<table class="ufps-table ufps-text-left">
						    <thead>
						        <th>No.</th>
						        <th>Deporte</th>
						        <th>Fecha</th>
						        <th>Equipo Visitante</th>
						        <th>Equipo Local</th>
						        <th>Hora</th>
						    </thead>
						    <tr>
						        <td>1</td>
						        <td>Futbol</td>
						        <td>12-11-2017</td>
						        <td>Java</td>
						        <td>NULL</td>
						        <td>4:00 pm</td>
						    </tr>
						   
						</table>

            		</section>
            		<section id="dash_equi">
            			<h1>Equipos</h1>
            			<br>
            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted ">
            					<thead>
            						<th>ID Equipo</th>
            						<th>Nombre</th>
            						<th>Cantidad de Jugadores</th>
            						<th>Deportes</th>
            						<th>Puntos</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php
            					include("conexion.php");
            					$consulta = "SELECT e.idEquipo, e.nombre, e.cantidadJugador, d.nombre as deporte, e.puntos FROM equipo e
            					INNER JOIN deporte d ON e.idDeporte = d.idDeporte ORDER BY e.nombre ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['idEquipo']; $idEqui = $row['idEquipo']; ?></td>
            						<td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
            						<td><?php echo $row['cantidadJugador']; $cantj = $row['cantidadJugador']; ?></td>
            						<td><?php echo $row['deporte']; $depor = $row['deporte']; ?></td>
            						<td><?php echo $row['puntos']; $puntos = $row['puntos']; ?></td>
            						<td><button type="button" class="btn btn-success btn-sm">Modificar</button></td>
            						<td><a href="" type="button" class="btn btn-danger btn-sm">Eliminar</a></td>
            					</tr>

            					<?php
            				}
            					?>



            				</table>
            			</div>

            		</section>
            		

		 		</div>
		</div>
		 
    </div>

	

		 


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ufps.min.js"></script>
    <script src="../js/main_inicio.js"></script>
  </body>
</html>
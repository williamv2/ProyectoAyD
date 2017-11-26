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
		                 <a href="./dash_adm.php" class="ufps-navbar-btn">Inicio</a>
		                 <a href="./dash_adm_crono.php" class="ufps-navbar-btn">Cronograma</a>
		                 <a href="#" class="ufps-navbar-btn">Deportes</a>
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
					   
					    <button class="ufps-btn-accordion">Deportes</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="depor">Deportes</a></li>
					    	</ul>
					        
					    </div>
					    <button class="ufps-btn-accordion">Deportistas</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="dep_tistas">Deportistas</a></li>
					    	</ul>
					        
					    </div>
					    
					</div>         
		 		</div>
		 		<div class="ufps-col-mobile-6 ufps-col-tablet-9">
		 			
		 			<section id="deporini">
                		<h1 class="page-header">Deportes</h1>
                		<p>
                    	A continuación se muestran los deportes creados con la cantidad de jugadores y la jornada que se realizan.
                		</p>

            		
            		<section id="depor_dash">
            			<br>
            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted">
            					<thead>
            						<th>ID Deporte</th>
            						<th>Nombre</th>
            						<th>N° Jugadores</th>
            						<th>Jornada Deportiva</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php
            					include("conexion.php");
            					$consulta = "SELECT d.idDeporte, d.nombre, d.cantidadJugadores, j.descripcion FROM deporte d INNER JOIN jornadadeportiva j ON j.idJornada=d.idJornada 
									ORDER BY d.idDeporte ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['idDeporte']; $idDeporte = $row['idDeporte']; ?></td>
            						<td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
            						<td><?php echo $row['cantidadJugadores']; $cantJ = $row['cantidadJugadores']; ?></td>
            						<td><?php echo $row['descripcion']; $descrip = $row['descripcion']; ?></td>
            						<td><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            						<td><a href="" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
            					</tr>

            					<?php
            				}
            					?>



            				</table>
            			</div>

            		</section>
            		</section>

            		<section id="deportistas" style="display: none;">
            			<h1 class="page-header">Listado de Deportistas</h1>
            			<p>
            				Listado de Deportistas inscritos en los diferentes equipo.
            			</p>
            			<br>

            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted ">
            					<thead>
            						<th>Codigo Deportista</th>
            						<th>Nombres</th>
            						<th>Apellidos</th>
            						<th>Edad</th>
            						<th>Genero</th>
            						<th>Correo</th>
            						<th>Equipo</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php
            					
            					$consulta = "SELECT d.codigo, d.nombre, d.apellido, d.edad, d.genero, d.correo, e.nombre AS equipo FROM deportista d INNER JOIN equipo e ON d.idEquipo = e.idEquipo ORDER BY d.nombre ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['codigo']; $codigo= $row['codigo']; ?></td>
            						<td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
            						<td><?php echo $row['apellido']; $apell = $row['apellido']; ?></td>
            						<td><?php echo $row['edad']; $edad = $row['edad']; ?></td>
            						<td><?php echo $row['genero']; $gen= $row['genero']; ?></td>
            						<td><?php echo $row['correo']; $correo = $row['correo']; ?></td>
            						<td><?php echo $row['equipo']; $equipo = $row['equipo']; ?></td>
            						<td><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            						<td><a href="" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
    <script src="../js/main_depor.js"></script>
  </body>
</html>
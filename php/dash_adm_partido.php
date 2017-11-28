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
		                 <a href="./dash_adm_deportes.php" class="ufps-navbar-btn">Deportes</a>
		                 <a href="#" class="ufps-navbar-btn">Partidos</a>
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
					   
					    <button class="ufps-btn-accordion">Partidos</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="partido">Listar Partidos</a></li>
					    	</ul>
					        
					    </div>
					    
					</div>         
		 		</div>
		 		<div class="ufps-col-mobile-6 ufps-col-tablet-9">
		 			
		 			<section id="cronoini">
                        <button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modal_rpartido')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button>
                		<h1 class="page-header">Partidos</h1>
                		<p>
                    	A continuación se muestran los partidos realizados con las fechas definidas y los marcadores que se obtuvieron.
                		</p>

            		
            		<section id="partido_dash" style="display: none;">
            			<br>
            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted">
            					<thead>
            						<th>ID Partido</th>
            						<th><div class="ufps-tooltip">Fecha<span class="ufps-tooltip-content-left">Año/Mes/Dia</span>
										</div></th>
                                    <th>Lugar</th>
                                    <th>Fase</th>
            						<th>Equipo Local</th>
            						<th>Equipo Visitante</th>
                                    <th>Puntos Visitante</th>
                                    <th>Puntos Local</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php
            					include("conexion.php");
            					$consulta = "SELECT p.idpartido, p.fecha, p.lugar, p.fase, p.local, e.nombre AS equipolocal, p.visitante, eq.nombre AS equipovisitante, p.puntosVisitante, p.puntosLocal FROM partido p INNER JOIN equipo e ON e.idEquipo=p.local INNER JOIN equipo eq ON eq.idEquipo=p.visitante ORDER BY p.idpartido ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['idpartido']; $idpartido = $row['idpartido']; ?></td>
            						<td><?php echo $row['fecha']; $fech = $row['fecha']; ?></td>
            						<td><?php echo $row['lugar']; $lugar = $row['lugar']; ?></td>
            						<td><?php echo $row['fase']; $fase = $row['fase']; ?></td>
            						<td><?php echo $row['equipolocal']; $eqlocal = $row['local']; ?></td>
            						<td><?php echo $row['equipovisitante']; $eqvisitante = $row['visitante']; ?></td>
                                    <td><?php echo $row['puntosVisitante']; $pvisitante = $row['puntosVisitante']; ?></td>
                                    <td><?php echo $row['puntosLocal']; $plocal = $row['puntosLocal']; ?></td>
            						<td><button type="button" class="btn btn-success btn-sm" onclick="modificarpartido('<?php echo $idpartido; ?>','<?php echo $fech; ?>','<?php echo $lugar; ?>', '<?php echo $fase; ?>','<?php echo $eqlocal; ?>','<?php echo $eqvisitante; ?>','<?php echo $pvisitante; ?>','<?php echo $plocal; ?>');openModal('modalmpartido');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            						<td><a href="./eliminarpartido.php?idpartido=<?php echo $row['idpartido']?>&&eqlocal=<?php echo $row['local']?>&&eqvisi=<?php echo $row['visitante']?>&&pvisi=<?php echo $row['puntosVisitante']?>&&plocal=<?php echo $row['puntosLocal'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
            					</tr>

            					<?php
            				}
            					?>



            				</table>
            			</div>

            		</section>
            		</section>
            		

            		<div id="modal_rpartido" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Partido</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registropartido.php" class="from-group">
                                    <div class="from-group">
                                    <label>Fecha:</label>    
                                    <input type="date" id="fech" name="fech" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Lugar:</label>    
                                    <input type="text" id="lugar" name="lugar" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Fase:</label>    
                                    <select id="fase" name="fase" required="true" class="form-control">
                                        <option value="grupos">Grupos</option>
                                        <option value="octavos">Octavos</option>
                                        <option value="cuartos">Cuartos</option>
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Equipo Local:</label>
                                    <select id="eqlocal" name="eqlocal" required="true" class="form-control">
                                    	<?php
                                            $consulta = "SELECT * FROM equipo";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idEquipo'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    	
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Equipo Visitante:</label>
                                    <select id="eqvisi" name="eqvisi" required="true" class="form-control">
                                        <?php
                                            $consulta = "SELECT * FROM equipo";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idEquipo'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Puntos Visitante:</label>    
                                    <input type="number" id="pvisi" name="pvisi" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Puntos Local:</label>    
                                    <input type="number" id="plocal" name="plocal" required="true" class="form-control">
                                    </div>
				                    <br>
                               
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regpartido" class="ufps-btn" value="Registrar Partido">
                             </div>
                            </form>
                         </div>
                    </div>



                    <div id="modalmpartido" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Partido</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificarpartido.php" class="from-group">
                                    <div class="from-group">
                                    <label> ID Partido:</label>
                                    <input type="number" name="midpar" id="midpar" required="true" class="form-control" disabled="true">
                                    <input type="number" id="midpartido" name="midpartido" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Fecha:</label>    
                                    <input type="date" id="mfech" name="mfech" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Lugar:</label>    
                                    <input type="text" id="mlugar" name="mlugar" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Fase:</label>    
                                    <select id="mfase" name="mfase" required="true" class="form-control">
                                        <option value="grupos">Grupos</option>
                                        <option value="octavos">Octavos</option>
                                        <option value="cuartos">Cuartos</option>
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Equipo Local:</label>
                                    <select id="meqlocal" name="meqlocal" required="true" class="form-control" disabled="true">
                                        <?php
                                            $consulta = "SELECT * FROM equipo";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idEquipo'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Equipo Visitante:</label>
                                    <select id="meqvisi" name="meqvisi" required="true" class="form-control" disabled="true">
                                        <?php
                                            $consulta = "SELECT * FROM equipo";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idEquipo'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Puntos Visitante:</label>    
                                    <input type="number" id="mpvisi" name="mpvisi" required="true" class="form-control" disabled="true">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Puntos Local:</label>    
                                    <input type="number" id="mplocal" name="mplocal" required="true" class="form-control" disabled="true">
                                    </div>
                                    <br>
                               
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="modifpartido" class="ufps-btn" value="Modificar Partido">
                             </div>
                            </form>
                         </div>
                    </div>	


		 		</div>
		</div>
		 
    </div>

	

		 


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ufps.min.js"></script>
    <script src="../js/main_partido.js"></script>
    <script src="../js/modificar.js"></script>
  </body>
</html>
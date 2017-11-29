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
		         <div class="ufps-container-fluid">
		             <div class="ufps-navbar-brand">
		                 <div class="ufps-btn-menu" onclick="toggleMenu('menu')">
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                </div>
		                Dashboard Delegado
		             </div>
		             <div class="ufps-navbar-left">
		                 <a href="" class="ufps-navbar-btn" style="display: none;">Salir</a>
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
		 </div>

     <div class="container-fluid ufps-fix-navbar-fixed">
       <div class="ufps-row">
            <div class="ufps-col-mobile-6 ufps-col-tablet-3">
          <div class="ufps-accordion">
              
              <button class="ufps-btn-accordion">Equipos</button>
              <div class="ufps-accordion-panel">
                <ul class="nav nav-sidebar">

                  <li><a role="button" id="listEq">Listar Equipos</a></li>

                </ul>
                  
              </div>
             
              <button class="ufps-btn-accordion">Deportistas</button>
              <div class="ufps-accordion-panel">
                <ul class="nav nav-sidebar">
                  <li><a role="button" id="dep_tistas"> Listar Deportistas</a></li>
                </ul>
                  
              </div>
              <button class="ufps-btn-accordion">Partidos</button>
              <div class="ufps-accordion-panel">
                <ul class="nav nav-sidebar">
                  <li><a role="button" id="partido">Listar Partidos</a></li>
                </ul>
                  
              </div>
              
          </div>         
        </div>
        <div class="ufps-col-mobile-6 ufps-col-tablet-9">
          
          <section id="dash_ini">
                    <h1 class="page-header">Dashboard Delegado</h1>
                    <p>
                      A continuación se presentan la cantidad de integrantes inscritos por cada deporte, los deportes escojidos y delegados a cargo.
                    </p>

          </section>

                <section id="dash_equi" style="display: none;">

                        <button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modalreg')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button> 
                  <h1>Equipos</h1>

                        <hr>
                  <div class="table-responsive">
                    <table class="ufps-table ufps-table-inserted">
                      <thead>
                        <th>ID Equipo</th>
                        <th>Nombre</th>
                        <th>Cantidad de Jugadores</th>
                        <th>Deportes</th>
                        <th>Puntos</th>
                        <th colspan="2">Operaciones</th>
                      </thead>

                      <?php

                      include("conexion1.php");

                      $consulta = "SELECT e.idEquipo, e.nombre, e.cantidadJugador, d.idDeporte, d.nombre as deporte, e.puntos FROM equipo e
                      INNER JOIN deporte d ON e.idDeporte = d.idDeporte ORDER BY e.idEquipo ASC";

                      $con = new conexion;
                      $resultado = $con->consulta($consulta);

                      while ($row = $resultado->fetch_assoc()) {
                      
                      ?>

                      <tr>
                        <td><?php echo $row['idEquipo']; $idEqui = $row['idEquipo']; ?></td>
                        <td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
                        <td><?php echo $row['cantidadJugador']; $cantj = $row['cantidadJugador']; ?></td>
                        <td><?php echo $row['deporte']; $depor = $row['idDeporte']; ?></td>
                        <td><?php echo $row['puntos']; $puntos = $row['puntos']; ?></td>

                        <td><button type="button" class="btn btn-success btn-sm" onclick="modificarequipo('<?php echo $idEqui; ?>','<?php echo $nom; ?>','<?php echo $cantj; ?>', '<?php echo $depor; ?>');openModal('modalmodifieq');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td><a disabled="true" <!--href="./eliminarEq.php?idequipo=<?php echo $row['idEquipo']?>&&cantju=<?php echo $row['cantidadJugador'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>

                      </tr>

                      <?php
                    }
                      ?>



                    </table>
                  </div>

                </section>

                <section>

                  <section id="deportistas" style="display: none;">
                  <button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modalrdeportista')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button>
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
                      
                      $consulta = "SELECT d.codigo, d.nombre, d.apellido, d.edad, d.genero, d.correo, d.idEquipo, e.nombre AS equipo FROM deportista d INNER JOIN equipo e ON d.idEquipo = e.idEquipo ORDER BY d.nombre AND e.nombre ASC";

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
                        <td><?php echo $row['equipo']; $equipo = $row['idEquipo']; ?></td>
                        <td><button type="button" class="btn btn-success btn-sm" onclick="modificardeportista('<?php echo $codigo; ?>','<?php echo $nom; ?>','<?php echo $apell; ?>', '<?php echo $edad; ?>','<?php echo $gen; ?>','<?php echo $correo; ?>','<?php echo $equipo; ?>');openModal('modalmdeportista');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td><a href="./eliminardeportista.php?codigo=<?php echo $row['codigo'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>

                      <?php
                    }
                      ?>



                    </table>
                  </div>

                </section>

                <section id="cronoini" style="display: none;">
                        <button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modal_rpartido')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button>
                    <h1 class="page-header">Partidos</h1>
                    <p>
                      A continuación se muestran los partidos realizados con las fechas definidas y los marcadores que se obtuvieron.
                    </p>

                
                <section id="partido_dash">
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
                        <td><a disabled="true" <!--href="./eliminarpartido.php?idpartido=<?php echo $row['idpartido']?>&&eqlocal=<?php echo $row['local']?>&&eqvisi=<?php echo $row['visitante']?>&&pvisi=<?php echo $row['puntosVisitante']?>&&plocal=<?php echo $row['puntosLocal'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>

                      <?php
                    }
                      ?>



                    </table>
                  </div>

                </section>
                </section>

                    <div id="modalreg" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Equipo</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registroEq.php" class="from-group">
                                    <div class="from-group">
                                    <label> Nombre:</label>
                                    <input type="text" id="nombreEq" name="nombreEq" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Deporte:</label>
                                    <select class="form-control" id="deporte" name="deporte" required="true">
                                        <?php
                                            $consulta = "SELECT * FROM deporte";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idDeporte'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
                                    </div>
                                    <br>
                               
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regEquipo" class="ufps-btn" value="Registar Equipo">
                             </div>
                            </form>
                         </div>
                    </div>


                    <div id="modalmodifieq" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Equipo</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificarEq.php" class="from-group">
                                    <div class="from-group">
                                    <label> ID equipo:</label>
                                    <input type="number" name="mideq" id="mideq" required="true" class="form-control" disabled="true">
                                    <input type="number" id="midequi" name="midequi" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombre:</label>
                                    <input type="text" id="mnomEq" name="mnomEq" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Cantidad Jugadores:</label>
                                    <input type="text" id="mcantju" name="mcantju" required="true" disabled="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Deporte:</label>
                                    <select class="form-control" id="mdeporte" name="mdeporte" required="true">
                                        <?php
                                            $consulta = "SELECT * FROM deporte";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idDeporte'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
                                    </div>
                                    <br>
                               
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regEquipo" class="ufps-btn" value="Modificar Equipo">
                             </div>
                            </form>
                         </div>
                    </div>

                    <div id="modalrdeportista" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Deportista</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registrodeportista.php" class="from-group">
                                    <div class="from-group">
                                    <label> Codigo:</label>
                                    <input type="text" id="coddts" name="coddts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombres:</label>
                                    <input type="text" id="nomdts" name="nomdts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Apellidos:</label>
                                    <input type="text" id="apedts" name="apedts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Edad:</label>
                                    <input type="number" class="form-control" id="eddts" name="eddts" min="15" max="40" required="true">
                                    </div>
                                    <br>
                                    <div class="from-group">
                            <label>Genero:</label>  
                            <select class="form-control" id="gedts" name="gedts" required="true">
                                          
                                      <option value="M">Masculino</option>
                                      <option value="F">Fenemino</option>
                                    
                                    </select>
                            </div>
                            <br>
                            <div class="from-group">
                                    <label> Correo:</label>
                                    <input type="email" id="cordts" name="cordts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                            <label>Equipo:</label>  
                            <select class="form-control" id="eqdts" name="eqdts">
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

                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regdeportista" class="ufps-btn" value="Registrar Deportista">
                             </div>
                            </form>
                         </div>
                    </div>
                
                

                <div id="modalmdeportista" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Deportista</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificardeportista.php" class="from-group">
                                    <div class="from-group">
                                    <label> Codigo:</label>
                                    <input type="number" name="mcodts" id="mcodts" required="true" class="form-control" disabled="true">
                                    <input type="number" id="mcoddts" name="mcoddts" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombres:</label>
                                    <input type="text" id="mnomdts" name="mnomdts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Apellidos:</label>
                                    <input type="text" id="mapedts" name="mapedts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Edad:</label>
                                    <input type="number" class="form-control" id="meddts" name="meddts" min="15" max="40" required="true">
                                    </div>
                                    <br>
                                    <div class="from-group">
                            <label>Genero:</label>  
                            <select class="form-control" id="mgedts" name="mgedts" required="true">
                                          
                                      <option value="M">Masculino</option>
                                      <option value="F">Fenemino</option>
                                    
                                    </select>
                            </div>
                            <br>
                            <div class="from-group">
                                    <label> Correo:</label>
                                    <input type="email" id="mcordts" name="mcordts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                            <label>Equipo:</label>  
                            <select class="form-control" id="meqdts" name="meqdts" disabled="true">
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
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="moddeportista" class="ufps-btn" value="Modificar Deportista">
                             </div>
                            </form>
                         </div>
                    </div>

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
    <script src="../js/main_del.js"></script>
    <script src="../js/modificar.js"></script>
  </body>
</html>
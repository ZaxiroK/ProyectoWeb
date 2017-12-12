<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['userName'];
    $misRetosAceptados = $_SESSION['listRetosAceptados'];
    if($varsesion == null || $varsesion = ''){
        echo 'Usted no tiene autorizacion';
        die();
    }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Challenge</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="../MisChallenges/estilos.css">
    
  </head>

  <body>
      
      <header>
        <nav class = "navbar navbar-inverse navbar-stactic-top" role = "navigation">
            <div class = "container">
                <div class = "navbar-header">         
                    <button type="button" class ="navbar-toggle collapsed" data-toggle="collapse" data-target ="#navegacion-Wil">
                        <span class= "sr-only" Desplegar / Ocultar Menu></span>
                        <span class= "icon-bar"></span>
                        <span class= "icon-bar"></span>
                        <span class= "icon-bar"></span>
                    </button>
                   <a href="../MenuPrincipal/GrandChallengeMenuPrincipal.php" class="navbar-brand">GrandChallenge</a>
                    
                </div>
                
                <!-- Inicia Menu -->
                <div class="collapse navbar-collapse" id="navegacion-Wil">
                <label id="bienvenido" for="name  ">Bienvenido</label>
                <label id="usuario" for="name"><?php echo($_SESSION['userName']);?></label>
               
                <a href="../MenuPrincipal/GrandChallengeMenuPrincipal.php" class="btn btn-lg btn-primary navbar-right">GrandChallenge</a>

            </div> 
             </div>
        </nav>
    </header>
     
    <div class="my-content" >
        <div class="container" > 
            <div class="row">
                <div class="col-sm-12" >
                  <h1><strong>GrandChallenge</strong> Mi Grand Challenge</h1>
                  <div class="mydescription">
                    <p>Busca y diviertete</p>
                    <p>Busca tus retos en todo Costa Rica</p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12 myform-cont" >
                   
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3>Si tienes retos respondeles los mas antes posible</h3>
                            
                        </div>
                        <div class="myform-top-right">
                          <i class="glyphicon glyphicon-thumbs-up"></i>
                            <div class="form-group">
                        
                         <h1 id = "tituloSolicitudes">Solicitudes de retos</h1>       
                               
                        </div> 
                        </div>
                    </div>
                    
                    <div class="myform-middle">
                        <div class="form-group">

                            <h1 id="equipo">Challenges</h1>

                        </div>

                        <table class="table table-hover" id="tblMisRetos">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Encargado</th>
                                    <th>Equipo contrincante</th>
                                    <th>Usuario contrincante</th>
                                    <th>Telefono contrincante</th>
                                    <th>Provincia</th>
                                    <th>Cancha </th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Eliminar</th>
                                    <!--<th>Aceptar</th>-->

                                </tr>
                            </thead>
                            <?php $i = 0;
                            foreach($misRetosAceptados as $index=> $reto){
                                $i++;
                                ?>
                                <tr aling= "center">
                                <td><?php echo "$i" ?></td>
                                <td><?php echo "$reto[encargadoEmailReto]" ?></td>
                                <td><?php echo "$reto[equipoContrincante]" ?></td>
                                <td><?php echo "$reto[encargadoContrincanteEmail]" ?></td>
                                <td><?php echo "$reto[contrincantePhone]" ?></td>
                                <td><?php echo "$reto[retoProvincia]" ?></td>
                                <td><?php echo "$reto[retoCancha]" ?></td>
                                <td><?php echo "$reto[retoDate]" ?></td>
                                <td><?php echo "$reto[retoTime]" ?></td>
                                <td><a href= "misChallenges.php?retoEliminar=<?php echo "$reto[retoID]"; ?>">Eliminar</a></td>
                                
                    
                            </tr>
                            
                            <?php 
                                }
                            ?>
                        </table>


                    </div>
                  
                  <div id="delete" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Eliminar Reto</h4>
                            </div>
                            <div class="modal-body">

                                <strong>Estas seguro que quieres eliminar reto?</strong>

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="del" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                    
                        
                 
                 
                  
                  <div class ="myform-bottom">
                      <div class="form-group">
                        <a href ="../CrearMisChallenges/GrandChallengeCrearMisRetos.php" class= "btn btn-lg btn-warning" id = "btnBot">Crear mis Challenges</a>
                        <a href ="../BuscarChallenge/GrandChallengeBuscar.php" class= "btn btn-lg btn-warning" id = "btnBot">Buscar Challenges</a>    <a href ="#" class= "btn btn-lg btn-success" id = "btnBot">Mis Challenges</a>
                        </div>    
                  </div>
                   
                  
                  
              </div>
            </div>
             
            <div class="row">
                <div class="col-sm-12 mysocial-login">
                    <h3>...Siguenos por:</h3>
                    <div class="mysocial-login-buttons" >
                      <a class="mybtn-social" href="#">
                      <i class="fa fa-facebook"></i> Facebook
                      </a>
                      <a class="mybtn-social" href="#">
                      <i class="fa fa-twitter"></i> Twitter
                      </a>
                    
                    </div>
                </div>
            </div>
        </div>
      </div>
      
    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src="MisChallenges.js"></script>-->
  </body>
</html>
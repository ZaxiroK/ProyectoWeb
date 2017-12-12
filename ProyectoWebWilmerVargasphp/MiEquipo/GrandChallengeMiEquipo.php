<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['userName'];
    $misRetosAceptados = $_SESSION['listRetosAceptados'];
    $players = array(
        1 => array(
             "player" => $_SESSION['player1']
              
        ),
        2 => array(
            "player" => $_SESSION['player2'] 
       ),
        3 => array(
            "player" => $_SESSION['player3'] 
       ),
        4 => array(
            "player" => $_SESSION['player4'] 
       ),
        5 => array(
        "player" => $_SESSION['player5'] 
        )
    );
    if($varsesion == null || $varsesion = ''){
        echo 'Usted no tiene autorizacion';
        die();
    }
        //var_dump($players);
        //die;

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Equipo</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="../MiEquipo/estilos.css">
    
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
                    <i class="fa fa-arrow-left"></i>
                    <a href="#" class="navbar-brand">Mi equipo</a>
                </div>
                
                <!-- Inicia Menu -->
                <div class ="collapse navbar-collapse" id ="navegacion-Wil">
                    <label id ="bienvenido" for = "name  ">Bienvenido</label> 
                    <label id="usuario" for = "name">
                    <?php echo($_SESSION[ 'userName']);?>
                    </label> 
                    <a href= "cerrarSession.php" class="btn btn-lg btn-primary navbar-right">Cerrar Sesión</a>
                    
                  </div>  
             </div>
        </nav>
    </header>
      
    <div class="my-content" >
        <div class="container" > 
            <div class="row">
                <div class="col-sm-12" >
                  <h1><strong>GrandChallenge</strong> Mi Equipo</h1>
                  <div class="mydescription">
                    <p>Se el mejor en tu region</p>
                    <p>Busca tus retos en todo Costa Rica</p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12 myform-cont" >
                   
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3>Mira los jugadores de tu equipo y busca un Challenge</h3>
                            
                        </div>
                        <div class="myform-top-right">
                          <i class="glyphicon glyphicon-thumbs-up"></i>
                        </div>
                    </div>
                  
                    <div  class="myform-middle">
                        <label id = "team" for = "name">
                    <?php echo($_SESSION[ 'teamName']);?>
                    </label> 
                        <br>
                        <label id = "team" for = "name">
                    <?php echo($_SESSION[ 'category']);?>
                    </label> 
                        <br>
                        <label id = "team"for = "name">
                    <?php echo($_SESSION[ 'gender']);?>
                    </label> 

                    <br>

                        <div class="myform-middle-left">
                              <table class="table table-hover" id="tblMiEquipo">
                            <thead>
                                <tr>
                                    <!--<th>No.</th>
                                    <th>ID</th>-->
                                    <th>Jugador</th>
                                    <th>Eliminar</th>
                                    

                                </tr>
                            </thead>
                            <?php foreach($players as $player){?>
                                <tr aling= "center">
                                
                                <td><?php echo "$player[player]" ?></td>
                                
                                <td><a href= "miEquipo.php?eliminar=<?php echo "$player[player]"; ?>">Eliminar</a></td>
                                
                    
                            </tr>
                            
                            <?php 
                                }
                            ?>
                        </table>
                           
                            
                        </div>

                           
                        
                        <div class="myform-middle-right">
                        <label id = "">Encuentros</label>
                          <table class="table table-hover" id="tblMisRetos">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Mi Equipo</th>
                                    <th>vs</th>
                                    <th>Contrincante</th>
                                    

                                </tr>
                            </thead>
                            
                            <?php $i =0;
                            foreach($misRetosAceptados as $encuentro){
                                $i++;
                                ?>
                                <tr aling= "center">
                                <td><?php echo "$i"?></td>
                                <td><?php echo "$encuentro[equipoRetante]" ?></td>
                                <td>vs</td>
                                <td><?php echo "$encuentro[equipoContrincante]" ?></td>
                            </tr>
                            
                            <?php 
                                }
                            ?>
                        </table>
                            
                        </div>
                    </div>    
                        
                    <div class="myform-bottom">
                      <form role="form" action="" method="post" class="">
                            
                       
                        <a href ="../BuscarChallenge/GrandChallengeBuscar.php" class= "btn btn-lg btn-warning">Buscar Challenge..</a>
                        <!--<a href ="" class= "btn btn-lg btn-default">Elminar Equipo..</a>-->
                        <div class="form-group">
                             
                               
                            </div>  
                      </form>
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
      
      <div id="delete" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Eliminar Jugador</h4>
                            </div>
                            <div class="modal-body">

                                <strong>Estas seguro que quieres eliminar este jugador?</strong>

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="del" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
      
    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src= "MiEquipo.js"></script> -->
  </body>
</html>
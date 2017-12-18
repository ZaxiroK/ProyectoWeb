<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['userName'];
    
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
    <title>Crear Equipo</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="../UnirseEquipo/estilos.css">
    
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
                   <a href="#" class="navbar-brand">Unirse a equipo</a>    
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
                  <h1><strong>GrandChallenge</strong> Unete a un equipo</h1>
                  <div class="mydescription">
                    <p>Solo necesitas saber el ID y la contraseña del equipo al que deseas unirte</p>
                    <p>Busca tus retos en todo Costa Rica</p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3>Recuerda crear un equipo si un amigo aun no lo a hecho</h3>
                            <p>Necesitas saber el ID y contraseña del equipo para poder unirte</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="glyphicon glyphicon-thumbs-up"></i>
                        </div>
                    </div>
                        
                        
                    <div class="myform-bottom">
                      <form role="form" action="unirseEquipo.php" method="post" class="">
                     
                          
                        <div class="form-group">
                              
                            
                            
                        <div class="form-group">
                        <input type="text" name="teamName" placeholder="Nombre del equipo.." required class="form-control" >
                    </div>
                      <div class="form-group">
                        <input type="password" name="teamPassword" placeholder="Contraseña del equipo..." required class="form-control" >
                    </div>
                          
                          
                        <button type = "submit" class= "btn btn-lg btn-success" name="submit" id="bntUnirse" >Unirse a equipo</button>    
                          <a href ="../MenuPrincipal/GrandChallengeMenuPrincipal.php" class= "btn btn-lg btn-default">Cancelar</a>
                        
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
      
    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    
   
    <script src="../js/jquery-3.2.1.min.js"></script>
      <!--<script src="unirserEquipo.js"></script>-->
  </body>
</html>
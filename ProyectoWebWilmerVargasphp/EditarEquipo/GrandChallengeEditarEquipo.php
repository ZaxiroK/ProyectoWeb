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
    <title>Editar Equipo</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="../EditarEquipo/estilos.css">
    
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
                    <a href="#" class="navbar-brand">Editar equipo</a>
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
                  <h1><strong>GrandChallenge</strong> Editar Equipo</h1>
                  <div class="mydescription">
                    <p>Edita tu equipo facilmente</p>
                    <p>Busca tus retos en todo Costa Rica</p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
              
                  <!--
                      <div class="form-group">
                    
                      <select id = "combobox2">
                                <option>San José</option>
                                <option>Alajuela</option>
                                <option>Cartago</option>
                                <option>Heredia</option>
                                <option>Guanacaste</option>
                                <option>Puntarenas</option>
                                <option>Limón</option>
                      </select>
                       
                      </div>-->
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3>Edita tu equipo y busca un Challenge</h3>
                            <p>Cambia los datos de tu equipo a tu gusto:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="glyphicon glyphicon-thumbs-up"></i>
                        </div>
                    </div>
                        
                        
                    <div class="myform-bottom">
                      <form role="form" action="editarEquipo.php" method="post" class="">
                     
                          
                        <div class="form-group">
                              
                            
                        <label id = "team" for = "name">
                    <?php echo($_SESSION[ 'teamName']);?>
                    </label> 
                            <!--<input type="text" name="form-teamName" placeholder="Nombre de equipo.." class="form-control" id="form-teamName">-->
                        </div>

                        <div class="myform-middle-categoria">
                                <h1 id="categoriaTitulo" class="col-sm-4">Categoria</h1>
                                <select name= "category" class=" form-control">
                                <option value="futbol 5">futbol 5</option>
                                        <!--<option>Futbol 7</option>
                                        <option>Futbol 11</option>
                                        <option>Basketball</option>
                                        <option>Tennis</option>
                                        <option>Football</option>
                                        <option>Baseball</option>-->
                                </select>
                            </div>                            
                            <div class="form-group">
                            <h1 id="provi" class="col-sm-4">Provincia</h1>
                                <select name="provincia" class=" form-control">
                                    <option value="Alajuela">Alajuela</option>
                                    <option value="San José">San José</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Heredia">Heredia</option>
                                    <option value="Guanacaste">Guanacaste</option>
                                    <option value="Puntarenas">Puntarenas</option>
                                    <option value="Limón">Limón</option>
                                </select>        
                            </div>
                         
                        <!--<div class="myform-middle-categoria">
                        <h1 id ="canton">Canton</h1>
                        
                        </div>  
                        <div class="myform-middle-genero">
                            <h2 id = "generoTitulo">Genero</h2>
                        </div>
                        <div class="form-group">
                            <input type="text" name="form-rID" placeholder="ID.." class="form-control" id="form-ID">
                        </div>-->
                          <div class="form-group">
                            <input type="password" name="passwordTeam" placeholder="Contraseña del equipo.." class="form-control" id="form-passwordTeam">
                        </div>
                          <div class="form-group">
                            <input type="password" name="passwordTeamRepeat" placeholder="Repetir contraseña del equipo.." class="form-control" id="form-passwordTeamRepeat">
                        </div>
                          
                        <button type = "submit" class= "btn btn-lg btn-success" name="editarEquipo" id="bntEditar" >Editar Equipo</button>
                            <a href="../MenuPrincipal/GrandChallengeMenuPrincipal.html" class="btn btn-lg btn-default">Cancelar</a>
                        <!--<div class="form-group">
                                
                                <form action="" class="formulario">
			                         <div class="radio">
				                        
 
				                            <input type="radio" name="sexo" id="hombre">
				                                <label id = "hombre" for="hombre">Masculino</label>
		
				                            <input  type="radio" name="sexo" id="mujer">
				                                <label id = "mujer" for="mujer">Femenino</label>
		
				
                                        </div>
		
		                          </form>
                            </div>  -->
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
    <!--<script src="editarEquipo.js"></script>-->
  </body>
</html>
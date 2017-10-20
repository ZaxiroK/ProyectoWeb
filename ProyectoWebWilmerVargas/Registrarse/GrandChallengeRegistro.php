<?php

include('singIn.php');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario Registro</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="../Registrarse/estilos.css">
    
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
                   
                </div>
                
                <!-- Inicia Menu -->
                <div class ="collapse navbar-collapse" id ="navegacion-Wil">
            
                    <a href= "../PrincipalLogin/GrandChallengePrincipalLogin.html" class="btn btn-lg btn-primary navbar-right">Iniciar sesion</a>
                    
                  </div>  
             </div>
        </nav>
    </header>
      
      
      
    <div class="my-content" >
        <div class="container" > 
            <div class="row">
                <div class="col-sm-12" >
                  <h1><strong>GrandChallenge</strong> Formulario de Registro</h1>
                  <div class="mydescription">
                    <p>Solo necesitas una cuenta</p>
                    <p>Busca tus retos y ofrece tus servicios de alquiler de cancha</p>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3>Regístrate en nuestra aplicaccion web.</h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                      <form role="form" method="post" class="form-register" >
                        <div class="form-group">
                            
                            
                             <div class="form-group">
                            <input type="text" name="userName" placeholder="Nombre de usuario..." class="form-control" id="form-user">
                        </div>
                            
                            <input type="text" name="name" placeholder="Primer nombre..." class="form-control" id="form-firtsname">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastName" placeholder="Primer apellido..." class="form-control" id="form-lastname">
                        </div>
                          <div class="form-group">
                            
                            <input type="text" name="email" placeholder="Correo electronico" class="form-control" id="form-email">
                        </div>
                          <div class = "myform-middle">
                               <div class = "myform-middle-left">
                          <div class="form-group">
                              <div class = "myform-middle-left">
                                <h2>Tipo de cuenta</h2>
                             </div>
                            </div>  
                                   
                              
                              
                              </div>
                              
                              
                               <div class = "myform-middle-right">
                                   <select id = "comboboxTipoCuenta" name = "accountType" >
                                
                                <option>Cuenta usuario</option>
                                <option>Cuenta de servicio </option>
                              
                             </select>
                              
                              </div>
                              
                              
                              
                        </div>
                          
                           <div class = "myform-middle2">
                         <div class = "myform-middle-left2"><div class="form-group">
                              <h2 id = "generoTitulo">Genero</h2>
                                  </div>
                          </div>
                               
                               <div class = "myform-middle-right2">
                              <div class="form-group">
                              <select id = "comboboxGenero" name = "gender">
                                
                                <option>Hombre</option>
                                <option>Mujer</option>
                              
                             </select>
                                  </div>
                              </div>
                               
                             
                          </div>
                          
                               
                         
                          
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Telefono..." class="form-control" id="form-phone">
                        </div>
                         
                          <div class="form-group">
                            <input type="password" name="password" placeholder="Contraseña..." class="form-control" id="form-password">
                        </div>
                          <div class="form-group">
                            <input type="password" name="form-passwordRepeat" placeholder="Repetir contraseña..." class="form-control" id="form-passwordRepeat">
                        </div>
                          <button type = "submit" class= "btn btn-lg btn-success" name="insert" id="bntRegistrar" onclick="validar();">Registrarse</button>
                          
                
                         <!-- <a href="../Registrarse/GranChallengeRegistro.html" class="btn btn-lg btn-success" id="bntRegistrar" onclick="insert();">Registrarme</a> -->   
                          <a href ="../PrincipalLogin/GrandChallengePrincipalLogin.html" class= "btn btn-lg btn-default">Cancelar</a>      
                          
                        
                          
                      </form>
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mysocial-login">
                    <h3>...Siguenos en:</h3>
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
    <!--<script src="../js/bootstrap.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script></script>
    <script src="registrarsee.js"></script>

  </body>
</html>
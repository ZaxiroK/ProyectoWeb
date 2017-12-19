<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['userName'];

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
    <title>Mi perfil</title>

    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Iconos-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500">
    <link rel="stylesheet" href="../MiPerfil/estilos.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-inverse navbar-stactic-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-Wil">
                        <span class="sr-only" Desplegar / Ocultar Menu></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="../MenuPrincipal/GrandChallengeMenuPrincipal.php" class="navbar-brand">GrandChallenge</a>

                    <i class="fa fa-arrow-left"></i>
                    <a href="#" class="navbar-brand">Mi perfil</a>
                </div>

                <!-- Inicia Menu -->
                <div class="collapse navbar-collapse" id="navegacion-Wil">
                
                <a href="cerrarSession.php" class="btn btn-lg btn-primary navbar-right" id="btnCerrarSesion">Cerrar Sesion</a>
                
                <label id = "usuario" class= "navbar-right" for="name"><?php echo($_SESSION['userName']);?>    </label>
                <label class= "navbar-right"  id="bienvenido"  for="name  ">Bienvenido</label>
                </div>
            </div>
        </nav>
    </header>

    <div class="my-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><strong>GrandChallenge</strong> Mi perfil</h1>
                    <div class="mydescription">

                        <p>Recuerda guardar tus cambios antes de salir</p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 myform-cont">
                    <div class="myform-top">
                        <div class="myform-top-left">
                            <h3>Modifica tus datos</h3>
                            <p>Por favor no dejes espacios en blanco</p>
                        </div>
                        <div class="myform-top-right">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>

                    <div class="myform-bottom">
                     <form role="form" method="post" class="form-login" action= "miPerfil.php">
                        <div class="form-group">
                           <input type="text" name="userName" placeholder="Usuario..." required class="form-control" id="form-username" value = <?php echo($_SESSION['userName']);?>>
                        </div>
                        <div class="form-group">
                           <input type="text" name="name" placeholder="Nombre..." required class="form-control" id="form-name" value = <?php echo($_SESSION['name']);?>>
                        </div>
                        <div class="form-group">
                           <input type="text" name="lastName" placeholder="Apellido..." required class="form-control" id="form-lastname" value = <?php echo($_SESSION['lastName']);?>>
                        </div>
                        <div class="form-group">
                           <input type="text" name="phone" placeholder="Telefono..." required class="form-control" id="form-phone" value = <?php echo($_SESSION['phone']);?>>
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" placeholder="Contraseña..." required class="form-control" id="form-password" >
                        </div>
                        <div class="form-group">
                           <input type="password" name="passwordRepeat" placeholder="Repetir contraseña..." required class="form-control" id="form-repeatPassword" >
                        </div>
                        <button type ="submit" class= "btn btn-lg btn-success" name ="edit" id="bntLogin" >Editar</button>
                        <a href="../MenuPrincipal/GrandChallengeMenuPrincipal.php" class="btn btn-lg btn-default">Cancelar</a>
    
                     </form>
                  </div>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-12 mysocial-login">
                    <h3>...Siguenos por:</h3>
                    <div class="mysocial-login-buttons">
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
    

    <script src="../js/jquery-3.2.1.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
    <!--<script src="miPerfil.js"></script>-->
</body>


</html>


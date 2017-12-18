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
<html lang="">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">

    <title>GrandChallenge PrincipalLogin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../MenuPrincipal/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">



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

                </div>

                <!-- Inicia Menu -->
                <div class="collapse navbar-collapse" id="navegacion-Wil">
                    
                    <a href="cerrarSession.php" class="btn btn-lg btn-primary navbar-right" id="btnCerrarSesion">Cerrar Sesion</a>
                    
                    <label class= "navbar-right" for="name"><?php echo($_SESSION['userName']);?>    </label>
                    <label class= "navbar-right"  id="bienvenido"  for="name  ">Bienvenido</label>
                    <ul class="nav navbar-nav">

                    <!--<td><a href= "demo.php?editar=   <?php// echo $id; ?>    ">Editar</a></td>-->
                    
                        <li><a href="menuPermisos.php?miPerfil=">Mi Perfil</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Equipo 
                        <span class= "caret"></span>
                    </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="menuPermisos.php?miEquipo=">Mi Equipo </a>  
                                </li>
                                <li class="divider"></li>
        
                                <li><a href="menuPermisos.php?crearEquipo=">Crear Equipo</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="menuPermisos.php?unirseEquipo=">Unirse a Equipo</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="menuPermisos.php?editarEquipo=" name="editarEquipo">Editar Equipo</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cancha 
                        <span class= "caret"></span>
                    </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="menuPermisos.php?registrarCancha=">Registrar cancha</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="menuPermisos.php?editarCancha=">Editar cancha</a>
                                </li>

                            </ul>


                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="my-content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <h1 id="titulo1"><strong>Grand</strong></h1>
                    <h1 id="titulo2"><strong>Challenge</strong></h1>
                    <div class="mydescription">
                        <p>Aplicacion web</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 myform-cont">
            <div class="myform-top">

                <div class="btn-group">


                
                    <a href="menuPermisos.php?grandChallenge=" class="btn btn-lg btn-success navbar-right" id="btnEmpezarGC" onclick="btnGrandChallenge();">Empezar Grand Challenge..</a>

                </div>

                <div class="myform-top-right">

                </div>
            </div>

        </div>
    </div>
    <script language=j avascript>
        traerUsuarioLogueado();
    </script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>




    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src= "MenuPrincipal.js"></script>-->
</body>

</html>
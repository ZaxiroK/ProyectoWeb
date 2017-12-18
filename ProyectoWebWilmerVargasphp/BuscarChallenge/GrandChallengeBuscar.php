<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['userName'];
    $allRetos = $_SESSION['allRetos'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Iconos-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500">
    <link rel="stylesheet" href="../BuscarChallenge/estilos.css">

</head>

<body>

<header>
<nav class="navbar navbar-inverse navbar-stactic-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-Wil">
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

    <div class="my-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><strong>GrandChallenge</strong> Mi Grand Challenge</h1>
                    <div class="mydescription">
                        <p>Busca y diviertete</p>
                        <p>Busca tus retos en todo Costa Rica</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 myform-cont">

                    <div class="myform-top">
                        <div class="myform-top-left">
                            <h1>Reta a equipos de tu zona o de otro lugar</h1>
                            <h3>Puedes buscar los retos con solo la ubicacion</h3>

                        </div>

                    </div>

                    <!--

                    <div class="myform-middle-top">
                        <div class="myform-left">
                            <div class="myform-provincia">
                                <h1 id ="provincia">Provincia</h1>
                        
                            </div>
                            <div class="myform-canton">
                                <h1 id="provincia">Provincia</h1>
                            </div>

                            <div class="myform-cancha">
                                <h1 id="cancha">Cancha</h1>
                            </div>
                            <div class="myform-cancha">
                                <h1 id="fecha">Fecha</h1>
                            </div>

                            <div class="myform-cancha">
                                <h1 id="tiempo">Hora</h1>
                            </div>

                        </div>

                        <div class="myform-rigth">
                            <div class="myform-combobox">
                                <div class="form-group">
                                    <select id="combobox1">
                                        <option>Alajuela</option>
                                        <option>San José</option>
                                        <option>Cartago</option>
                                        <option>Heredia</option>
                                        <option>Guanacaste</option>
                                        <option>Puntarenas</option>
                                        <option>Limón</option>
                                    </select>

                                </div>


                                <div class="form-group">
                    
                                     <select id = "combobox2">
                                               
                                        <option>Alajuela</option>
                                        <option>San Ramón</option>
                                        <option>Greacia</option>
                                        <option>San Mateo</option>
                                        <option>Atenas</option>
                                        <option>Naranjo</option>
                                        <option>Palmares</option>
                                        <option>Poás</option>
                                        <option>Orotina</option>
                                        <option>San Carlos</option>
                                        <option>Zarcero</option>
                                        <option>Valverde Vega</option> 
                                        <option>Upala</option>
                                        <option>Los Chiles</option>
                                        <option>Guatuso</option>
                                        <option>Río Cuarto</option>
                                
                                    </select>
                                    
                                </div> 
                                <div class="form-group">
                                    <select id="comboboxCanchas">
                                        
                                        
                                    </select>

                                </div>
                                <div>
                                    <form action="" method="" id="date">
                                        <input type="date">
                                    </form>
                                </div>

                                <div>
                                    <form action="" method="" id="hora">
                                        <input type="time">
                                    </form>
                                </div>
                                
                                <a href="" class="btn btn-lg btn-warning" id="btnBuscar" onclick="validar();">Buscar Challenge</a>


        
                            </div>
                        </div>
                    </div>-->

                    <div class="myform-middle">
                        <div class="form-group">

                            <h1 id="equipo">Challenges</h1>

                        </div>

                        <table class="table table-hover" id="tblMisRetos">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Equipo</th>
                                    <th>Usuario</th>
                                    <th>Telefono</th>
                                    <th>Provincia</th>
                                    <th>Cancha </th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Informacion</th>

                                </tr>
                            </thead>
                            <?php $i = 0;
                            foreach($allRetos as $index=> $reto){
                                $i++;
                                ?>
                                <tr aling= "center">
                                <td><?php echo "$i" ?></td>
                                <td><?php echo "$reto[equipoRetante]" ?></td>
                                <td><?php echo "$reto[encargadoEmailReto]" ?></td>
                                <td><?php echo "$reto[encargadoRetoPhone]" ?></td>
                                <td><?php echo "$reto[retoProvincia]" ?></td>
                                <td><?php echo "$reto[retoCancha]" ?></td>
                                <td><?php echo "$reto[retoDate]" ?></td>
                                <td><?php echo "$reto[retoHora]" ?></td>
                                <td><a href= "buscarChallenges.php?aceptarReto=<?php echo "$reto[retoID]"; ?>">Aceptar reto</a></td>
                                
                    
                            </tr>
                            
                            <?php 
                                }
                            ?>
                        </table>


                    </div>


                </div>

                <div id="delete" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Informacion reto</h4>
                            </div>
                            <div class="modal-body">

                                <strong>Anteriormente retaste a este equipo o este te reto a ti revisa tu solicitud de retos</strong>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="myform-bottom">
                    <div class="form-group">
                        <a href="../CrearMisChallenges/GrandChallengeCrearMisRetos.php" class="btn btn-lg btn-warning" id="btnBot">Crear mis Challenges</a>
                        <a href="#" class="btn btn-lg btn-success" id="btnBot">Buscar Challenges</a>
                        <a href="../MisChallenges/GrandChallengeMisChallenges.php" class="btn btn-lg btn-warning" id="btnBot">Mis Challenges</a>
                    </div>
                </div>


                <!--<a href="" class="btn btn-lg btn-warning" id="btnCancha">Mas sobre la cancha..</a>-->



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
    

    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src="buscarChallenge.js"></script>-->

</body>

</html>
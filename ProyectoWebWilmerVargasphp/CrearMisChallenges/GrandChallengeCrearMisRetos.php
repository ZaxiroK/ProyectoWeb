<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['userName'];
    $canchas = $_SESSION['canchas'];
    $misRetos = $_SESSION['misRetosBuscando'];
    
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
    <link rel="stylesheet" href="../CrearMisChallenges/estilos.css">

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
                            <h1 id="equipo">Crear mis Challenges</h1>
                            <h3 id="instrupciones">Selecciona los datos donde quieres realizar tu reto</h3>
                            <h3 id="instrupciones">Puedes buscar equipos y comunicarte directamente con ellos para realizar el lugar del Challenge</h3>
                        </div>
                        <div class="myform-top-right">


                        

                    <form role="form" method="post" class="form-crearReto" action="crearMisRetos.php" >
                    <div class="form-group">
                    <h1 id="provinciaa">Provincia</h1>
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
                   
                    
                        <div class="form-group">
                        <h1 id="cancha">Cancha</h1>
                        <select name= "cancha"id="comboboxCanchas">
                            <?php foreach($canchas as $index=> $value){?>    
                                <option name=""  value="<?php echo $value['canchaName'] ?>"><?php echo $value['canchaName'] ?></option>
                            <?php } ?>             
                        </select>
                        </div>

                        <div class="form-group">
                        <h1 id="fecha">Fecha</h1>
                        <input type="date" id="fecha" name="date" required class="form-control">
                        </div>

                        <div class="form-group">
                        <h1 id="tiempo">Hora</h1>
                        <input type="time" id="hora" name="time" required class="form-control">
                        </div>

                        <button type = "submit" class= "btn btn-lg btn-warning" name="submit" id="btnEnviar" >Enviar Challenge</button>    
                          <a href ="../CrearMisChallenges/GrandChallengeCrearMisRetos.php" class= "btn btn-lg btn-default">Cancelar</a>
                        </form>

                        

                                <!--<div class="form-group">
                    
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
                                </div> -->
                                
                               

                                
                                 
                              

                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="myform-middle">
                        <div class="form-group">

                            <h1 id="equipo">Mis Challenges</h1>

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
                                    <th>Eliminar</th>

                                </tr>
                            </thead>
                            <?php $i = 0;
                            foreach($misRetos as $index=> $reto){
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
                                <td><a href= "crearMisRetos.php?retoEliminar=<?php echo "$reto[retoID]"; ?>">Eliminar</a></td>
                                
                    
                            </tr>
                            
                            <?php 
                                }
                            ?>
                        </table>


                    </div>



                    <div class="myform-bottom">
                        <div class="form-group">
                            <a href="#" class="btn btn-lg btn-success" id="btnBuscar">Crear mis Challenges</a>
                            <a href="../BuscarChallenge/GrandChallengeBuscar.php" class="btn btn-lg btn-warning" id="btnBuscar">Buscar Challenges</a>
                            <a href="../MisChallenges/GrandChallengeMisChallenges.php" class="btn btn-lg btn-warning" id="btnBuscar">Mis Challenges</a>
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
    </div>

    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>




    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src="crearMisRetos.js"></script>-->

</body>

</html>
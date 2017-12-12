<?php

    session_start();
    error_reporting(0);
    $email = $_SESSION['email'];
    $equipo = $_SESSION['teamName'];
    $phone = $_SESSION['phone'];
    
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
    //echo ("conexion realizada con exito");
   if(isset($_POST['submit'])){
       
            $equipoRetante = $equipo;
            $encargadoEmailReto = $email;
            $encargadoRetoPhone = $phone;
            $retoProvincia = $_POST['provincia'];
            $retoCancha = $_POST['cancha']; 
            $retoDate = $_POST['date'];
            $retoHora = $_POST['time'];
            $equipoContrincante = "";
            $encargadoContrincanteEmail = "";
            $contrincantePhone = "";
            $estadoReto = "buscando";

            
                
            $insert = "INSERT INTO `reto`(`equipoRetante`, `encargadoEmailReto`, `encargadoRetoPhone`, `retoProvincia`, `retoCancha`, `retoDate`, `retoHora`, `equipoContrincante`, `encargadoContrincanteEmail`,`contrincantePhone`,`estadoReto`) VALUES 
            ('$equipoRetante','$encargadoEmailReto','$encargadoRetoPhone','$retoProvincia','$retoCancha','$retoDate','$retoHora','$equipoContrincante','$encargadoContrincanteEmail','$contrincantePhone','$estadoReto')";
            
            $ejecutar = mysqli_query($conexion, $insert);

            if($ejecutar){
                echo '<script>alert ("Reto registrado con exito"); </script>';
                misChallengesCreados();
                allRetosCreados();
                echo "<script> location.href=\"../CrearMisChallenges/GrandChallengeCrearMisRetos.php\" </script>";
                
                die;
                //parent.window.location.reload();
            }
        }

        function misChallengesCreados(){
            $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
            $equipo = $_SESSION['teamName'];
            $consulta = "SELECT * FROM reto WHERE equipoRetante = '$equipo'";
            $resultado = mysqli_query($conexion, $consulta);
            $filas= mysqli_num_rows($resultado);
            if ($filas > 0)
            {
            if (isset($resultado))
            {
                if ($resultado->num_rows != 0){
                    $misRetos = array();
                    foreach($resultado as $reto){
                        
                        array_push($misRetos, $reto);
                        
                    }
                         $_SESSION['misRetos'] = $misRetos;
                    
                    }

            }
            }
    }
    if(isset($_GET['retoEliminar'])){
        $retoID = $_GET['retoEliminar'];
        $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
        $consulta= "DELETE FROM `reto` WHERE  retoID = '$retoID'";
        $ejecutar = mysqli_query($conexion, $consulta);
        
        if($ejecutar){
            echo '<script>alert ("Reto eliminado con exito"); </script>';
            misChallengesCreados();
            allRetosCreados();
            echo "<script> location.href=\"../CrearMisChallenges/GrandChallengeCrearMisRetos.php\" </script>";
            //"<h3>Cuenta registrada con exito</h3>";
            die;
            //parent.window.location.reload();
        }
    }

    function allRetosCreados(){
        $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
        $equipo = $_SESSION['teamName'];
        $consulta = "SELECT * FROM reto WHERE equipoRetante != '$equipo' && estadoReto != 'buscando'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas= mysqli_num_rows($resultado);
        if ($filas > 0)
        {
        if (isset($resultado))
        {
            if ($resultado->num_rows != 0){
                $allRetos = array();
                foreach($resultado as $reto){
                    
                    array_push($allRetos, $reto);
                    
                }
                     $_SESSION['allRetos'] = $allRetos;
                        die;
                }
    
        }
        }
    }
    
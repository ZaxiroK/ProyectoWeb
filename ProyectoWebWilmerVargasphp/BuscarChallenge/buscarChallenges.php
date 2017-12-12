<?php

    session_start();
    error_reporting(0);
    $email = $_SESSION['email'];
    $equipo = $_SESSION['teamName'];
    $phone = $_SESSION['phone'];
    
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
    //echo ("conexion realizada con exito");
   

        function allRetosCreados(){
            $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
            $equipo = $_SESSION['teamName'];
            $consulta = "SELECT * FROM reto WHERE equipoRetante != '$equipo' && estado = 'buscando'";
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
                            
                    }

            }
            }
            $_SESSION['allRetos'] = $allRetos;
    }
    if(isset($_GET['aceptarReto'])){
        $retoID = $_GET['aceptarReto'];
        $email = $_SESSION['email'];
        $equipo = $_SESSION['teamName'];
        
        $equipoContrincante = $equipo;
        $estadoReto = "aceptado";
        $encargadoContrincanteEmail = $email;
        $contrincantePhone = $_SESSION['phone'];

        $consulta= "UPDATE `reto` SET `equipoContrincante`= '$equipoContrincante',`estadoReto`=  '$estadoReto',`encargadoContrincanteEmail`=  '$encargadoContrincanteEmail'
        ,`contrincantePhone`=  '$contrincantePhone' WHERE  retoID = '$retoID';";
        $ejecutar = mysqli_query($conexion, $consulta);
            
            if($ejecutar){
                echo '<script>alert ("Reto aceptado con exito"); </script>';
                allRetosCreados();
                listRetosAceptados();
                misChallengesCreados();
                echo "<script> location.href=\"../MisChallenges/GrandChallengeMisChallenges.php\" </script>";
                die;
                
            }
        
        
        $ejecutar = mysqli_query($conexion, $consulta);
        
        
    }

    function listRetosAceptados(){
        $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
        $equipo = $_SESSION['teamName'];
        $consulta = "SELECT * FROM reto WHERE equipoRetante = '$equipo' && estadoReto = 'aceptado'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas= mysqli_num_rows($resultado);
        if ($filas > 0)
        {
        if (isset($resultado))
        {
            if ($resultado->num_rows != 0){
                $listRetosAceptados = array();
                foreach($resultado as $reto){
                    
                    array_push($listRetosAceptados, $reto);
                    
                }
                     $_SESSION['listRetosAceptados'] = $listRetosAceptados;
                        
                }
    
        }
        }
    }

    function misChallengesCreados(){
        $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
        $equipo = $_SESSION['teamName'];
        $consulta = "SELECT * FROM reto WHERE equipoRetante = '$equipo' && estadoReto = 'buscando'";
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
    
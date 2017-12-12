<?php

    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['email'];
    /*echo ($varsesion);
    die();
    if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorizacion';
    die();
}*/
    //include ('Usuario.php');
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
    //echo ("conexion realizada con exito");
   if(isset($_POST['submit'])){
            /*if($_POST){
                var_dump($_POST);
            }
            die;*/
            $teamName = $_POST['teamName'];
            $category = "futbol 5";
            //provincia no cojo el dato
            $provincia = $_POST['provincia'];
            $gender = $_POST['gender'];
            $password = $_POST['password'];
            $player1 = $_SESSION['email'];
            $player2 = "";
            $player3 = "";
            $player4 = "";
            $player5 = "";
            
           /* echo ($provincia);    
            die();*/
            //validacion de si existe o no
            
            $select = "SELECT * FROM `equipo`";
            $validacionNombre = mysqli_query($conexion, $select);
                if(isset($validacionNombre)){
                    if ($validacionNombre->num_rows != 0) {
                           while ($fila = $validacionNombre->fetch_assoc()) {
                               /*echo ($fila);    
                                die();*/
                                if($teamName == $fila['teamName']){ 
                                    echo '<script>alert ("El nombre de equipo ya esta en uso"); </script>';
                                    echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
                                    die;
                                    
                                    
                                } 
                            }
                    }
                }
                
            //if($existe == false){
            $insert = "INSERT INTO `equipo`(`teamName`, `category`, `provincia`, `gender`, `player1`, `player2`, `player3`, `player4`, `player5`,`passwordTeam`) VALUES 
            ('$teamName','$category','$provincia','$gender','$player1','$player2','$player3','$player4','$player5','$password')";
            
            $ejecutar = mysqli_query($conexion, $insert);

            if($ejecutar){
                echo '<script>alert ("Equipo registrado con exito"); </script>';
                echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
                //"<h3>Cuenta registrada con exito</h3>";
                die;
                //parent.window.location.reload();
            }
        }
    //}
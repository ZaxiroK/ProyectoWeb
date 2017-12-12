<?php

    session_start();
    error_reporting(0);
    $email = $_SESSION['email'];
    
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
    
   if(isset($_POST['submit'])){
            /*if($_POST){
                var_dump($_POST);
            }
            die;*/
            $canchaName = $_POST['canchaName'];
            $canchaEmail = $_POST['email'];
            $canchaCategory = $_POST['category'];
            $canchaProvincia = $_POST['provincia'];
            $encargadoName = $_POST['encargadoName'];
            $canchaPhone = $_POST['phone'];
            $canchaCellphone = $_POST['cellphone'];
            $personaQueRegistroCancha = $_SESSION['email'];
            
           /* echo ($provincia);    
            die();*/
            //validacion de si existe o no
            
            $select = "SELECT * FROM `cancha`";
            $validacionNombre = mysqli_query($conexion, $select);
                if(isset($validacionNombre)){
                    if ($validacionNombre->num_rows != 0) {
                           while ($fila = $validacionNombre->fetch_assoc()) {
                               /*echo ($fila);    
                                die();*/
                                if($canchaName == $fila['canchaName'] && $provincia == $fila['provincia'] ){ 
                                    echo '<script>alert ("El nombre de la cancha ya esta en uso en esa provincia"); </script>';
                                    echo "<script> location.href=\"../RegistrarCancha/GrandChallengeRegistrarCancha.php\" </script>";
                                    die;
                                    
                                    
                                } 
                            }
                    }
                }
                
            //if($existe == false){
            $insert = "INSERT INTO `cancha`(`canchaName`, `canchaEmail`, `canchaCategory`,  `canchaProvincia`, `encargadoName`, `canchaPhone`, `canchaCellphone`, `personaQueRegistroCancha`) VALUES 
            ('$canchaName','$canchaEmail','$canchaCategory','$canchaProvincia','$encargadoName',$canchaPhone,$canchaCellphone,'$personaQueRegistroCancha')";
            
            $ejecutar = mysqli_query($conexion, $insert);

            if($ejecutar){
                echo '<script>alert ("Cancha registrada con exito"); </script>';
                echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
                //"<h3>Cuenta registrada con exito</h3>";
                die;
                //parent.window.location.reload();
            }
        }
    //}
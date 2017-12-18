<?php

    session_start();
    error_reporting(0);
    
        
        if(isset($_GET['eliminar'])){
            /*echo($_GET['eliminar']);
            die;*/
            if($_GET['eliminar'] == ""){
                
                echo '<script>alert ("No hay ningun jugador en esa posicion"); </script>';
                echo "<script> location.href=\"../MiEquipo/GrandChallengeMiEquipo.php\" </script>";
                
                die;
            }else{
            $email = $_SESSION['email'];
            $teamID =$_SESSION['teamID'];
            $playersEditar = array();
            $player1 = "";
            $player2 = "";
            $player3 = "";
            $player4 = "";
            $player5 = "";

            
           
               /* $consulta = "SELECT * from equipo WHERE player1='$email' or player2='$email' or
                player3='$email' or player4='$email' or player5='$email'";
                var_dump($consulta);
                die;*/
                $players = array(
                    1 => array(
                         "player" => $_SESSION['player1']
                          
                    ),
                    2 => array(
                        "player" => $_SESSION['player2'] 
                   ),
                    3 => array(
                        "player" => $_SESSION['player3'] 
                   ),
                    4 => array(
                        "player" => $_SESSION['player4'] 
                   ),
                    5 => array(
                    "player" => $_SESSION['player5'] 
                    )
                );

            
               
               
                
            $emailPlayerEliminar = $_GET['eliminar'];
            foreach($players as $player){
                
 
               //array_push($array_numerico_indexado, 5, "seis");

                if($emailPlayerEliminar == $player[player]){

                        $player[player] = "";
                        array_push($playersEditar,  $player[player]);
                        
              
                }else{

                    array_push($playersEditar, $player[player]);
                    

                }
    
            } 
                
                foreach($playersEditar as $player){
                    
                    if($player != "" && $player1 == ""){ 
                        $player1 = $player;
                        //echo($player1);
                        
    
                    }else if($player !="" && $player2 == ""){
                       
                        $player2 = $player;
                        
                    }else if($player !="" && $player3 == ""){
                        $player3 = $player;
                        
                    }else if($player !="" && $player4 == ""){
                        $player4 = $player;
                        
                    }else {
                        $player5 = $player;
                        
                    }


                }

                
                $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
                $consulta= "UPDATE `equipo` SET `player1`= '$player1',`player2`=  '$player2',`player3`=  '$player3'
                ,`player4`=  '$player4',`player5`= '$player5' WHERE  ID = '$teamID';";
                $ejecutar = mysqli_query($conexion, $consulta);
                
                if($ejecutar){
                    echo '<script>alert ("Jugador eliminado con exito"); </script>';
                    echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
                    //"<h3>Cuenta registrada con exito</h3>";
                    die;
                    //parent.window.location.reload();
                }
        
                
            
            
            
    
        }

    }

   
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    
    
    
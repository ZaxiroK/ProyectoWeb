<?php
        session_start();
        error_reporting(0);
        
    
        $email = $_SESSION['email'];
        $playersAgregar = array();
        $player1A = "";
        $player2A = "";
        $player3A = "";
        $player4A = "";
        $player5A = "";
        if(isset($_POST['submit'])){
            
        $teamName = $_POST['teamName'];
        $teamPassword = $_POST['teamPassword'];
        
        $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
            //validacion de si existe o no
            $consulta = "SELECT * FROM equipo WHERE teamName = '$teamName' and passwordTeam = '$teamPassword'";
            $resultado = mysqli_query($conexion, $consulta);
            $filas= mysqli_num_rows($resultado);
            $playersEditar = array();
            if($filas>0){
            if(isset($resultado)){
                
                if ($resultado->num_rows != 0) {
                       while ($fila = $resultado->fetch_assoc()) {
                        $player1 = $fila['player1']; 
                        $player2 = $fila['player2']; 
                        $player3 = $fila['player3']; 
                        $player4 = $fila['player4']; 
                        $player5 = $fila['player5']; 
                        
                        $players = array(
                            1 => array(
                                 "player" => $player1
                                  
                            ),
                            2 => array(
                                "player" => $player2 
                           ),
                            3 => array(
                                "player" => $player3
                           ),
                            4 => array(
                                "player" => $player4
                           ),
                            5 => array(
                            "player" => $player5
                            )
                        );
                        
                        foreach($players as $player){
                            
                            if($email == $player[player]){
                                

                                echo '<script>alert ("El usuario ya es parte de este equipo"); </script>'; 
                                echo "<script> location.href=\"../UnirseEquipo/GrandChallengeUnirseEquipo.php\" </script>"; 
                                die;
                            }


                        }

                        foreach($players as $player){
                            if($player[player] !=""){
                                array_push($playersAgregar, $player[player]);
                                
                            }
                        }
                        
                            array_push($playersAgregar, $email);
                            //var_dump($playersAgregar);
                            //die;
                            $resultado = count($playersAgregar);
                            if($resultado <= 5){
                                for ($i = $resultado; $i <= 4; $i++) {
                                    $player[player] = "";
                                    array_push($playersAgregar, $player[player]);
                                    
                                } 
                            }else{
                                echo '<script>alert ("El equipo ya tiene la cantidad maxima de jugadores"); </script>'; 
                                echo "<script> location.href=\"../UnirseEquipo/GrandChallengeUnirseEquipo.php\" </script>";
                                die; 
                            }
                            /*var_dump($playersAgregar);
                            die;*/

                            foreach($playersAgregar as $player){
                                /*var_dump($playersAgregar);
                            die;*/
                                if($player[player] != "" && $player1A[player] == ""){ 
                                    $player1A = $player;
                                    /*echo($player1A);
                                    die;*/
                                    
                
                                }else if($player[player] !="" && $player2A[player] == ""){
                                   
                                    $player2A = $player;
                                    /*echo($player2A);
                                    die;*/
                                    
                                }else if($player[player] !="" && $player3A[player] == ""){
                                    $player3A = $player;
                                    /*echo($player3A);
                                    die;*/
                                }else if($player[player] !="" && $player4A[player] == ""){
                                    $player4A = $player;
                                    /*echo($player2A);
                                    die;*/
                                }else {
                                    $player5A = $player;
                                    /*echo($player2A);
                                    die;*/
                                }
            
            
                            }
            
                            
                            
                            
                            $consulta= "UPDATE `equipo` SET `player1`= '$player1A',`player2`= '$player2A' ,`player3`= '$player3A',
                            `player4`= '$player4A',`player5`= '$player5A' WHERE teamName = '$teamName' and passwordTeam = '$teamPassword';";
                            
                            $ejecutar = mysqli_query($conexion, $consulta);
                            
                            if($ejecutar){
                                echo '<script>alert ("Jugador ingresado al equipo con exito"); </script>';
                                echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
                                die;
                            }


                }
            }
        }
    }else {
        echo '<script>alert ("El nombre de usuario o contraseña no coinciden"); </script>';
        echo "<script> location.href=\"../UnirseEquipo/GrandChallengeUnirseEquipo.php\" </script>";
        die;
    }  
} 
                    
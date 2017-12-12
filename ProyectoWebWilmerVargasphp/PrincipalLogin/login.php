<?php
        if(isset($_POST['submit'])){
            
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        
        $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
            //validacion de si existe o no
            $consulta = "SELECT * from usuario WHERE userName='$userName' and password='$password'";
            $resultado = mysqli_query($conexion, $consulta);
            $filas= mysqli_num_rows($resultado);

            if($filas>0){
            if(isset($resultado)){
                
                if ($resultado->num_rows != 0) {
                       while ($fila = $resultado->fetch_assoc()) {
                            SESSION_START();
                            $_SESSION['ID'] = $fila['ID']; 
                            $_SESSION['userName'] = $fila['userName']; 
                            $_SESSION['name'] = $fila['name'];
                            $_SESSION['lastName'] = $fila['lastName']; 
                            $_SESSION['email'] = $fila['email']; 
                            $_SESSION['accountType'] = $fila['accountType']; 
                            $_SESSION['gender'] = $fila['gender']; 
                            $_SESSION['phone'] = $fila['phone']; 
                            $_SESSION['password'] = $fila['password']; 

                            //echo($_SESSION['email']);
                            echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
                             //var_dump($fila);
                                //echo($usuarioName);
                                //
                                 
                             die;
                                
                                
                            
                        }
                }
            }    
            
                
            }else {
                echo '<script>alert ("El nombre de usuario o contraseña no coinciden"); </script>';
                
                die;
            }
            mysqli_free_result($resultado);
            mysqli_close($conexion);
        }
        
        
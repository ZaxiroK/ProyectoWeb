<?php
    //include ('Usuario.php');
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
    //echo ("conexion realizada con exito");
   if(isset($_POST['submit'])){
            if($_POST['password'] != $_POST['passwordRepeat']){
                echo '<script>alert ("Las contraseñas no coinciden "); </script>';
                echo "<script> location.href=\"../Registrarse/GrandChallengeRegistro.php\" </script>";    
            }else{
            $userName = $_POST['userName'];
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $accountType = $_POST['accountType'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            //$existe = false;
            //validacion de si existe o no
            
            $select = "SELECT * FROM `usuario`";
            $validacionNombre = mysqli_query($conexion, $select);
                if(isset($validacionNombre)){
                    if ($validacionNombre->num_rows != 0) {
                           while ($fila = $validacionNombre->fetch_assoc()) {
                                if($userName == $fila['userName'] || $email == $fila['email']){ 
                                    echo '<script>alert ("El nombre de usuario o email ya esta en uso"); </script>';
                                    echo "<script> location.href=\"../Registrarse/GrandChallengeRegistro.php\" </script>";
                                    
                                    
                                } 
                            }
                    }
                }
                
            //if($existe == false){
            $insert = "INSERT INTO usuario(userName, name, lastName, email, accountType, gender, phone, password) 
            VALUES('$userName','$name','$lastName','$email','$accountType','$gender','$phone','$password')";
            
            $ejecutar = mysqli_query($conexion, $insert);

            if($ejecutar){
                echo '<script>alert ("Cuenta registrada con exito"); </script>';
                echo "<script> location.href=\"../PrincipalLogin/GrandChallengePrincipalLogin.php\" </script>";
                //"<h3>Cuenta registrada con exito</h3>";
                die;
                //parent.window.location.reload();
            }
        }
        }
    //}
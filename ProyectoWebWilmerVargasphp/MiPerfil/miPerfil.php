<?php 

session_start();

$ID = $_SESSION['ID'];

if(isset($_POST['edit'])){
    if($_POST['password'] != $_POST['passwordRepeat']){
        echo '<script>alert ("Las contraseñas no coinciden "); </script>';
        echo "<script> location.href=\"../MiPerfil/GrandChallengeMiPerfil.php\" </script>";
    }else{

    
     $userNameA = $_POST['userName'];
     $nameA = $_POST['name'];
     $lastNameA = $_POST['lastName'];
     $phoneA = $_POST['phone'];
     $passwordA = $_POST['password'];

     $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
     $select = "SELECT * FROM `usuario`";
     $validacionNombre = mysqli_query($conexion, $select);
         if(isset($validacionNombre)){
             if ($validacionNombre->num_rows != 0) {
                    while ($fila = $validacionNombre->fetch_assoc()) {
                         if($userNameA == $fila['userName']){ 
                             echo '<script>alert ("El nombre de usuario ya esta en uso"); </script>';  
                             echo "<script> location.href=\"../MiPerfil/GrandChallengeMiPerfil.php\" </script>";
                             die;
                             
                         } 
                     }
             }
    }

     $actualizar = "UPDATE usuario  SET userName = '$userNameA', name = '$nameA',  lastName = '$lastNameA'  ,  phone = '$phoneA' 
     ,password = '$passwordA'
     WHERE ID = $ID";
          
     $ejecutar = mysqli_query($conexion, $actualizar);
      

      if($ejecutar){
        echo '<script>alert ("Cuenta editada con exito"); </script>';
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
          
         
          
      }
    }
}
}



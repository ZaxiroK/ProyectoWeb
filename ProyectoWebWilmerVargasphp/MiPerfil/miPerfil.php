<?php 

session_start();

$ID = $_SESSION['ID'];
$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
if(isset($_POST['edit'])){
    //echo($ID);
    //die;
    //echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
     $userNameA = $_POST['userName'];
     $nameA = $_POST['name'];
     $lastNameA = $_POST['lastName'];
     $phoneA = $_POST['phone'];
     $passwordA = $_POST['password'];


     $select = "SELECT * FROM `usuario`";
     $validacionNombre = mysqli_query($conexion, $select);
         if(isset($validacionNombre)){
             if ($validacionNombre->num_rows != 0) {
                    while ($fila = $validacionNombre->fetch_assoc()) {
                         if($userNameA == $fila['userName']){ 
                             echo '<script>alert ("El nombre de usuario ya esta en uso"); </script>';  
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
          echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
          die;
          
      }
}


<?php 

session_start();


$canchaID =$_SESSION['canchaID'];

$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
if(isset($_POST['submit'])){

    $canchaName = $_POST['canchaName'];
    $canchaCategory = $_POST['category'];
    $canchaProvincia = $_POST['provincia'];
    $encargadoName = $_POST['encargadoName'];
    $canchaPhone = $_POST['phone'];
    $canchaCellphone = $_POST['cellphone'];
    
    
        
     $actualizar = "UPDATE cancha  SET canchaName = '$canchaName', canchaCategory = '$canchaCategory',  canchaProvincia = '$canchaProvincia' 
     ,  encargadoName = '$encargadoName',  canchaPhone = '$canchaPhone',  canchaCellphone = '$canchaCellphone'  
     WHERE canchaID = '$canchaID'";
          
     $ejecutar = mysqli_query($conexion, $actualizar);
      

      if($ejecutar){
          echo '<script>alert ("Cancha actualizada con exito"); </script>';
          echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
          die;
          
        }
    }



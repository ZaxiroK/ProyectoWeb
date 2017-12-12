<?php 

session_start();

$teamID = $_SESSION['teamID'];

$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
if(isset($_POST['editarEquipo'])){
    //var_dump($_POST['editarEquipo']);
    //echo($_POST['editarEquipo']);
    //die;
    
    $provincia = $_POST['provincia'];
    $category = $_POST["category"];
    $passwordTeam = $_POST["passwordTeam"];
    $passwordTeamRepeat = $_POST["passwordTeamRepeat"];
    
    if($passwordTeam != $passwordTeamRepeat){
        echo '<script>alert ("Las contraseñas no coinciden"); </script>'; 
        echo "<script> location.href=\"../EditarEquipo/GrandChallengeEditarEquipo.php\" </script>";
        die;
    }else{
        
     $actualizar = "UPDATE equipo  SET provincia = '$provincia', category = '$category',  passwordTeam = '$passwordTeam'   
     WHERE ID = '$teamID'";
          
     $ejecutar = mysqli_query($conexion, $actualizar);
      

      if($ejecutar){
          echo '<script>alert ("Datos de equipo actualizados con exito"); </script>';
          echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
          die;
          
        }
}   }


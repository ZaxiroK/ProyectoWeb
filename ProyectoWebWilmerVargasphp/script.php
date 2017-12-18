<?php


session_start();
error_reporting(0);
$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");

sacarEquipo();
enviarCorreoRecordatorio($_SESSION['recordatorioRetante']);
enviarCorreoRecordatorio($_SESSION['recordatorioContrincante']);



//session_destroy();





function sacarEquipo(){
$retoDay = new DateTime('today');
$retoDay->modify('+2 days');
$retoDay = $retoDay->format('Y-m-d') . PHP_EOL;
$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
        $consulta = "SELECT equipoRetante FROM `reto` WHERE estadoReto = 'aceptado' && retoDate = '$retoDay'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas= mysqli_num_rows($resultado);
           
        if ($filas > 0){
        if (isset($resultado))
        {
                $fila=$resultado->fetch_assoc();
                $team1 = $fila['equipoRetante'];
                $consulta2 = "SELECT player1,player2,player3,player4,player5 FROM `equipo` WHERE teamName = '$team1'";
                $resultado2 = mysqli_query($conexion, $consulta2);
                $filas2= mysqli_num_rows($resultado2);
                if ($filas2 > 0)
                {
                if (isset($resultado2))
                {
                    if ($resultado2->num_rows != 0){
                    $equipoRetante = array();
                    foreach($resultado2->fetch_assoc() as $equipo2){
                        
                        array_push($equipoRetante, $equipo2);
                        
                    }
                    $_SESSION['recordatorioContrincante'] = $equipoRetante;
                    
                    sacarEquipo2();
                    

                   
                }
            }  
        
        }
    }
}

}    
     
function sacarEquipo2(){
    $retoDay = new DateTime('today');
    $retoDay->modify('+2 days');
    $retoDay = $retoDay->format('Y-m-d') . PHP_EOL;
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
          $consulta = "SELECT equipoContrincante FROM `reto` WHERE estadoReto = 'aceptado' && retoDate = '$retoDay'"; ;
            $resultado = mysqli_query($conexion, $consulta);
            
            $filas= mysqli_num_rows($resultado);
            if ($filas > 0){
                
            if (isset($resultado))
            {
                    $fila=$resultado->fetch_assoc();
                    $team1 = $fila['equipoContrincante'];
                    $consulta2 = "SELECT player1,player2,player3,player4,player5 FROM `equipo` WHERE teamName = '$team1'";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    $filas2= mysqli_num_rows($resultado2);
                    if ($filas2 > 0)
                    {
                    if (isset($resultado2))
                    {
                        if ($resultado2->num_rows != 0){
                        $equipoContrincante = array();
                        foreach($resultado2->fetch_assoc() as $equipo2){
                            
                            array_push($equipoContrincante, $equipo2);
                            
                        }
                        $_SESSION['recordatorioRetante'] = $equipoContrincante;
                        
                        
    
                       
                    }
                }  
            
            }
        }
    }

}   

    function enviarCorreoRecordatorio($emails){
    $emailGrandChallenge = 'zaxirok@gmail.com';
    $asunto = "Recordatorio de reto";
    $carta = "De $emailGrandChallenge\n";
    $carta = "Le queremos recordar que su reto se realizar en tan solo 2 dias, por favor ser puntual gracias";

    //mail($emailGrandChallenge,"Recordatorio",$carta);
            foreach($emails as $email){
                //echo($email);
                //die;
                $destinatario = $email;
              if(mail('vvilmervd@gmail.com',$asunto,$carta,'From: zaxirok@gmail.com')){
                  
                header('Location:mensaje.html');
              }else{
                  echo("Hubieron problemas de configuracion al enviar el email");
              }
            
        } 
            
            
        
    }
        
    
       

        
?>
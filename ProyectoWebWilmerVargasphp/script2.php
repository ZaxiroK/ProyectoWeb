<?php



$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");

eliminarRetosJugados();


function eliminarRetosJugados(){

$conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
        $consulta = "SELECT * FROM `reto`";
        $resultado = mysqli_query($conexion, $consulta);
        $filas= mysqli_num_rows($resultado);
        $totalRetos=0;
        $retosEliminados=0;   
        $retosPorJugar=0; 
        if ($filas > 0){
        if (isset($resultado))
        {
                if ($resultado->num_rows != 0) {
                       while ($fila = $resultado->fetch_assoc()) {
                        $retoDate = $fila['retoDate'];
                        $retoID =  $fila['retoID']; 
                        //$retoDay = new DateTime('today');
                        //$retoDay = $retoDay->format('Y-m-d') . PHP_EOL;
                        
                        $fecha_actual = strtotime(date("Y-m-d "));
                        $fecha_entrada = strtotime($retoDate);
                        if($fecha_actual > $fecha_entrada){
                            $conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
                            $consulta= "DELETE FROM `reto` WHERE  retoID = '$retoID'";
                            $ejecutar = mysqli_query($conexion, $consulta);  
                            if($ejecutar){
                                $totalRetos++;
                                $retosEliminados++;   
                                
                            } 
                        }else{
                            $totalRetos++;
                            $retosPorJugar++;
                        }
                        
                            
                        }
                }
                

               
    }
} echo(" Total de Retos: $totalRetos\n Retos por jugar: $retosPorJugar\n Retos Eliminados: $retosEliminados " );

}    
     

        
    
       

        
?>
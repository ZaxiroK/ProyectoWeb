<?php 
$to = 'vvilmervd@gmail.com';
$subject = "Recordatorio de reto";
$message = "De zaxirok@gmail.com\n";
$message = "Le queremos recordar que su reto se realizar en tan solo 2 dias, por favor ser puntual gracias";
$header = "From: zax \r\n";
$header = "Cc:afgh@somedomain.com \r\n";
$header = "MIME-Version: 1.0 \r\n";
$header = "Content-type: text/html \r\n";

$work = mail($to,$subject,$message,$header);


if($work){
    header('Location:mensaje.html');
}else{
 echo("idk");
}
?>


    
       
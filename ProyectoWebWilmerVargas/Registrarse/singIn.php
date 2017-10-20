<?php
    $conexion = mysqli_connect("localhost", "root","","bdgrandchallenge") or die ("error de conexion");
    //echo ("conexion realizada con exito");
   if(isset($_POST['userName'])){
            $userName = $_POST['userName'];
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $accountType = $_POST['accountType'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $insert = "INSERT INTO usuario(userName, name, lastName, email, accountType, gender, phone, password ) 
            VALUES('$userName','$name','$lastName','$email','$accountType','$gender','$phone','$password')";
            
            $ejecutar = mysqli_query($conexion, $insert);

            if($ejecutar){
                echo "<h3>Registrada con exito</h3>";
            }
        }
  
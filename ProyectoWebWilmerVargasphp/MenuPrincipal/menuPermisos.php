<?php

SESSION_START();

$email = $_SESSION['email'];
if (isset($_GET['miPerfil']))
	{
	echo "<script> location.href=\"../MiPerfil/GrandChallengeMiPerfil.php\" </script>";
	}

	if (isset($_GET['unirseEquipo']))
	{
		permisosCuenta();
		if(permisosCuenta()=="u"){
			echo "<script> location.href=\"../UnirseEquipo/GrandChallengeUnirseEquipo.php\" </script>";
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo usuario para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
		}
	}

if (isset($_GET['miEquipo']))
	{
		permisosCuenta();
		if(permisosCuenta()=="u"){
			tieneEquipo();
			if(tieneEquipo() == true){
				listRetosAceptados();
				echo "<script> location.href=\"../MiEquipo/GrandChallengeMiEquipo.php\" </script>";
				die;
			}else{
				echo '<script>alert ("Aun no estas registrado en ningun equipo"); </script>';
				echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
				die;
			}
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo usuario para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
	}

		
		
		
	}

if (isset($_GET['editarEquipo']))
	{
		permisosCuenta();
		if(permisosCuenta()=="u"){
			tieneEquipo();
			if(tieneEquipo() == true){
		echo "<script> location.href=\"../EditarEquipo/GrandChallengeEditarEquipo.php\" </script>";
			}else{
				echo '<script>alert ("Aun no estas registrado en ningun equipo"); </script>';
				echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
				die;
			}
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo usuario para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
	}
	}

if (isset($_GET['crearEquipo']))
	{
		permisosCuenta();
		if(permisosCuenta()=="u"){
			echo "<script> location.href=\"../CrearEquipo/GrandChallengeCrearEquipo.php\" </script>";
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo usuario para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
	}
	}
	if (isset($_GET['registrarCancha']))
	{
		permisosCuenta();
		if(permisosCuenta()=="s"){
			tieneCancha();
			/*echo(tieneCancha());
			die;*/
			if(tieneCancha() == false){
				echo "<script> location.href=\"../RegistrarCancha/GrandChallengeRegistrarCancha.php\" </script>";
			}else{
				echo '<script>alert ("Solo se permite registrar una cancha por cuenta servicio"); </script>';
				echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
				die;
			}
			
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo servicio para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
	}
	}

	if (isset($_GET['editarCancha']))
	{
		permisosCuenta();
		if(permisosCuenta()=="s"){
			if(tieneCancha() == true){
				datosDeLaCancha();
				echo "<script> location.href=\"../EditarCancha/GrandChallengeEditarCancha.php\" </script>";
			}else{
				echo '<script>alert ("No hay ninguna cancha registrada con esta cuenta servicio"); </script>';
				echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
				die;
			}
			
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo servicio para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
	}
	}

	if(isset($_GET['grandChallenge'])){
		permisosCuenta();
		if(permisosCuenta()=="u"){
			tieneEquipo();
			if(tieneEquipo() == true){
				traerCanchas();
				misChallengesCreados();
				allRetosCreados();
				listRetosAceptados();
				misChallengesBuscando();
		echo "<script> location.href=\"../BuscarChallenge/GrandChallengeBuscar.php\" </script>";
			}else{
				echo '<script>alert ("Aun no estas registrado en ningun equipo"); </script>';
				echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
				die;
			}
		}else{
		echo '<script>alert ("Necesitas registrar una cuenta de tipo usuario para esta opcion"); </script>';
		echo "<script> location.href=\"../MenuPrincipal/GrandChallengeMenuPrincipal.php\" </script>";
		die;
	}
	}


	function tieneEquipo(){
		//SESSION_START();
		$email = $_SESSION['email'];
		
		$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
		$select = "SELECT * FROM `equipo`";
		$validacionTieneEquipo = mysqli_query($conexion, $select);
		/*var_dump($validacionTieneEquipo);
										die;*/
		if (isset($validacionTieneEquipo))
			{
			if ($validacionTieneEquipo->num_rows != 0)
				{
				while ($fila = $validacionTieneEquipo->fetch_assoc())
					{
					if ($email == $fila['player1'] || $email == $fila['player2'] || $email == $fila['player3'] || $email == $fila['player4'] || $email == $fila['player5'])
						{
						$email = $_SESSION['email'];
						$consulta = "SELECT * from equipo WHERE player1='$email' or player2='$email' or
										player3='$email' or player4='$email' or player5='$email'";
						$resultado = mysqli_query($conexion, $consulta);
						$filas = mysqli_num_rows($resultado);
						if ($filas > 0)
							{
							if (isset($resultado))
								{
								if ($resultado->num_rows != 0)
									{
									while ($fila = $resultado->fetch_assoc())
										{
										$_SESSION['teamID'] = $fila['ID'];
										$_SESSION['teamName'] = $fila['teamName'];
										$_SESSION['category'] = $fila['category'];
										$_SESSION['provincia'] = $fila['provincia'];
										$_SESSION['gender'] = $fila['gender'];
										$_SESSION['player1'] = $fila['player1'];
										$_SESSION['player2'] = $fila['player2'];
										$_SESSION['player3'] = $fila['player3'];
										$_SESSION['player4'] = $fila['player4'];
										$_SESSION['player5'] = $fila['player5'];
										$_SESSION['passwordTeam'] = $fila['passwordTeam'];
	
										/*var_dump($_SESSION);
										die;*/
										return true;
										}
									}   return false;
								}
							}
						}
					}
				}
				
			}
			
			}

			function tieneCancha(){
				//SESSION_START();
				$email = $_SESSION['email'];
				
				$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
				$select = "SELECT * FROM `cancha`";
				$validacionTieneCancha = mysqli_query($conexion, $select);
				/*var_dump($validacionTieneCancha);
												die;*/
				if (isset($validacionTieneCancha))
					{
					if ($validacionTieneCancha->num_rows != 0)
						{
						while ($fila = $validacionTieneCancha->fetch_assoc())
							{
							if ($email == $fila['personaQueRegistroCancha'])
								{
								/*echo($fila['personaQueRegistroCancha']);
								die;*/
								$email = $_SESSION['email'];
								$consulta = "SELECT * from cancha WHERE personaQueRegistroCancha='$email'";
								$resultado = mysqli_query($conexion, $consulta);
								$filas = mysqli_num_rows($resultado);
								if ($filas > 0)
									{
									if (isset($resultado))
										{
										if ($resultado->num_rows != 0)
											{
											while ($fila = $resultado->fetch_assoc())
												{
												$_SESSION['canchaID'] = $fila['canchaID'];
												$_SESSION['canchaName'] = $fila['canchaName'];
												$_SESSION['canchaEmail'] = $fila['canchaEmail'];
												$_SESSION['canchaCategory'] = $fila['canchaCategory'];
												$_SESSION['canchaProvincia'] = $fila['canchaProvincia'];
												$_SESSION['encargadoName'] = $fila['encargadoName'];
												$_SESSION['canchaPhone'] = $fila['canchaPhone'];
												$_SESSION['canchaCellphone'] = $fila['canchaCellphone'];
												$_SESSION['personaQueRegistroCancha'] = $fila['personaQueRegistroCancha'];
												/*var_dump($_SESSION);
												die;*/
												return true;
												}
											}   return false;
										}
									}
								}
							}
						}
						
					}
					
					}

		function permisosCuenta(){
			$account = $_SESSION['accountType'];
			if($account == "Cuenta usuario"){
				return "u";
			}else{
				
				return "s";
			}
		}

		function traerCanchas(){
			$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
			$select = "SELECT * FROM `cancha`";
			$validacionTieneCancha = mysqli_query($conexion, $select);
			/*var_dump($validacionTieneCancha);
											die;*/
			if (isset($validacionTieneCancha))
				{
				if ($validacionTieneCancha->num_rows != 0)
					{
					while ($fila = $validacionTieneCancha->fetch_assoc())
						{
						
							/*echo($fila['personaQueRegistroCancha']);
							die;*/
							
							$consulta = "SELECT * from cancha ";
							$resultado = mysqli_query($conexion, $consulta);
							$filas = mysqli_num_rows($resultado);
							if ($filas > 0)
								{
								if (isset($resultado))
									{
									if ($resultado->num_rows != 0){
										$canchas = array();
										foreach($resultado as $cancha){
										    /*var_dump($cancha);
											die;*/
											array_push($canchas, $cancha);
											
										}
										$_SESSION['canchas'] = $canchas;
										
				                        }
					
				}
			}
		}
	}
}
}

function misChallengesCreados(){
	
	$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
	$equipo = $_SESSION['teamName'];
	
	$consulta = "SELECT * FROM reto WHERE equipoRetante = '$equipo'";
	
	$resultado = mysqli_query($conexion, $consulta);
	$filas= mysqli_num_rows($resultado);
	if ($filas > 0)
	{
		
	if (isset($resultado))
	{
		if ($resultado->num_rows != 0){
			$misRetos = array();
			foreach($resultado as $reto){
				
				array_push($misRetos, $reto);
				
			}
				 $_SESSION['misRetos'] = $misRetos;
					
			}

	}
	}
}

function allRetosCreados(){
	$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
	$equipo = $_SESSION['teamName'];
	$consulta = "SELECT * FROM reto WHERE equipoRetante != '$equipo' && estadoReto = 'buscando'";
	$resultado = mysqli_query($conexion, $consulta);
	$filas= mysqli_num_rows($resultado);
	if ($filas > 0)
	{
	if (isset($resultado))
	{
		if ($resultado->num_rows != 0){
			$allRetos = array();
			foreach($resultado as $reto){
				
				array_push($allRetos, $reto);
				
			}
				 $_SESSION['allRetos'] = $allRetos;
					
			}

	}
	}
}


function listRetosAceptados(){
	$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
	$equipo = $_SESSION['teamName'];
	$consulta = "SELECT * FROM reto WHERE equipoRetante = '$equipo' && estadoReto = 'aceptado'|| equipoContrincante = '$equipo' && estadoReto = 'aceptado'";
	$resultado = mysqli_query($conexion, $consulta);
	$filas= mysqli_num_rows($resultado);
	if ($filas > 0)
	{
	if (isset($resultado))
	{
		if ($resultado->num_rows != 0){
			$listRetosAceptados = array();
			foreach($resultado as $reto){
				
				array_push($listRetosAceptados, $reto);
				
			}
				 $_SESSION['listRetosAceptados'] = $listRetosAceptados;
					
			}

	}
	}
}

function datosDeLaCancha(){
	$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
	$email = $_SESSION['email'];
	$consulta = "SELECT * FROM cancha WHERE personaQueRegistroCancha = '$email'";
	$resultado = mysqli_query($conexion, $consulta);
	$filas= mysqli_num_rows($resultado);
	if ($filas > 0)
	{
	if (isset($resultado))
	{
		if ($resultado->num_rows != 0){
			while ($fila = $resultado->fetch_assoc()) {
				SESSION_START();
				$_SESSION['canchaID'] = $fila['canchaID']; 
				$_SESSION['canchaName'] = $fila['canchaName']; 
				$_SESSION['canchaCategory'] = $fila['canchaCategory'];
				$_SESSION['canchaProvincia'] = $fila['canchaProvincia']; 
				$_SESSION['encargadoName'] = $fila['encargadoName']; 
				$_SESSION['canchaPhone'] = $fila['canchaPhone']; 
				$_SESSION['canchaCellphone'] = $fila['canchaCellphone']; 
				$_SESSION['personaQueRegistroCancha'] = $fila['personaQueRegistroCancha']; 
				$_SESSION['canchaEmail'] = $fila['canchaEmail']; 		
				
			}
					
			}

	}
	}
}
function misChallengesBuscando(){
	$conexion = mysqli_connect("localhost", "root", "", "bdgrandchallenge") or die("error de conexion");
	$equipo = $_SESSION['teamName'];
	$consulta = "SELECT * FROM reto WHERE equipoRetante = '$equipo' && estadoReto = 'buscando'";
	$resultado = mysqli_query($conexion, $consulta);
	$filas= mysqli_num_rows($resultado);
	if ($filas > 0)
	{
	if (isset($resultado))
	{
		if ($resultado->num_rows != 0){
			$misRetosBuscando = array();
			foreach($resultado as $reto){
				
				array_push($misRetosBuscando, $reto);
				
			}
				 $_SESSION['misRetosBuscando'] = $misRetosBuscando;
			
			}

	}
	}
}

?>
<?php
	
	session_start();

	if (isset($_POST['pedir'])) {

		if ((!isset($_SESSION['Registro'][$numped])) and (isset($_POST['Hamburguesas']) or isset($_POST['Bebidas']) or isset($_POST['Acompañantes']))) {

			$numped = $_POST['numped'];
 			$_SESSION['Incompleto'] = "True";	
 			$_SESSION['Registro'][$numped] = array(1 => $_POST['numped'], $_POST['Nombre']);	
 			$_SESSION['NumPed'] = $_POST['numped'] + 1;	

 		}else{
 			if (isset($_POST['Hamburguesas']) or isset($_POST['Bebidas']) or isset($_POST['Acompañantes'])) {

 				$numped = $_POST['numped'];
 				array_push($_SESSION['Registro'][$numped], $_SESSION['Registro'][$numped] = array(1 => $_POST['numped'], $_POST['Nombre']));
 				$_SESSION['NumPed'] = $_POST['numped'] + 1;
 				$_SESSION['Incompleto'] = "True";

 			}else{

 				$_SESSION['Incompleto'] = "False";

 			}
 			
 		}

 		if (isset($_POST['Hamburguesas'])) {

 			foreach ($_POST['Hamburguesas'] as $it) {

 				if (!isset($_SESSION['Registro'][$numped])) {

 					$_SESSION['Registro'][$numped] = array(1 => $it);

 				}else{
 					array_push($_SESSION['Registro'][$numped], $it);
 				}
 				
 			}
 			
 		}

 		if (isset($_POST['Bebidas'])) {

 			foreach ($_POST['Bebidas'] as $it) {

 				if (!isset($_SESSION['Registro'][$numped])) {

 					$_SESSION['Registro'][$numped] = array(1 => $it);

 				}else{
 					array_push($_SESSION['Registro'][$numped], $it);
 				}
 			}
 			
 		}

 		if (isset($_POST['Acompañantes'])) {

 			foreach ($_POST['Acompañantes'] as $it) {

 				if (!isset($_SESSION['Registro'][$numped])) {

 					$_SESSION['Registro'][$numped] = array(1 => $it);

 				}else{
 					array_push($_SESSION['Registro'][$numped], $it);
 				}
 			}
 			
 		}

 	}

		header("location: index.php");
 	
 	
 		
?>
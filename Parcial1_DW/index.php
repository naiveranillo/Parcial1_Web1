<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<div style="background: #2339B2; color: white; font-size: 1.3em; height: 54px;">
		<a class="navbar-brand" style="color:white;" href="index.php"><img src="imgburger.png" width="50" height="50"><b> Petrona Burger</b></a>
	</div>
	<br>
	<div class="box" style="border-radius: 10px;">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<head>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="style.css">
			<title>Realizar Pedido</title>
			<center><h1 style="font-weight: bold;">Crear Pedido</h1></center>
			<form action="guardar.php" method="post">
				<b>Numero de Pedido:</b> <input type="numb" name="numped" class="form-control" value=<?php  if (!isset($_SESSION['NumPed'])) { $_SESSION['NumPed'] = 1; echo $_SESSION['NumPed']; }else{ ;echo $_SESSION['NumPed']; }  ?> readonly>
				<b>Nombre:</b> <input type="text" name="Nombre" class="form-control" placeholder="Ingrese Nombre" required>
				<b>Hamburguesas:</b> <br>
				<div class="checkbox">
					<input type="checkbox" name="Hamburguesas[]" value="Mocana" id="mocana">
					<label for="mocana">Mocana</label><br>
					<input type="checkbox" name="Hamburguesas[]" value="Caribe" id="caribe">
					<label for="caribe">Caribe</label><br>
					<b>Bebidas:</b> <br>
					<input type="checkbox" name="Bebidas[]" value="Té" id="te">
					<label for="te">Té</label><br>
					<input type="checkbox" name="Bebidas[]" value="CocaCola" id="cocacola">
					<label for="cocacola">Coca Cola</label><br>
					<b>Acompañantes:</b> <br>
					<input type="checkbox" name="Acompañantes[]" value="Cascos de Papa" id="casco">
					<label for="casco">Cascos de Papa</label><br>
					<input type="checkbox" name="Acompañantes[]" value="Papas a la Francesa" id="francesa">
					<label for="francesa">Papas a la Francesa</label><br>
				</div><br>
				<center><div class="botones">
					<input type="submit" class="btn btn-dark" name="pedir" value="Realizar Pedido">
					<a href="listar.php" class="btn btn-dark">Lista de Pedidos</a>
					<input type="hidden" name="numped" value="<?php echo $_SESSION['NumPed'] ?>">	
				</div></center>
			</form>

		</head>
	</div>
	<p></p>
	<body style="background-image: url(fondo.png); background-size: cover;">
		<?php
		
	if (!isset($_SESSION['Incompleto'])) {
		
		$_SESSION['Incompleto'] = null;

	}

	if ($_SESSION['Incompleto'] == "False") {
		
		?>
			
			<div class="alert alert-danger box" role="alert" style="background: #E34C4C; color: #711414; border: 2px solid #711414; border-radius: 10px; padding: 12px">
	 			Seleccione minímo un menú.
			</div>
		<?php
		$_SESSION['Incompleto'] = null;
	}else{
		if ($_SESSION['Incompleto'] == "True") {

			?>	
				<div class="alert alert-success box" role="alert" style="background: #65E34C; color: #24800E; border: 2px solid #24800E; border-radius: 10px; padding: 12px">
 			 		¡Pedido Realizado!
				</div>
			<?php
			$_SESSION['Incompleto'] = null;
		}
	}

	if (isset($_SESSION['Lista'])) {
		if ($_SESSION['Lista'] == "False") {
			?>
				
				<div class="alert alert-success box" role="alert" style="background: #E7CE42; color: #8E7D1E; border: 2px solid #8E7D1E; border-radius: 10px; padding: 12px">
	 			 	No puede acceder. No hay Registros.
				</div>
			<?php
			unset($_SESSION['Lista']);
		}
	}

?>
	</body>
</html>





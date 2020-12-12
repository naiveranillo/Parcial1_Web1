<?php
session_start();
?>
<!DOCTYPE html>
<html>
<div style="background: #2339B2; color: white; font-size: 1.3em; height: 54px;">
	<a class="navbar-brand" style="color:white;" href="index.php"><img src="imgburger.png" width="50" height="50"><b> Petrona Burger</b></a>
</div>
	<head>
		<title>Lista de Pedidos</title>
	</head>
	<body style="background-image: url(fondo.png); background-size: cover;"">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<br>
		<div style="width:900px; margin: 0 auto; background-size: cover; background: white; border-radius: 10px;"><br>
			<center><a href="index.php" class="btn btn-dark" style="right: 20px;">Regresar</a></center>
			<center><h1 style="font-weight: bold;">Lista de Pedidos</h1></center><br>
			<?php
			
			if (isset($_SESSION['Registro'])) {
				$registro = array();
				$cont = 1;
				foreach ($_SESSION['Registro'] as $it) {
					
					$lim = count($it);

					for ($i=1; $i <= $lim; $i++) { 
						
						if (empty($registro)) {
							$registro = array($it[$i]);
						}else{
							array_push($registro, $it[$i]);
						}

					}

						$lim = count($registro);
						$i = 0;

							?>
						<center><table class="table table-bordered table-dark text-center" style="width:800px;">
							<thead>
								<tr>
									<th scope="col"  style="background: #435CE5; color: black; border: 2px solid black;">Número de Pedido</th>
									<th scope="col" style="background: #435CE5; color: black; border: 2px solid black;">Nombre</th>
									<th scope="col" style="background: #435CE5; color: black; border: 2px solid black;">Menú</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-secondary" style="color: black; border: 2px solid black;"><?php echo $registro[$i];  ?></td>
									<td class="table-secondary" style="color: black; border: 2px solid black;"><?php $i = $i + 1; echo $registro[$i]; ?></td>
									<td class="table-secondary" style="color: black; border: 2px solid black;"><?php
											$i = $i + 1; 
											while ( $i < $lim) 
											{ 
												if ($lim == 3) {
													echo $registro[$i]; 
												}else{
													if (($lim - 1) == $i) {
														echo "y ",$registro[$i];
													}else{
														if (($lim - 2) == $i) {
															echo $registro[$i]," ";
														}else{
															echo $registro[$i],", ";
														}
													}
												}
											 	$i = $i + 1;
											} 
											
										?>
									</td>
								</tr>
							</tbody>
						</table></center><br>


					<?php

					$registro = array();
				}
				$_SESSION['Lista'] = "True";
			}else{
				$_SESSION['Lista'] = "False";
				header("location: index.php");
			}
	

			?>
		</div>
	</body>
</html>


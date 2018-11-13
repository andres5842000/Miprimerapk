<?php 
	require('conexioncolectivos.php');
	#$sql= "select TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE()) AS edad, (TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())*TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())) as edad2 from empleado order by edad;";
	#___________________-SUMAS TABLAS- 1 Y 2______________________________#
	$sql= "SELECT sum(TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())) AS edad FROM EMPLEADO;";
	$result1 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result1) > 0) {
	$row1 = mysqli_fetch_assoc($result1);
	} else {
		echo "No se encontraron resultados || 0 results";
	}
	$sumafila1 = $row1['edad'];
	#____________________________________________________________________#
	#____________________________________________________________________#
	$sql= "SELECT sum(TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())*TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())) AS edad2 FROM EMPLEADO;";
	$result2 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result2) > 0) {
		$row2 = mysqli_fetch_assoc($result2);
	} else {
	    echo "No se encontraron resultados || 0 results";
	}	
	$sumafila2 = $row2['edad2'];

	#prom

	$sql= "select count(*) as resultado from EMPLEADO;";
	$numdatos = mysqli_query($conn, $sql);
	if (mysqli_num_rows($numdatos) > 0) {
	$numdaarr = mysqli_fetch_assoc($numdatos);
	} else {
	    echo "No se encontraron resultados || 0 results";
	}	
	$n = $numdaarr['resultado'];
	$prom = bcdiv($sumafila1, $n,0);
	#___________________-SUMAS TABLAS 3-______________________________#
	#se necesita promedio

	$sql= "select sum(power((TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE()))-$prom,3)) AS edad3 FROM EMPLEADO;";
	$result3 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result3) > 0) {
	$row3 = mysqli_fetch_assoc($result3);
	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	$sumafila3 = $row3['edad3'];




	#listar 3 fila

	$sql="select TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE()) AS edad1, power((TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())),2) as edad2, power((TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE()))-$prom,3) as edad3 from empleado order by edad1;";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mostrar Datos</title>
		<meta charset="utf-8" lang="es">
		<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style/estiloformulariocontabla.css">
	</head>
	<body>
	<form action="redirecmein.php" method="post">	
		<div class="divmeinsup" id="headermein">
			<ul class="navelislt">
				<li><a href="MenuPrincipaGerenteFroms.php">Inicio</a></li>
				<li><a href="InsertarForm.php">Insertar</a></li>
				<li><a href="VerForm.php">Ver</a></li>
				<li><a href="ModificarForm.php">Editar</a></li>
				<li><a href="BorrarForm.php">Eliminar</a></li>
				<li><a href="ConsultaFrom.php">Consultas</a>
					<ul>
						<li><a href="Consulta1edad.php">Consulta edad</a></li>
						<li><a href="Consulta2Estatura.php">Consulta estatura</a></li>
					</ul>
				</li>
				<li><a href="SupervisionForm.php">Supervisor</a></li>
				<li><a href="">Creditos</a>
					<ul>
						<li><a href="">Andres Coba</a></li>
						<li><a href="">Breiner Zapata</a></li>
						<li><a href="">Cristian Giraldo</a></li>
					</ul>
				</li>				
			</ul>	
		</div>
	</form>
	</body>
	</body>
	<body>
		<br><br>
		<h2 class="h2tittle">Consulta de Varianza y desviacion tipica [ Edad ]</h2>
		<div>
		<table class="cstable">
			<thead>
			<tr>
				<th>Edad</th>
				<th>Edad'2</th>
				<th>Edad'3</th>
			</tr>
			</thead>
				<?php 
				 for ($i=0; $i < $row ; $i++) { 
				 	echo "<tr>";				 		
				 		echo "<td>";
				 			echo $row['edad1'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['edad2'];
				 		echo "</td>";
				 		echo "<td>";				 		
				 			echo $row['edad3'];
				 		echo "</td>";
				 	echo "</tr>";

				 	$row = mysqli_fetch_assoc($result);//fin
				 }				 

					echo "<tr>";				 		
				 		echo "<td>";
				 			echo 'Resultado = '.$row1['edad'];				 			
				 		echo "</td>";
				 		echo "<td>";
				 			echo 'Resultado = '.$row2['edad2'];				 			
				 		echo "</td>";
				 		echo "<td>";
				 			echo 'Resultado = '.$row3['edad3'];				 			
				 		echo "</td>";
				 	echo "</tr>";

				?>
			</tr>
		</table>
		</div>
		<form class ="odresultados">
			<?php 
	#Promedio 
	#n
		
		echo 'El total de los datos es '.$n.'<br>';
		echo "La edad promedio es de: = $prom años<br>";

	#______________________________________________________	
		#varianza
		#varianza manual
		$varianza = bcdiv($sumafila2, $n, 2);
		$varianza = $varianza-($prom*$prom);
		$varianza = bcdiv($varianza, 1, 2);
		echo 'La varianza es de: = '.$varianza.' <br>';


	#______________________________________________________	

		#desviacion manual
		$desviacion = sqrt($varianza);
		$desviacion = bcdiv($desviacion, 1, 2);
		echo 'La desviacion es de: = '.$desviacion.'<br>';

		#______________________________________________________	
		#asimetria	
		$asimetria = $sumafila3;
		#echo "$asimetria <br>";
		$asimetriadiv = pow($desviacion, 3);	
		#echo "$asimetriadiv <br>";
		$asimetriadiv = $asimetriadiv*$n;
		#echo "$asimetriadiv <br>";
		$asimetria	 = bcdiv($asimetria, $asimetriadiv,2);
		#echo "$asimetria <br>";
		$asimetria = bcdiv($asimetria, 1, 2);
		echo 'La asimetria es de:  '.$asimetria.' <br>';
		if ($asimetria>0) {
			echo "Es un sesgo positvo";
		}
		else if ($asimetria==0) {
			echo "Es simetrico";
		}
		else if ($asimetria<0){
			echo "Es un sesgo negativo";
		}
	?>


		</form>
	</body>	
</html>

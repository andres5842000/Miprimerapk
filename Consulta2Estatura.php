<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}


?>

<?php 
	require('conexioncolectivos.php');
	#$sql= "select TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE()) AS edad, (TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())*TIMESTAMPDIFF(YEAR,fecha_naci,CURDATE())) as edad2 from empleado order by edad;";
	#___________________-SUMAS TABLAS- 1 Y 2______________________________#
	$sql= "select sum(estatura) as estatura1 from empleado;";
	$result1 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result1) > 0) {
	$row1 = mysqli_fetch_assoc($result1);
	} else {
		echo "No se encontraron resultados || 0 results";
	}
	$sumafila1 = $row1['estatura1'];
	$sumafila1 = bcdiv($sumafila1, 1, 2);
	#____________________________________________________________________#
	#____________________________________________________________________#
	$sql= "select sum(power(estatura,2)) as estatura2 from empleado";
	$result2 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result2) > 0) {
		$row2 = mysqli_fetch_assoc($result2);
	} else {
	    echo "No se encontraron resultados || 0 results";
	}	
	$sumafila2 = $row2['estatura2'];
	$sumafila2 = bcdiv($sumafila2, 1, 2);
	#____________________________________________________________________#
	#____________________________________________________________________#

	#prom

	$sql= "select count(*) as resultado from EMPLEADO;";
	$numdatos = mysqli_query($conn, $sql);
	if (mysqli_num_rows($numdatos) > 0) {
	$numdaarr = mysqli_fetch_assoc($numdatos);
	} else {
	    echo "No se encontraron resultados || 0 results";
	}	
	$n = $numdaarr['resultado'];
	$prom = bcdiv($sumafila1, $n,2);
	#___________________-SUMAS TABLAS 3-______________________________#
	#se necesita promedio

	$sql= "select sum(power(estatura-$prom,3)) AS estatura3 FROM EMPLEADO;";
	$result3 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result3) > 0) {
	$row3 = mysqli_fetch_assoc($result3);
	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	$sumafila3 = $row3['estatura3'];
	$sumafila3 = bcdiv($sumafila3, 1, 2);




	#listar 3 fila

	$sql="select estatura, round(power(estatura,2),2) as estatura2, round((power(estatura-$prom,3)),2) as estatura3 FROM EMPLEADO order by estatura;";
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
  <form action="" method="post"> 
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
          <li><a href="">Sesion</a>
          <ul>
            <li><a href=""><?php echo $_SESSION['NomUser']; ?></a></li>
            <li><a href=""><?php echo $_SESSION['Cargo']; ?></a></li>
            <li><a href="Logout.php">Cerrar Sesion</a></li>
          </ul>
        </li>       
      </ul> 
    </div>
  </form>
  </body>
	

	<body>
		<br><br><h2 class="h2tittle">Consulta de Varianza y desviacion tipica [ Estatura ]</h2>
		<div class="divtable" id="table1">
		<table class="cstable">
			<tr>
				<thead>
				<th>Estatura</th>
				<th>Estatura'2</th>
				<th>Estatura'3</th>
				</thead>
			</tr>				
				<?php 
				 for ($i=0; $i < $row ; $i++) { 
				 	echo "<tr>";				 		
				 		echo "<td>";
				 			echo $row['estatura'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['estatura2'];
				 		echo "</td>";
				 		echo "<td>";				 		
				 			echo $row['estatura3'];
				 		echo "</td>";
				 	echo "</tr>";

				 	$row = mysqli_fetch_assoc($result);//fin
				 }				 

					echo "<tr>";				 		
				 		echo "<td>";
				 			echo 'Resultado = '.$sumafila1;				 			
				 		echo "</td>";
				 		echo "<td>";
				 			echo 'Resultado = '.$sumafila2;				 			
				 		echo "</td>";
				 		echo "<td>";
				 			echo 'Resultado = '.$sumafila3;				 			
				 		echo "</td>";
				 	echo "</tr>";

				?>
			</tr>
		</table>
	</div>
	</body>
	<form class ="odresultados">
		<?php 
#Promedio 
#n
	
	echo 'El total de los datos es '.$n.'<br>';
	echo "La estarua  promedio es de: = $prom m<br>";

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

</html>


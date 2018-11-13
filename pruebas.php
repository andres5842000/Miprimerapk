<?php
#sumas

require('conexioncolectivos.php');
$cadenaArray = "";


	$sql= "select ROUND(sum(EMPLEADO.estatura),2) AS resultado from EMPLEADO;";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row2 = mysqli_fetch_assoc($result);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	echo $row2['resultado'];
	$sumafila1 = $row2['resultado'];
	#return $cadenaArray = implode(",", $row2);	
	#echo "El resultado es: $cadenaArray";

#________________________________________________________________________________
	#Promedio manual
	echo "<br>________________________________________________________________________________<br>";
	$sql= "select round(count(*),2) as resultado from EMPLEADO;";
	$numdatos = mysqli_query($conn, $sql);
	if (mysqli_num_rows($numdatos) > 0) {
		$numdaarr = mysqli_fetch_assoc($numdatos);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	echo 'El total de los datos es '.$numdaarr['resultado'].'<br>';
	$n = $numdaarr['resultado'];
	$prom = bcdiv($sumafila1, $n,2);

	echo "La media de edades es: = $prom<br>";



	#return $cadenaArray = implode(",", $row2);	
	#echo "El resultado es: $cadenaArray";

#________________________________________________________________________________


#Promedio
echo "<br>________________________________________________________________________________<br>";
$sql= "select ROUND(avg(EMPLEADO.estatura),2)  AS resultado from EMPLEADO;";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row2 = mysqli_fetch_assoc($result);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	echo $row2['resultado'];
#________________________________________________________________________________
#Varianza
echo "<br>________________________________________________________________________________<br>";
$sql= "select round(((sum(round(estatura*estatura,2))/count(*))-round(avg(round(estatura*estatura,2)),2)),2) as Varianza from EMPLEADO;";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row2 = mysqli_fetch_assoc($result);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	echo 'La varianza es de: = '.$row2['Varianza'];

#________________________________________________________________________________
#Desciacion
echo "<br>________________________________________________________________________________<br>";

	$sql= "select Sqrt(round(((sum(round(estatura*estatura,2))/count(*))-round(avg(round(estatura*estatura,2)),2)),2)) as Desviacion from EMPLEADO;";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row2 = mysqli_fetch_assoc($result);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	echo 'La desviacion es de: = '.$row2['Desviacion'].'<br>';


?>

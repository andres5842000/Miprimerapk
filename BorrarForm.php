<?php 
	require('conexioncolectivos.php');
	$sql= "call colectivobeta.auxEMPLEADO('0','1','1','1','1','1','1','vertodosedad');";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

	} else {
	    echo "No se encontraron resultados || 0 results";
	}
	$Cedula = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['Eliminar'])){
		  $Cedula = $_POST["Cedula"];
		  #$sql = "call colectivobeta.auxEMPLEADO('0000000001','n','n','n','n','1','0000-00-00','eliminar')";		  
		  $sql = "delete from EMPLEADO  where cedula_emp=$Cedula)";
		  echo "<br>La cedula es $Cedula<br>";
			if (mysqli_query($conn, $sql)) {
			    echo "El usuario identificado con la cedula: ".$Cedula." ha sido eliminado satisfactoriamente";
			} else {
			    echo "Ups!... Ocurrio un error, intentalo de nuevo " . mysqli_error($conn);
			}

			mysqli_close($conn);
		}
	}


	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mostrar Datos</title>
		<link rel="stylesheet" type="text/css" href="style/estilotabla.css">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  Cedula:<br>
		  <input type="number" value="<?php echo $Cedula;?>" name="Cedula">		  
		  <br>
		  <input type="reset" value="Limpiar">
		  <br><br>  
		  <input type="submit" value="Eliminar" name="Eliminar">
		  <br><br> 
		</form> 
	</head>
	<body>
		<h1>Mostrando datos desde la tabla empleados</h1>
		<table>
			<tr>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cargo</th>
				<th>Ciudad</th>
				<th>Estatura</th>
				<th>Fecha Nacimiento</th>
				<th>Edad Actual</th>
				<?php 
				 for ($i=0; $i < $row ; $i++) { 
				 	echo "<tr>";
				 		echo "<td>";
				 			echo $row['cedula_emp'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['nombre'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['apellido'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['cargo'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['ciudad'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['estatura'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['fecha_naci'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['EDAD_ACTUAL'];
				 		echo "</td>";
				 	echo "</tr>";

				 	$row = mysqli_fetch_assoc($result);
				 }
				?>
			</tr>
		</table>
		<form action="MenuPrincipaGerenteFroms.php" method="post">
		  <input type="submit" value="Menu principal" name="MenuVo">
		  <br><br>  
		</form> 

	</body>

</html>
<?php 
if(isset($_POST['Registrar'])){
echo "hola mundo cruel";
}

?>

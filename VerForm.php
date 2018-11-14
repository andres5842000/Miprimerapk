<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}


?>

<?php 
	require('conexioncolectivos.php');
	$sql= "call colectivobeta.auxEMPLEADO('0','1','1','1','1','1','1','vertodosedad');";
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
		<meta charset="utf-8" lang="es">
		<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style/estiloformulariocontabla.css">
		<title>Mostrar Datos</title>		
	</head>
	<body>


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
  
		</body>	
		<body>		
		<br><br>
		<h2 class="h2tittle">Mostrando datos desde la tabla empleados</h2>


		<div class="divtable" id="table1">
		<table class="cstable">
			<thead>
			<tr>				
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cargo</th>
				<th>Ciudad</th>
				<th>Estatura</th>
				<th>Fecha Nacimiento</th>
				<th>Edad Actual</th>
			</tr>
			</thead>
			<tr>
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
		</div>	

	</body>

</html>



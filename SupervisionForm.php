<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}


?>

<?php 
	require('conexioncolectivos.php');
	$sql= "select * from AUDITORIA_EMPLEADO;";
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


	<body><br>

		<h2 class="h2tittle">Mostrando datos desde la tabla empleados</h2>
		<div class="divtable" id="table1">
		<table class="cstable">
			<thead>
			<tr>
				<th>idregisto</th>
				<th>usuario</th>
				<th>fecha_mod</th>
				<th>cedula_emp</th>
				<th>nombre_ant</th>
				<th>apellido_ant</th>
				<th>cargo_ant</th>
				<th>ciudad_ant</th>
				<th>estatura_ant</th>
				<th>fecha_naci_ant</th>
				<th>nombre_new</th>
				<th>apellido_new</th>
				<th>cargo_new</th>
				<th>ciudad_new</th>
				<th>estatura_new</th>
				<th>fecha_naci_new</th>
				<th>proceso</th>
			</tr>
			</thead>
				<?php 
				 for ($i=0; $i < $row ; $i++) { 
				 	echo "<tr>";
				 		echo "<td>";
				 			echo $row['idregisto'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['usuario'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['fecha_mod'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['cedula_emp'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['nombre_ant'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['apellido_ant'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['cargo_ant'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['ciudad_ant'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['estatura_ant'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['fecha_naci_ant'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['nombre_new'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['apellido_new'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['cargo_new'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['ciudad_new'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['estatura_new'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['fecha_naci_new'];
				 		echo "</td>";
				 		echo "<td>";
				 			echo $row['proceso'];
				 		echo "</td>";
				 	echo "</tr>";

				 	$row = mysqli_fetch_assoc($result);
				 }
				?>			
		</table>
		</div>		

	</body>

</html>
<?php 
if(isset($_POST['Registrar'])){
echo "hola mundo cruel";
}

?>

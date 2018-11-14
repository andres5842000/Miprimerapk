<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}
?>

<?php 
	$actualizado = "";
	require('conexioncolectivos.php');
	$sql= "call colectivobeta.auxEMPLEADO('0','1','1','1','1','1','1','vertodosedad');";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

	} else {
	    $actualizado= "No se encontraron resultados || 0 results";
	}
	$Cedula = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['Eliminar'])){
		  $Cedula = $_POST["Cedula"];
		  #$sql = "call colectivobeta.auxEMPLEADO('0000000001','n','n','n','n','1','0000-00-00','eliminar')";		  
		  $sql = "delete from EMPLEADO  where cedula_emp=$Cedula)";
		  
			if (mysqli_query($conn, $sql)) {
			    $actualizado = "El usuario identificado con la cedula: ".$Cedula." ha sido eliminado satisfactoriamente";
			} else {
			    $actualizado = "Ups!... Ocurrio un error, intentalo de nuevo " . mysqli_error($conn);
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
	</head>
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
  <br>
<h2 class="h2tittlefueraform">Eliminar</h2>



  <form class ="idformmodifi" id="formeditar" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  Cedula:
		  <input class="txtinput2" type="number" value="<?php echo $Cedula;?>" name="Cedula">		  
		  <input class="btninput2" type="reset" value="Limpiar">
		  
		  <input class="btninput2" type="submit" value="Eliminar" name="Eliminar">
		  <br><br> 
		  <?php
		  	echo "$actualizado ";
		  ?>
		</form> 

<body>
		<h2 class="h2tittlefueraform">Mostrando datos desde la tabla empleados</h1>
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
			
		</table>
		</div>
		<form action="MenuPrincipaGerenteFroms.php" method="post">
		  <input type="submit" value="Menu principal" name="MenuVo">
		  <br><br>  
		</form> 

	</body>

</html>

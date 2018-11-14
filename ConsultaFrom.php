<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}
?>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['Consulta1'])){
		header("location: Consulta2Estatura.php");
	}
	else if(isset($_POST['Consulta2'])){
		header("location: Consulta1edad.php");
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mostrar Datos</title>
		<link rel="stylesheet" type="text/css" href="style/estilotabla.css">
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
		<h1>Consultas</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <br>   
		  <br>Ver las medidas de sesgo <br>  
		  <input type="submit" value="Estatura" name="Consulta1">
		  <br><br>  
		  <input type="submit" value="Edad" name="Consulta2">
		  <br><br>  

		</form> 



	</body>

</html>
<?php 

?>

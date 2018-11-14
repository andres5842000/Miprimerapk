<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}


?>

<?php 
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
    <meta charset="utf-8" lang="es">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/estiloformulariocontabla.css">
    <title>Insertar Datos</title>    
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

<br>
<h2 class="h2tittlefueraform">Insertar</h2>
<form <form class ="idformmodifi" id="formeditar" action="InsertarController.php" method="post">
  Cedula:<br>
  <input class="txtinput" type="number" name="Cedula" required>
  <br>
  Nombre:<br>
  <input class="txtinput" type="text" name="Nombre" required>
  <br>
  Apellido:<br>
  <input class="txtinput" type="text" name="Apellido" required>
  <br>
  Cargo:<br>
  <input class="txtinput" type="text" name="Cargo" required>
  <br>
  Ciudad:<br>
  <input class="txtinput" type="text" name="Ciudad" required>
  <br>
  Estatura en metros:<br>
  <input class="txtinput" type="number" min="0.83" max="2.0" step="0.01" name="Estatura" required>
  <br>
  Fecha de nacimiento:<br>
  <input class="txtinput" type="date" min="1900-01-01" max="2001-12-31" name="FechaNa" required>
  <br>  
  <input class="btninput" type="submit" value="Registrar" name="Registrar">
  <br><br> 
</form> 
</body>
</html>
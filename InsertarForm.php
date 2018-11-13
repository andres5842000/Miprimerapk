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
<body>

<h2>Insertar</h2>

<form action="InsertarController.php" method="post">
  Cedula:<br>
  <input type="number" name="Cedula" required>
  <br>
  Nombre:<br>
  <input type="text" name="Nombre" required>
  <br>
  Apellido:<br>
  <input type="text" name="Apellido" required>
  <br>
  Cargo:<br>
  <input type="text" name="Cargo" required>
  <br>
  Ciudad:<br>
  <input type="text" name="Ciudad" required>
  <br>
  Estatura en metros:<br>
  <input type="number" min="0.83" max="2.0" step="0.01" name="Estatura" required>
  <br>
  Fecha de nacimiento:<br>
  <input type="date" min="1900-01-01" max="2001-12-31" name="FechaNa" required>
  <br>



  <br> 
  <input type="reset" value="Limpiar">
  <br><br>  
  <input type="submit" value="Registrar" name="Registrar">
  <br><br> 
</form> 
<form action="MenuPrincipaGerenteFroms.php" method="post">
  <input type="submit" value="Menu principal" name="MenuVo">
  <br><br>  
</form> 


</body>
</html>
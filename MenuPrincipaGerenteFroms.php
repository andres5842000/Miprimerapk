<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>  
  <meta charset="utf-8">
  <title>Menu Principal</title>
  <link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style/estilomenuprincipal.css">
</head>
<body>
  <form action="MenuPrincipaGerenteControllers.php" method="post">
    <h2 class="h2tittle">Menu Principal gerente</h2>
  <header>
    <div class="contenerdor" id="div1">
      <img class="icon" src="style/pkgimagen/icono1.png">
      <input class="inputclass"  style="border:none" type="submit" value="Insertar" name="insertar">
    </div>
    <div class="contenerdor" id="div2">
      <img class="icon" src="style/pkgimagen/icono2.png">
      <input class="inputclass"  style="border:none" type="submit" value="Ver" name="Ver">
    </div>
    <div class="contenerdor" id="div3">
      <img  class="icon" src="style/pkgimagen/icono3.png">
      <input class="inputclass"  style="border:none" type="submit" value="Editar" name="Editar">
    </div>
    <div class="contenerdor" id="div4">
      <img class="icon"  src="style/pkgimagen/icono4.png">
      <input class="inputclass"  style="border:none" type="submit" value="Borrar" name="Borrar">
    </div>
    <div class="contenerdor" id="div5">
      <img class="icon" src="style/pkgimagen/icono5.png">
      <input class="inputclass"   style="border:none" type="submit" value="Consultas" name="Consultas">
    </div>
    <div class="contenerdor" id="div6">
      <img class="icon" src="style/pkgimagen/icono6.png">
      <input class="inputclass"  style="border:none"  type="submit" value="Supervision" name="Supervision">
    </div>
  </header>
  </form> 




</body>
</html>
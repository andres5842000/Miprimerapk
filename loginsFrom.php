<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="style/estilologin.css">
</head>
<body>
<form action="loginController.php" method="post">

	<h2 class="h2clas">Login</h2>
  
  <input class="txtinput" type="text" maxlength="20" name="Usuario" placeholder="Ingrese su usuario">
  <input class="txtinput" type="password" maxlength="20" name="Contraseña"placeholder="Ingrese su contraseña" >
  <input class="btninput" type="submit" value="Ingresar" name="Login">  
  <input class="btninput" type="submit" value="Registrar" name="Registrar">
  
</form> 


</body>
</html>
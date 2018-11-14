<?php 
require('conexioncolectivos.php');
$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['Login'])){			
	if(!empty($_POST))		
	{
		$userlog = $_POST['Usuario'];
		$password =$_POST['Contrasena'];
		$sql = "SELECT * FROM USUARIO WHERE id_user = '$userlog' AND contrasena = '$password'";
		$query = mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)>0){		
			$row = mysqli_fetch_assoc($query);
			session_start();		
			$_SESSION['NomUser']= $userlog;			
			$_SESSION['Cargo']= $row['rango'];	
			$_SESSION['Verificar']= true;		
			if ( $row['rango'] == 'Gerente') {
				header("location: MenuPrincipaGerenteFroms.php");
			}else echo "espere";			
				
		}$error = ' * Usuario o contraseña incorrectos * '	;
	}

}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="style/estilologin.css">
</head>
<body>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

	<h2 class="h2clas">Login</h2>
	<h3 class="h23las" id="h2id"><?php echo $error; ?></h3>
  
  <input class="txtinput" type="text" maxlength="20" name="Usuario" placeholder="Ingrese su usuario" required>
  <input class="txtinput" type="password" maxlength="20" name="Contrasena"placeholder="Ingrese su contraseña" required>
  <input class="btninput" type="submit" value="Ingresar" name="Login">  
  <input class="btninput" type="reset" value="Limpiar" name="Registrar">  
  
</form> 


</body>
</html>
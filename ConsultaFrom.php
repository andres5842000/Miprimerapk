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

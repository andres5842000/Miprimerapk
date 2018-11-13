<?php
require('conexioncolectivos.php');

if(isset($_POST['Registrar'])){

$Cedula = $_POST["Cedula"];
$Nombre  = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$Cargo = $_POST["Cargo"];
$Ciudad = $_POST["Ciudad"];
$Estatura = $_POST["Estatura"];
$FechaNa = $_POST["FechaNa"];
#Ingresamos los datos a la base de datos
$sql= "call colectivobeta.auxEMPLEADO('$Cedula','$Nombre','$Apellido','$Cargo','$Ciudad','$Estatura','$FechaNa','insertar')";
if (mysqli_query($conn,$sql)) {
	echo "Los datos se ingresaron correctamente <br>";
}else{
	echo "Ups! Ocurrio un error :(, ponte en contacto con servicio tecnico".$sql." <br>".mysqli_error($conn)." <br>";
}


}
else if(isset($_POST['MenuVo'])){
	header("location: indexprincipalgere.php");
}


?>
<!DOCTYPE html>
<html>
<body>
<form action="InsertarForm.php" method="post">
  <br> <br>
  <input type="submit" value="Volver">
</form>
</body>
</html>

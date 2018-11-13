<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colectivobeta";
#creamos la conexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
#revisamos la conexion
if (!$conn){
	die ("Conexión fallida, intentalo mas tarde :)".mysqli_connect_error()." <br>");
}
?>
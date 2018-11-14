<?php
require('conexioncolectivos.php');
	session_start();
	session_destroy();
	header("location: loginsFrom.php");

?>

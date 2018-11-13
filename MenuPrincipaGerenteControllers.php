<?php
require('conexioncolectivos.php');
if(isset($_POST['insertar'])){
	header("location: InsertarForm.php");
}
if(isset($_POST['Ver'])){		
	header("location: VerForm.php");
}
if(isset($_POST['Editar'])){		
	header("location: ModificarForm.php");
}
if(isset($_POST['Borrar'])){		
	header("location: BorrarForm.php");
}
if(isset($_POST['Consultas'])){		
	header("location: ConsultaFrom.php");
}
if(isset($_POST['Supervision'])){		
	header("location: SupervisionForm.php");
}


?>

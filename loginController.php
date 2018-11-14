<?php
require('conexioncolectivos.php');

if(isset($_POST['Registrar'])){


echo "en beta el boton registrar";	



}
#require("conexioncolectivo.php");
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
			if ( $row['rango'] == 'Gerente2') {
				header("location: MenuPrincipaGerenteFroms.php");
			}
			
				
		}	
	}

}

?>

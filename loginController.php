<?php
require('conexioncolectivos.php');

if(isset($_POST['Registrar'])){


echo "en beta el boton registrar";	



}
#require("conexioncolectivo.php");
if(isset($_POST['Login'])){		
	echo "dev ento al btn<br>";
	if(!empty($_POST))
		echo "entro al if empty <br>";
	{
		$userlog = $_POST['Usuario'];
		$password =$_POST['Contraseña'];
		$sql = "SELECT * FROM USUARIO WHERE id_user = '$userlog' AND contraseña = '$password'";
		$query = mysqli_query($conn,$sql);
		echo "Se realiza la consulta";
		if($query){//aqui esta el error,  no retorna nada
			echo "entra if query";
			if(mysqli_num_rows($query)>0){				
				if($userlog == $password){
					echo "$userlog = $password ";
					echo "salto a pagina";
					header("location: indexprincipalgere.php");
				}else{
					echo "ocurrio un error";
				}
			}
		}	
	}

}


?>

<?php 
session_start();
if (!$_SESSION['Verificar']) {#si la variable no es verdadera
  # code...
  header("location: loginsFrom.php");
}


?>


<?php  
require('conexioncolectivos.php');
$buttonlistaractive = false;
$Cedula = "";
$Nombre ="";
$Apellido = "";
$Cargo = "";
$Ciudad = "";
$Estatura = "";
$FechaNa = "";
$actualizado = "";
$row ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['Buscar'])){
  $Cedula = $_POST["Cedula"];
  #echo "El dato fue $Cedula<br>";
  $buttonlistaractive = true;
  $sql= "call colectivobeta.auxEMPLEADO('$Cedula','1','1','1','1','1','1','verespecificoedad');";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
      $Cedula = $row['cedula_emp'];
      $Nombre = $row['nombre'];
      $Apellido =  $row['apellido'];
      $Cargo =  $row['cargo'];
      $Ciudad =  $row['ciudad'];
      $Estatura =  $row['estatura'];
      $FechaNa =  $row['fecha_naci'];

  } else {
      $actualizado= "No se encontraron resultados || 0 results";
  }
}

if(isset($_POST['Modificar'])){
  $Cedula = $_POST["Cedula"];
  $Nombre = $_POST["Nombre"];
  $Apellido = $_POST["Apellido"];
  $Cargo = $_POST["Cargo"];
  $Ciudad = $_POST["Ciudad"];
  $Estatura = $_POST["Estatura"];
  $FechaNa = $_POST["FechaNa"];
  #$FechaNa = str_replace('/', '-', date('y-m-d',strtotime($FechaNa)));
  #echo "$FechaNa";    
    if (($Cedula != "")&&($Nombre != "")&&($Apellido != "")&&($Cargo != "")&&($Ciudad != "")&&($Estatura != "")&&($FechaNa != "")) {
    $sql = "call colectivobeta.auxEMPLEADO('$Cedula','$Nombre','$Apellido','$Cargo','$Ciudad','$Estatura','$FechaNa','editar')";
    #echo "entro 1 <br>";
    }
    else if (($Cedula != "")&&($Nombre != "")&&($Apellido != "")&&($Cargo != "")&&($Ciudad != "")){
    $sql = "update EMPLEADO set nombre =$Nombre , apellido =$Apellido , cargo =$Cargo ,ciudad =$Ciudad where cedula_emp=$Cedula;";     
    #echo "entro 2 <br>";
    }
    else if (($Cedula != "")&&($Nombre != "")&&($Apellido != "")){
    $sql = "update EMPLEADO set nombre =$Nombre , apellido =$Apellido  where cedula_emp=$Cedula;";   
    #echo "entro 3 <br>";
    }
    else if (($Cedula != "")&&($Cargo != "")&&($Ciudad != "")){
    $sql = "update EMPLEADO set cargo =$Cargo , ciudad =$Ciudad  where cedula_emp=$Cedula;";   
    #echo "entro 4 <br>";
    }
    else if (($Cedula != "")&&($Nombre != "")){
    $sql = "update EMPLEADO set nombre =$Nombre  where cedula_emp=$Cedula;";   
    #echo "entro 5 <br>";
    }
    else if (($Cedula != "")&&($Apellido != "")){
    $sql = "update EMPLEADO set apellido =$Apellido  where cedula_emp=$Cedula;";   
    #echo "entro 6 <br>";
    }
    else if (($Cedula != "")&&($Cargo != "")){
    $sql = "update EMPLEADO set cargo =$Cargo  where cedula_emp=$Cedula;";   
    #echo "entro 7 <br>";
    }
    else if (($Cedula != "")&&($Ciudad != "")){
    $sql = "update EMPLEADO set ciudad =$Ciudad  where cedula_emp=$Cedula;";   
    #echo "entro 8 <br>";
    }
    else if (($Cedula != "")&&($Estatura != "")){
    $sql = "update EMPLEADO set estatura =$Estatura  where cedula_emp=$Cedula;";   
    #echo "entro 9 <br>";
    }
    else if (($Cedula != "")&&($FechaNa != "")){
      #echo "entro 10 <br>";
    $sql = "update EMPLEADO set fecha_naci =$FechaNa  where cedula_emp=$Cedula;";   
    }    
  

  



  if (mysqli_query($conn, $sql)) {
      $actualizado = "Actualizado correctamente";
  } else {
      $actualizado ="Error al actualizar: " . mysqli_error($conn);
  }

  mysqli_close($conn);







}





}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mostrar Datos</title>
   <meta charset="utf-8" lang="es">
  <link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style/estiloformulariocontabla.css">
</head>
<body>
  <form action="" method="post"> 
    <div class="divmeinsup" id="headermein">
      <ul class="navelislt">
        <li><a href="MenuPrincipaGerenteFroms.php">Inicio</a></li>
        <li><a href="InsertarForm.php">Insertar</a></li>
        <li><a href="VerForm.php">Ver</a></li>
        <li><a href="ModificarForm.php">Editar</a></li>
        <li><a href="BorrarForm.php">Eliminar</a></li>
        <li><a href="ConsultaFrom.php">Consultas</a>
          <ul>
            <li><a href="Consulta1edad.php">Consulta edad</a></li>
            <li><a href="Consulta2Estatura.php">Consulta estatura</a></li>
          </ul>
        </li>
        <li><a href="SupervisionForm.php">Supervisor</a></li>        
        <li><a href="">Creditos</a>
          <ul>
            <li><a href="">Andres Coba</a></li>
            <li><a href="">Breiner Zapata</a></li>
            <li><a href="">Cristian Giraldo</a></li>
          </ul>
          <li><a href="">Sesion</a>
          <ul>
            <li><a href=""><?php echo $_SESSION['NomUser']; ?></a></li>
            <li><a href=""><?php echo $_SESSION['Cargo']; ?></a></li>
            <li><a href="Logout.php">Cerrar Sesion</a></li>
          </ul>
        </li>       
      </ul> 
    </div>
  </form>
  </body>

<body>
<br>
<h2 class="h2tittlefueraform">Modificar</h2>

<form class ="idformmodifi" id="formeditar" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  Cedula:<br>
  <input class="txtinput2" type="number" value="<?php echo $Cedula;?>" name="Cedula">
  <input class="btninput2" type="submit" value="Buscar" name="Buscar"><br> 

  
  
  Nombre:<br>
  <input class="txtinput" type="text" value="<?php echo $Nombre;?>" name="Nombre">
  <br>
  Apellido:<br>
  <input class="txtinput"type="text" value="<?php echo $Apellido;?>"name="Apellido">
  <br>
  Cargo:<br>
  <input class="txtinput"type="text" value="<?php echo $Cargo;?>"name="Cargo">
  <br>
  Ciudad:<br>
  <input class="txtinput" type="text" value="<?php echo $Ciudad;?>" name="Ciudad">
  <br>
  Estatura en metros:<br>
  <input class="txtinput" type="number" min="0.83" max="2.0" step="0.01" value="<?php echo $Estatura;?>" name="Estatura">
  <br>
  Fecha de nacimiento:<br>
  <input class="txtinput" type="date" min="1900-01-01" max="2001-12-31" name="FechaNa" value="<?php echo $FechaNa;?>">
  <br> 
  <input class="btninput" type="reset" value="Limpiar" name="Limpiar">  
  <input class="btninput" type="submit" value="Modificar" name="Modificar">
  <?php 
  echo "<br>$actualizado<br>";
  ?>     
</form> 
 <h2 class="h2tittle">Mostrando datos desde la tabla empleados</h2>
 <div class="divtable" id="table1">
    <table class="cstable">
      <thead>
      <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cargo</th>
        <th>Ciudad</th>
        <th>Estatura</th>
        <th>Fecha Nacimiento</th>
        <th>Edad Actual</th>
       </tr> 
      </thead>
        <?php 
        if ($buttonlistaractive == true) {
         for ($i=0; $i < $row ; $i++) { 
          echo "<tr>";
            echo "<td>";
              echo $row['cedula_emp'];
            echo "</td>";
            echo "<td>";
              echo $row['nombre'];
            echo "</td>";
            echo "<td>";
              echo $row['apellido'];
            echo "</td>";
            echo "<td>";
              echo $row['cargo'];
            echo "</td>";
            echo "<td>";
              echo $row['ciudad'];
            echo "</td>";
            echo "<td>";
              echo $row['estatura'];
            echo "</td>";
            echo "<td>";
              echo $row['fecha_naci'];
            echo "</td>";
            echo "<td>";
              echo $row['EDAD_ACTUAL'];
            echo "</td>";
          echo "</tr>";

          $row = mysqli_fetch_assoc($result);
         }
       }
        ?>      
    </table>
  </div>

</body>
</html>
<br><br><br><br><br><br><br><br>

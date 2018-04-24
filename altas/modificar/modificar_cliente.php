<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location: ../../index.html");
    }

?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="text/css" href="../../imagenes/brote.ico">
	<title>Clientes </title>
	<link rel="stylesheet" type="text/css" href="estilos.css">		<link rel="stylesheet" type="text/css" href="modificar/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#"> <img src="../../imagenes/pina.png"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../mostrar/tab_clientes.php"> Atrás</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../menu.php"> Menú</a>
  </li>
  
</ul>

<body>
<center>
<?php
$id_cliente=$_REQUEST['id_cliente'];

include("conexion.php");
$query="SELECT * FROM clientes WHERE id_cliente='$id_cliente'";
$resultado=$conexion->query($query);
$row=$resultado->fetch_assoc();
	?>
	<form   action="upd_cliente.php?id_cliente=<?php echo $row['id_cliente'];?>" method="POST" class="form-register"  >
	<h2 class="form-titulo">Modificar Cliente </h2>
	<div class="contenedor-inputs">
	<input type="text" REQUIRED pattern="{1,30}" title="Nombre demaciado largo" 
	name="nombre" placeholder="Nombre.. " value="<?php echo $row['nombre'];?>" class="input-100">
		<input type="text" REQUIRED pattern="{0,15}"  title="apellido demaciado largo"
		name="apellidoP" placeholder="Apellido Paterno" value="<?php echo $row['ape_p'];?>" class="input-100">
		<input type="text" REQUIRED pattern="{0,15}"  title="apeliido demaciado largo"
		name="apellidoM" placeholder="Apellido Materno ..." value="<?php echo $row['ape_m'];?>" class="input-100">
		<input type="text" REQUIRED pattern="[0-9_-]{1,10}" title="el numero no debe ser meyor a 10 numeros"  name="telefono"
		placeholder="&#128241; Telefono 283..." value="<?php echo $row['telefono'];?>" class="input-50">
		<input type="submit" value="Modificar" class="btn-enviar">
	</div>
	</form>
</center>
</body>
</html>

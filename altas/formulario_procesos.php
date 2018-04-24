<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location: ../index.html");
    }

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="text/css" href="../imagenes/brote.ico">
	<title> Nuevo Procesos </title>
	<link rel="stylesheet" type="text/css" href="modificar/estilos.css">
		<link rel="stylesheet" type="text/css" href="modificar/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>

<?php
$id_sector=$_REQUEST['id_sector'];
include("conexion.php");
$query="SELECT * FROM sector WHERE id_sector='$id_sector'";
$resultado3=$conexion->query($query);
$row=$resultado3->fetch_assoc();
	?>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="../mostrar/tab_pro.php?id_sector=<?php echo $row['id_sector'];?>"> Atrás </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../menu.php"> Menú </a>
      </li>

      </ul>

      </div>
   <a class="navbar-brand" href="#"> <img src="../imagenes/pina.png"> </a>
       
      </nav>
<body>
<center>


<?php
$id_sector=$_REQUEST['id_sector'];
include("conexion.php");
$query="SELECT * FROM sector WHERE id_sector='$id_sector'";
$resultado3=$conexion->query($query);
$row=$resultado3->fetch_assoc();
	?>
	<form  action="guardar_procesos.php?id_sector=<?php echo $row['id_sector'];?>" method="POST"  class="form-register">
	<h2 class="form-titulo"> Nuevo Poceso </h2>
	<div class="contenedor-inputs">
		<input type="Date" REQUIRED name="fecha" value="" placeholder="fecha" class="input-50">

        <select id="concepto" name="concepto" class="input-50" REQUIRED>
<option value="Compra Material"> Compra material</option>
<option value="Ralla Semanal"> Ralla Semanal </option>

</select>

		<input type="text" pattern="{0,200}" name="Descriopcion" placeholder="Descriopcion..." value="" class="input-100">
<input type="text" REQUIERED pattern="{1,6}" name="Costo" placeholder="$..." value="" class="input-50">
	
		<input type="submit" value="ACEPTAR" class="btn-enviar">

		</div>
	</form>
</center>
</body>
</html>

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
	<title> Nuevo Procesos </title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="modificar/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<?php
$id_procesos=$_REQUEST['id_procesos'];
include("conexion.php"); 
$query="SELECT * FROM procesos WHERE id_procesos='$id_procesos'";
$resultado3=$conexion->query($query);
$row=$resultado3->fetch_assoc();
	?>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#"> <img src="../../imagenes/pina.png"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../mostrar/tab_pro.php?id_sector=<?php echo $row['id_sector'];?>"> Atrás  </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../menu.html"> Menu</a>
  </li>
  
</ul>

<body>
<center>

<?php
$id_procesos=$_REQUEST['id_procesos'];
include("conexion.php");
$query="SELECT * FROM procesos WHERE id_procesos='$id_procesos'";
$resultado3=$conexion->query($query);
$row2=$resultado3->fetch_assoc();
	?>
	<form  action="upd_procesos.php?id_procesos=<?php echo $row2['id_procesos'];?>" method="POST"  class="form-register">
	<h2 class="form-titulo"> Modificar Proceso </h2>
	<div class="contenedor-inputs">
		<input type="Date" REQUIRED name="fecha" value="<?php echo $row2['fecha'];?>" placeholder="fecha" class="input-50">

        <select id="concepto" name="concepto" class="input-50" REQUIRED>
<option value="Compra Material"> Compra material</option>
<option value="Ralla Semanal"> Ralla Semanal </option>

</select>

		<input type="text" pattern="{0,200}" name="Descriopcion" placeholder="Descriopcion..." value="<?php echo $row2['material'];?>" class="input-100">
<input type="text" REQUIERED pattern="{1,6}" name="Costo" placeholder="$..." value="<?php echo $row2['costo_total'];?>" class="input-50">
	
		<input type="submit" value="ACEPTAR" class="btn-enviar">

		</div>
	</form>
</center>
</body>
</html>
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
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<?php
include("conexion.php");
$id=$_REQUEST['id_ventas'];
$sql="SELECT * FROM ventas WHERE id_ventas='$id'";
$resultado2=$conexion->query($sql);
$row=$resultado2->fetch_assoc();

?>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#"> <img src="../../imagenes/pina.png"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../mostrar/tab_ventas.php?id_sector=<?php echo $row['id_sector'];?>"> Atrás </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../menu.php"> Menú</a>
  </li>
  
</ul>

<body>
<center>
<?php
include ("conexion.php");
$query="SELECT * FROM clientes";
$resultado = $conexion->query($query);
?>
<?php
$id_ventas=$_REQUEST['id_ventas'];
include("conexion.php");
$query="SELECT * FROM ventas WHERE id_ventas='$id_ventas'";
$resultado3=$conexion->query($query);
$row=$resultado3->fetch_assoc();
?>
	<form  action="upd_venta.php?id_ventas=<?php echo $row['id_ventas'];?>"  method="POST" class="form-register"  >
<h2 class="form-titulo">Venta </h2>
	<div class="contenedor-inputs">
  <input type="date" REQUIRED name="fecha" placeholder="F. Venta 0000-00-00" value="<?php echo $row['fecha'];?>" class="input-50">
		<select REQUIRED id="actividad" name="cliente"  class="input-50">
<?php
 $is=$row['id_cliente'];
$query="SELECT * FROM clientes WHERE id_cliente='$is'";
$resultado4 = $conexion->query($query);
$row4=$resultado4->fetch_assoc();
?>
<option value="<?php echo $row['id_cliente'];?>"> <?php echo $row4['nombre'];?></option>
<?php  WHILE($row2=$resultado->fetch_assoc()) {?>
<option value="<?php echo $row['id_cliente'];?>"><?php echo $row2['nombre'];?></option>
<?php } ?>
</select>
		<input type="text" REQUIRED name="descripcion" placeholder="Descripcion..." value="<?php echo $row['descripcion'];?>" class="input-100">
		<input type="text" REQUIRED name="cantidadProducto" placeholder="Cantidad en Tonelada " value="<?php echo $row['cantidadProducto'];?>" class="input-50">
      <input type="text" REQUIRED name="Costo" placeholder="Costo por Tonelada " value="<?php echo $row['Costo'];?>" class="input-50">
    <select REQUIRED id="estado" name="estado"  class="input-50">
<option value="0"> Pagada </option>
<option value="1"> Credito</option>
</select>
		<input type="submit" value="Modificar" class="btn-enviar">
	</form>
</center>
</body>
</html>

<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location:../../index.html");
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="text/css" href="../../imagenes/brote.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<title>Adeudos</title>
	<style>
table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: left;
    padding: 4px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
    border-top-left-radius: 7px;
 	border-top-right-radius: 7px;
 	border-bottom: 5px solid  #4E94AB;
}
</style>
</head>
<body text="teal" >
<?php 
include ("../conexion.php");
$id_cliente=$_REQUEST['id_cliente'];
$query="SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
$resultado=$conexion->query($query);
while ($row=$resultado->fetch_assoc()) {
?>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Clientes </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="../tab_cliente_venta.php?id_cliente=<?php echo $row['id_cliente']; ?>"> Atrás </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../menu.php"> Menu </a>
      </li>
      </ul>
      <ul class="navbar-nav ml-auto">
    
      </ul>
      </div>
      </nav>
      
<center>
<font color="red"><h2 >Adeudos de <?php echo $row['nombre'] ?> <?php echo $row['ape_p'] ?></h2></font>
</center>
<?php   
include ("../conexion.php");

$id_cliente=$_REQUEST['id_cliente'];
$ct=0;
$esta="1";
$q= $_POST['nombre'];
//$sql="SELECT * FROM ventas WHERE id_cliente = '$id_cliente' and estado='$esta'";
$sql="SELECT * FROM ventas WHERE 
    id_cliente = $id_cliente AND LIKE '%".$q."%' OR
    encargadoSec LIKE '%".$q."%' OR
    nombreSector LIKE '%".$q."%' OR
    descripcion LIKE '%".$q."%'";
$resultado2=$conexion->query($sql);
while ($row=$resultado2->fetch_assoc())
{

  if($esta==0)
  {

  }else
  {
    if($id_cliente==$row['id_cliente'])
{
$ct=$ct+$row['costoT'];
}
}
}
?>
<font color="deepskyblue"><i>La deuda es de $ <?php echo number_format($ct,2);?></i></font>

<center>
<?php

}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-auto">
        <div class="nauk-info-connections">
        <table class="table-responsive" >
       
<thead>
			<tr>


			</tr>
		</thead>
	<tbody>
	<tr>
		<th>fecha</th>
    <th>Sector</th> 
    <th>Encargado</th> 
		<th>Descripcion</th>
		<th>Cantidad</th>
    <th>Precio </th>
    <th>Total </th>
    <th></th>
      <?php
		
include ("../conexion.php");
$id_cliente=$_REQUEST['id_cliente'];
$esta="1";
$q= $_POST['nombre'];
//$sql="SELECT * FROM ventas WHERE id_cliente = '$id_cliente' and estado='$esta'";
$sql="SELECT * FROM ventas WHERE 
    id_cliente LIKE '%".$q."%' OR
    encargadoSec LIKE '%".$q."%' OR
    nombreSector LIKE '%".$q."%' OR
    descripcion LIKE '%".$q."%'";
$resultado2=$conexion->query($sql);
while ($row=$resultado2->fetch_assoc())
{
  if($esta==0)
  {

  }else
  {
    if($id_cliente==$row['id_cliente'])
{




  $ton=$row['cantidadProducto'];
  $cos=$row['Costo'];
  $cosT=$row['costoT'];
  $date=date_create($row['fecha']);
?>
<tr>
	<td><?php echo date_format($date,'d-m-y');?></td>
  <td><?php echo $row['nombreSector'];?></td>
  <td><?php echo $row['encargadoSec'];?></td>
	<td><?php echo $row['descripcion'];?></td>
	<td><?php echo number_format($ton,2);?></td>
  <td><?php echo number_format($cos,2);?></td>
  <td><?php echo number_format($cosT,2);?></td>
	<?php
		if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	if($_SESSION['tipo_usuario']=="2")
	{

	?>
	<td><a href="../eliminar/modificar_cliente.php?id_ventas=<?php echo $row['id_ventas']; ?>"> <img src="../../imagenes/efectivo.png"></a></td>
<?php 
}
}
}
 ?>

</tr>
<?php 
}

	mysqli_close($conexion);
 ?>
</tbody>
</table>
        </div>
        </div>
        </div>
        </div>
</center>

</body>
</html>
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
	<title>Clientes</title>
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
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Clientes </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="../tab_clientes.php"> Atrás </a>
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
<font color="red"><h2 >Clientes</h2></font>


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
  <?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


  if($_SESSION['tipo_usuario']=="2")
  {

  ?>
    <th colspan="2"><b></b></th>
    <?php
}
  ?>
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Numero</th>	<?php
		if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	if($_SESSION['tipo_usuario']=="2")
	{

	?>
		<th ><b></b></th>
		<?php
}
	?>
	</tr>
<?php 
include ("../conexion.php");
$q= $_POST['nombre'];
//$query="SELECT * FROM clientes ORDER BY clientes . id_cliente DESC";
$query="SELECT * FROM clientes WHERE 
    id_cliente LIKE '%".$q."%' OR
    nombre LIKE '%".$q."%' OR
    ape_p LIKE '%".$q."%'OR
    ape_m LIKE '%".$q."%'";
$resultado=$conexion->query($query);
while ($row=$resultado->fetch_assoc()) {
?>


<tr>
  <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


  if($_SESSION['tipo_usuario']=="2")
  {

  ?>
  <td><a href="../eliminar/eliminar_clientes.php?id_cliente=<?php echo $row['id_cliente']; ?>"><img src="../../imagenes/det.png"></a></td>
  <td><a href="../../altas/modificar/modificar_cliente.php?id_cliente=<?php echo $row['id_cliente']; ?>"> <img src="../../imagenes/ajustes1.png"></a></td>
<?php 
}
 ?>
	<td><?php echo $row['nombre'];?></td>
	<td><?php echo $row['ape_p'];?></td>
	<td><?php echo $row['ape_m'];?></td>
	<td><?php echo $row['telefono'];?></td>
	<?php
		if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	if($_SESSION['tipo_usuario']=="2")
	{

	?>
	<td><a href="../tab_cliente_venta.php?id_cliente=<?php echo $row['id_cliente']; ?>"><img src="../../imagenes/sale.png"></a></td>
	
<?php 
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
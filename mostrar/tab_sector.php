<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location: ../index.html");
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="text/css" href="../imagenes/brote.ico">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<title>Sectores</title>
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
  <a class="navbar-brand" href="#">Sectores </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="../menu.php"> Atrás </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../altas/formulario_sector.php"> Añadir Nuevo Sector  </a>
      </li>
     
      </ul>

      <ul class="navbar-nav ml-auto">
      <form action="buscar/tab_sector.php" method="POST"  class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" REQUIRED name="nombre" placeholder="Search">
      <button class="btn btn-secondary" type="submit">Buscar</button>
    </form>
     <li class="nav-item">
        <a class="nav-link" href="PDF/pdf_sector.php"> Generar PDF  </a>
      </li>
      </ul>
      </div>
      </nav>
<center>
<font color="red"><h2 >Sectores Sembrados</h2></font>

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
	<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    	if($_SESSION['tipo_usuario']=="2")
	{

	?>
		<th colspan="2"><b></b></th>
		<?php
}?>
		<th>Nombre</th>
		<th>Encargado </th>
		<th>Hectareas</th>			
		<?php
		


	if($_SESSION['tipo_usuario']=="2")
	{

	?>
		<th colspan="2"><b></b></th>
		<?php
}else
{?>
	<th colspan="1"><b></b></th><?php
}
	?>
	</tr>
<?php 
include ("conexion.php");
$query="SELECT * FROM sector  WHERE estado=0 ORDER BY sector . id_sector DESC";
$resultado=$conexion->query($query);
while ($row=$resultado->fetch_assoc()) {
?>

<tr>
<?php
	if($_SESSION['tipo_usuario']=="2")
	{

	?>


	<td><a href="cambio_sector.php?id_sector=<?php echo $row['id_sector']; ?>"><img src="../imagenes/pina2.png"></a></td>

	<td><a href="eliminar/eliminar_sector.php?id_sector=<?php echo $row['id_sector']; ?>"><img src="../imagenes/det.png"></a></td>

	<?php
}
	$numero=$row['hectareas'];
	?>
	<td><?php echo $row['nombreSector'];?></td>
	<td><?php echo $row['nombreEncargado'];?></td>
	<td><?php echo number_format($numero,1);?></td>
		<?php
	if($_SESSION['tipo_usuario']=="2")
	{

	?>
	<td><a href="../altas/modificar/modificar_sector.php?id_sector=<?php echo $row['id_sector']; ?>" > <img src="../imagenes/ajustes1.png"></a></td>
	<?php
}
	?>
	<td  method="POST" ><a href="tab_pro.php?id_sector=<?php echo $row['id_sector']; ?>">  <img src="../imagenes/granja27.png"></a></td>
	
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




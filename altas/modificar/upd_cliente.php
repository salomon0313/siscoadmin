<?php 
include ("conexion.php");
$id=$_REQUEST['id_cliente'];

$nombre= $_POST['nombre'];
$ap= $_POST['apellidoP'];
$am= $_POST['apellidoM'];
$telefono= $_POST['telefono'];

$query="UPDATE clientes SET nombre='$nombre',ape_p='$ap',ape_m='$am',telefono='$telefono' WHERE id_cliente='$id' ";

$resultado=$conexion->query($query);
if($resultado) {
header("location: ../../mostrar/tab_clientes.php");
}
else{
	echo "insercion no exitosa";
}
 ?>
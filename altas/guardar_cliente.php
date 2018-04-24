<?php
include("conexion.php");

$nombre= $_POST['nombre'];
$ap= $_POST['apellidoP'];
$am= $_POST['apellidoM'];
$telefono= $_POST['telefono'];

$query="INSERT INTO clientes(nombre,ape_p,ape_m,telefono)VALUES('$nombre','$ap','$am','$telefono')";

$resultado=$conexion->query($query);
if($resultado){
	header("location: ../mostrar/tab_clientes.php");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?> 


<?php
include("conexion.php");

$nombre= $_POST['nombre'];
$hec= $_POST['numero'];
$nombreEn= $_POST['nombreEncargado'];
$hect= $_POST['hectarea'];
$cosTo= $_POST['costo'];
$estado=1;
$query="INSERT INTO sector(nombreSector,nombreEncargado,hectareas,estado,costoT)VALUES('$nombre','$nombreEn','$hec','$estado','$cosTo')";

$resultado=$conexion->query($query);
if($resultado){
	header("location: ../mostrar/tab_inventas.php");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?> 

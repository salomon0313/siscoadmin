<?php
include("conexion.php");

$nombre= $_POST['nombre'];
$hec= $_POST['numero'];
$nombreEn= $_POST['nombreEncargado'];
$hect= $_POST['hectarea'];
$costHect=$hect*$hec;
$cosTo=$costHect;

$query="INSERT INTO sector(nombreSector,nombreEncargado,hectareas,costH,costoT)VALUES('$nombre','$nombreEn','$hec','$hect','$cosTo')";

$resultado=$conexion->query($query);
if($resultado){
	header("location: ../mostrar/tab_sector.php");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?> 

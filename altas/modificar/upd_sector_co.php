<?php 
include ("conexion.php");
$id=$_REQUEST['id_sector'];

$nombre= $_POST['nombre'];
$cos= $_POST['costo'];
$nombreEn= $_POST['nombreEncargado'];
$hect= $_POST['numero'];

$query="UPDATE sector SET nombreSector='$nombre',nombreEncargado='$nombreEn',hectareas='$hect',costoT='$cos' WHERE id_sector='$id' ";

$resultado=$conexion->query($query);
if($resultado) {
header("location: ../../mostrar/tab_sector_pro.php");
}
else{
	echo "insercion no exitosa";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?>
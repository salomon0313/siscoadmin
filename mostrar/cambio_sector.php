<?php 
include ("conexion.php");
$id=$_REQUEST['id_sector'];

$estado=1;

$query="UPDATE sector SET estado='$estado' WHERE id_sector='$id' ";

$resultado=$conexion->query($query);
if($resultado) {
header("location: tab_sector.php");
}
else{
	echo "insercion no exitosa";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?>
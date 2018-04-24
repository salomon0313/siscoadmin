<?php 
include ("conexion.php");
$id=$_REQUEST['id_sector'];

$nombre= $_POST['nombre'];
$numero= $_POST['numero'];
$estado=$_POST['estado'];
$nombreEn= $_POST['nombreEncargado'];
$hect= $_POST['hectarea'];
$cosTo=$hect*$numero;

$sql4="SELECT * FROM sector WHERE id_sector='$id'";
$resultado8=$conexion->query($sql4);
$row8=$resultado8->fetch_assoc();
$costoA=$row8['costoT'];
$hec=$row8['hectareas'];
$costHec=$row8['costH'];
$costoHxCH=$hec*$costHec;
$costN=$costoA-$costoHxCH;
$costoTN=$costN+$cosTo;
$query="UPDATE sector SET nombreSector='$nombre',nombreEncargado='$nombreEn',hectareas='$numero',costH='$hect',estado='$estado',costoT='$costoTN' WHERE id_sector='$id' ";

$resultado=$conexion->query($query);
if($resultado) {
header("location: ../../mostrar/tab_sector.php");
}
else{
	echo "insercion no exitosa";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?>
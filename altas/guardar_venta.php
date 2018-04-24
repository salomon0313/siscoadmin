<?php
include("conexion.php");
$sector=$_REQUEST['id_sector'];
$clien= $_POST['cliente'];
$fec= $_POST['fecha'];
$des= $_POST['descripcion'];
$cant= $_POST['cantidadProducto'];
$cos= $_POST['Costo'];

$sql9="SELECT * FROM sector WHERE id_sector='$sector'";
$resultado9=$conexion->query($sql9);
$row9=$resultado9->fetch_assoc();
$ventas=$row9['venta'];
$nombreSector=$row9['nombreSector'];
$encargado=$row9['nombreEncargado'];
$costo=$cos*$cant;
$ventaN=$ventas+$costo;

$sql7="SELECT * FROM clientes WHERE id_cliente='$clien'";
$resultado7=$conexion->query($sql7);
$row7=$resultado7->fetch_assoc();
$nomclie=$row7['nombre'];

$query1="UPDATE sector SET venta='$ventaN' WHERE id_sector='$sector' ";

$resultado2=$conexion->query($query1);

$est= $_POST['estado'];



$query="INSERT INTO ventas(id_sector,nombreSector,encargadoSec,fecha,id_cliente,nombreCliente,descripcion,cantidadProducto,Costo,costoT,estado)VALUES('$sector','$nombreSector','$encargado','$fec','$clien','$nomclie','$des','$cant','$cos','$costo','$est')";

$resultado=$conexion->query($query);
if($resultado){
	header("location: ../mostrar/tab_ventas.php?id_sector=$sector>");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?> 
<?php
include("conexion.php");
$id=$_REQUEST['id_ventas'];
$clien= $_POST['cliente'];
$fec= $_POST['fecha'];
$des= $_POST['descripcion'];
$cant= $_POST['cantidadProducto'];
$cos= $_POST['Costo'];
$costoN=$cos*$cant;
	$sql="SELECT * FROM ventas WHERE id_ventas='$id'";
$resultado2=$conexion->query($sql);
$row=$resultado2->fetch_assoc();
$sector=$row['id_sector'];

$costVA=$row['costoT'];//costo total de venta realizada

$sql9="SELECT * FROM sector WHERE id_sector='$sector'";
$resultado9=$conexion->query($sql9);
$row9=$resultado9->fetch_assoc();
$ventaSe=$row9['venta'];//costo de lo vendido del sector
$AneriorV=$ventaSe-$costVA;
$ventaN=$AneriorV+$costoN;
$nombreSector=$row9['nombreSector'];
$encargado=$row9['nombreEncargado'];

$sql7="SELECT * FROM clientes WHERE id_cliente='$clien'";
$resultado7=$conexion->query($sql7);
$row7=$resultado7->fetch_assoc();
$nomclie=$row7['nombre'];

$query1="UPDATE sector SET venta='$ventaN' WHERE id_sector='$sector' ";

$resultado2=$conexion->query($query1);

$est= $_POST['estado'];


$query="UPDATE ventas SET  fecha='$fec',id_cliente='$clien',nombreCliente='$nomclie',descripcion='$des',cantidadProducto='$cant',Costo='$cos',costoT='$costoN',estado= '$est' WHERE id_ventas='$id'";


$resultado=$conexion->query($query);
if($resultado){
	header("location: ../../mostrar/tab_ventas.php?id_sector=$sector>");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
mysqli_free_result($resultado2);
	mysqli_close($conexion);
 ?> 

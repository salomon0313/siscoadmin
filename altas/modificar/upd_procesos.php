<?php 
include("conexion.php");
$id=$_REQUEST['id_procesos'];
$fec= $_POST['fecha'];
$sql9="SELECT * FROM procesos WHERE id_procesos='$id'";
$resultado9=$conexion->query($sql9);
$row9=$resultado9->fetch_assoc();
$sector=$row9['id_sector'];
$des= $_POST['Descriopcion'];
$con= $_POST['concepto'];
$cos=$_POST['Costo'];

$sql4="SELECT * FROM sector WHERE id_sector='$sector'";
$resultado8=$conexion->query($sql4);
$row8=$resultado8->fetch_assoc();
$costoSector=$row8['costoT'];
$sql5="SELECT * FROM procesos WHERE id_procesos='$id'";
$resultado5=$conexion->query($sql5);
$row5=$resultado5->fetch_assoc();
$costopro=$row5['costo_total'];

$costoResta=$costoSector-$costopro;


$query7="UPDATE sector SET costoT='$costoResta'WHERE id_sector='$sector' ";
$resultado=$conexion->query($query7);


$costo=$cos+$costoM;
$query="UPDATE procesos SET fecha='$fec',concepto='$con',material='$des',costo_total='$costo' WHERE id_procesos='$id' ";

$resultado=$conexion->query($query);
if($resultado){
	$sql9="SELECT * FROM procesos WHERE id_procesos='$id'";
$resultado9=$conexion->query($sql9);
$row9=$resultado9->fetch_assoc();
$sector=$row9['id_sector'];

$sql4="SELECT * FROM sector WHERE id_sector='$sector'";
$resultado8=$conexion->query($sql4);
$row8=$resultado8->fetch_assoc();
$costoSector=$row8['costoT'];
$costoSuma=$costo+$costoSector;

$query2="UPDATE sector SET costoT='$costoSuma'WHERE id_sector='$sector' ";
$resultado=$conexion->query($query2);
	$sql="SELECT * FROM procesos WHERE id_procesos='$id'";
$resultado4=$conexion->query($sql);
$row8=$resultado4->fetch_assoc();
$id_sector=$row8['id_sector'];
	header("location: ../../mostrar/tab_pro.php?id_sector= $id_sector");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
	mysqli_free_result($resultado2);
	mysqli_free_result($resultado3);
	mysqli_close($conexion);
 ?>
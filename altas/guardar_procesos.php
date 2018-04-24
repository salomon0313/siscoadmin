<?php
include("conexion.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$sector=$_REQUEST['id_sector'];

$fec=$_POST['fecha'];

$con= $_POST['concepto'];
$des= $_POST['Descriopcion'];
$cost= $_POST['Costo'];



$query="INSERT INTO procesos(id_sector,fecha,concepto,material,costo_total)VALUES('$sector','$fec','$con','$des','$cost')";

$resultado=$conexion->query($query);
if($resultado){
$sql4="SELECT * FROM sector WHERE id_sector='$sector'";
$resultado4=$conexion->query($sql4);
$row4=$resultado4->fetch_assoc();
$costoSector=$row4['costoT'];
$costoSuma=$cost+$costoSector;

$query2="UPDATE sector SET costoT='$costoSuma'WHERE id_sector='$sector' ";
$resultado=$conexion->query($query2);

	header("location: ../mostrar/tab_pro.php?id_sector=$sector>");

}else{
	echo "error insercion";
}
mysqli_free_result($resultado);
	mysqli_free_result($resultado4);
	mysqli_close($conexion);
 ?> 
<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location: ../../index.html");
    }

?><?php
include("../conexion.php");
$id=$_REQUEST['id_procesos'];

$id=$_REQUEST['id_procesos'];
$fec= $_POST['fecha'];
$sql9="SELECT * FROM procesos WHERE id_procesos='$id'";
$resultado9=$conexion->query($sql9);
$row9=$resultado9->fetch_assoc();
$sector=$row9['id_sector'];


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

$sql="SELECT * FROM procesos WHERE id_procesos = '$id'";
$resultado2=$conexion->query($sql);
while ($row=$resultado2->fetch_assoc()) {
	$pro=$row['id_sector'];
}
$query="DELETE FROM procesos WHERE id_procesos='$id' ";

$resultado=$conexion->query($query);
if ($resultado){
	header("location: ../tab_pro.php?id_sector=$pro");

}

else{
	echo "insercion no exitosa";
}

	mysqli_free_result($resultado);
	mysqli_free_result($resultado2);
	mysqli_close($conexion);
?>
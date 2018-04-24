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
$id=$_REQUEST['id_ventas'];

$sql="SELECT * FROM ventas WHERE id_ventas = '$id'";
$resultado2=$conexion->query($sql);
while ($row=$resultado2->fetch_assoc()) {
	$pro=$row['id_sector'];
  $ven=$row['costoT'];
}
$sql5="SELECT * FROM sector WHERE id_sector='$pro'";
$resultado5=$conexion->query($sql5);
$row5=$resultado5->fetch_assoc();
$ventasA=$row5['venta'];


$ventaN=$ventasA-$ven;
$query1="UPDATE sector SET venta='$ventaN' WHERE id_sector ='$pro'";
$resultado3=$conexion->query($query1);

$query="DELETE FROM ventas WHERE id_ventas='$id' ";

$resultado=$conexion->query($query);
if ($resultado){
	header("location: ../tab_ventas.php?id_sector=$pro");

}

else{
	echo "insercion no exitosa";
}

	mysqli_free_result($resultado);
	mysqli_free_result($resultado2);
	mysqli_close($conexion);
?>
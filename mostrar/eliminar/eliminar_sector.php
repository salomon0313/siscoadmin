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
$id=$_REQUEST['id_sector'];

$query="DELETE FROM sector WHERE id_sector='$id' ";

$resultado=$conexion->query($query);
if ($resultado ){
$sql="SELECT * FROM procesos WHERE id_sector='$id'";
$resultado2=$conexion->query($sql);
while ($row=$resultado2->fetch_assoc()) {
$D=$row['id_sector'];
$query2="DELETE FROM procesos WHERE id_sector='$D'";
$resultado3=$conexion->query($query2);
}
if($resultado)
{
header("location: ../tab_sector.php");
}
}
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
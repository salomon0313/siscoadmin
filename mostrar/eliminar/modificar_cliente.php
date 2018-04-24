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
include ("../conexion.php");
$id=$_REQUEST['id_ventas'];

$est="0";
$query="UPDATE ventas SET estado='$est' WHERE id_ventas='$id' ";

$resultado=$conexion->query($query);
if($resultado) {
header("location: ../../mostrar/tab_clientes.php");
}
else{
	echo "insercion no exitosa";
}
 ?>
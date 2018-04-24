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
$id=$_REQUEST['id_cliente'];

$query="DELETE FROM clientes WHERE id_cliente='$id' ";

$resultado=$conexion->query($query);
if ($resultado){
	header("location: ../tab_clientes.php");

}

else{
	echo "insercion no exitosa";
}
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
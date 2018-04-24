<?php 
include ("conexion.php");
$id=$_REQUEST['id'];

$nom=$_POST['nomb'];
$ape=$_POST['aP'];
$ape2=$_POST['aM'];
$tel=$_POST['tel'];
$pass= $_POST['pas'];
$pass2=$_POST['pas2'];

 if($pass==$pass2)
 {
 	$query="UPDATE usuarios SET nombre='$nom',apellido='$ape',apellido_m='$ape2',numero='$tel',pass='$pass' WHERE id='$id' ";

$resultado=$conexion->query($query);
if($resultado) {
header("location: ../../mostrar/tab_usu.php");
}
else{
	echo "insercion no exitosa";
}
}
mysqli_free_result($resultado);
	mysqli_close($conexion);
 ?>
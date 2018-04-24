<?php 
include ("conexion2.php");
$sql="SELECT * FROM usuarios";
$datos=mysqli_query($con,$sql);

$nom=$_POST['nomb'];
$ape=$_POST['aP'];
$tel=$_POST['tel'];
$us= $_POST['id'];
$pass= $_POST['pas'];
$pass2=$_POST['pas2'];
$tip=$_POST['tipo'];

 if($pass==$pass2)
 {
 	while ($renglon=mysqli_fetch_array($datos)) {
	echo "<tr>";
	//echo "<td>" . $renglon['id'] . "</td>" ;
	//echo "<td>" . $renglon['pass'] . "</td>" ;
	if($renglon['id']==$us   )
	{
		echo "error";
		$decicion ="error";
		//header("location:conexion.php");
	}else
	{
		$decicion="bien ";
		//header("location:indexE.html");


	}
 }
}else
{
	$decicion="error";
}
if($decicion=="error")
{
	echo "error 85";
}else
{

	
		include("conexion.php");
		$query="INSERT INTO usuarios(id,nombre,apellido,numero,pass,privilegio)VALUES('$us','$nom','$ape','$tel','$pass','$tip')";

$resultado=$conexion->query($query);
if($resultado){
	header("location: ../mostrar/tab_usu.php");

}else{
	echo "error insercion";
	header("location: formulario_usu.php");
}
}


mysqli_free_result($resultado);
	mysqli_close($conexion);



 ?>
<?php 
session_start();
include ("conexion.php");
//$sql="SELECT * FROM usuarios";
//$datos=mysqli_query($con,$sql);
$us= $_POST['id'];
$pass= $_POST['pas'];
$consulta="SELECT * FROM usuarios WHERE id ='$us' and pass='$pass'";
$resultado=mysqli_query($con,$consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0)
{
		$query="SELECT * FROM usuarios WHERE id ='$us' ";
$resultado2=$con->query($query);
while ($row=$resultado2->fetch_assoc()) 
{
$privilegio=$row['privilegio'];
$_SESSION['id_usuario']=$us;
$_SESSION['tipo_usuario']=$privilegio;
}


		header("location:menu.php");
	}else
	{
		echo "USUARIO O CONTRASEÑA INVALIDAD ";
		header("location:indexE.html");

	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);
/*
while ($renglon=mysqli_fetch_array($datos)) {
	echo "<tr>";
	//echo "<td>" . $renglon['id'] . "</td>" ;
	//echo "<td>" . $renglon['pass'] . "</td>" ;
	if($renglon['id']==$us && $renglon['pass']==$pass )
	{
		header("location:menu.html");
	}else
	{
		echo "USUARIO O CONTRASEÑA INVALIDAD ";
		header("location:indexE.html");

	}
	echo "</tr>";
}



*/


 ?>
<?php 
include ("conexion.php");
$sql="SELECT * FROM procesos WHERE id_sector = '2'";
$datos=mysqli_query($con,$sql);
echo "<table border ='2'>";
echo "<th>id</th><th>Sector</th><th>Fecha</th><th>Actividas</th><th>Numero Personal</th><th>Matricula</th><th>Material</th><th>Costo Material</th><th>Costo Total</th>";
while ($renglon=mysqli_fetch_array($datos)) {
	echo "<tr>";
	echo "<td>" . $renglon['id_procesos'] . "</td>" ;
	echo "<td>" . $renglon['id_sector'] . "</td>" ;
	echo "<td>" . $renglon['fecha'] . "</td>" ;
	echo "<td>" . $renglon['id_act'] . "</td>" ;
	echo "<td>" . $renglon['num_per'] . "</td>" ;
	echo "<td>" . $renglon['matricula'] . "</td>" ;
	echo "<td>" . $renglon['material'] . "</td>" ;
	echo "<td>" . $renglon['cost_mat'] . "</td>" ;
	echo "<td>" . $renglon['costo_total'] . "</td>" ;
	echo "</tr>";
}
echo "</table>";
 ?>
<?php
	include ("../conexion.php");
	$id_cliente=$_REQUEST['id_cliente'];
	$esta=1;
$query="SELECT * FROM ventas WHERE id_cliente = '$id_cliente' and estado='$esta'";
$resultado=$conexion->query($query);

	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('jhsm');
	$pdf->SetTitle("Cliente");
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	$query2="SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
$resultado2=$conexion->query($query2);
while ($row2=$resultado2->fetch_assoc()) {
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'."Adeudos de ".$row2['nombre']." ".$row2['ape_p'] ."".'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#4CAF50" >
		<th>fecha</th>
    <th>Sector</th> 
    <th>Encargado</th> 
		<th>Descripcion</th>
		<th>Cantidad</th>
    <th>Precio </th>
    <th>Total </th>
            
          </tr>
        </thead>
	';
		}
	
	while ($row=$resultado->fetch_assoc()) {
		 $ton=$row['cantidadProducto'];
  $cos=$row['Costo'];
  $cosT=$row['costoT'];
  $date=date_create($row['fecha']);
	$content .= '
		<tr >
			<td>'.date_format($date,'d-m-y').'</td>
            <td>'.$row['nombreSector'].'</td>
            <td>'.$row['encargadoSec'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td>'.number_format($ton,2).'</td>
            <td>'.number_format($cos,2).'</td>
            <td>'.number_format($cosT,2).'</td>
        </tr>
	';
	}
	$ct=0;
$esta="1";
$sql="SELECT * FROM ventas WHERE id_cliente = '$id_cliente' and estado='$esta'";
$resultado2=$conexion->query($sql);
while ($row=$resultado2->fetch_assoc())
{
$ct=$ct+$row['costoT'];

}
$content .= '<h3  style="">'."El Adeudo es de  ".number_format($ct,2)."".'</h3>';
	
	$content .= '</table>';
	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');


?>
<?php
	include ("../conexion.php");
$id_sector=$_REQUEST['id_sector'];
$query="SELECT * FROM procesos WHERE id_sector = '$id_sector' ORDER BY procesos . fecha DESC";
$resultado=$conexion->query($query);

	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('jhsm');
	$pdf->SetTitle("procesos");
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	$query2="SELECT * FROM sector WHERE id_sector = '$id_sector'";
$resultado2=$conexion->query($query2);
while ($row2=$resultado2->fetch_assoc()) {
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'."procesos del Sector ".$row2['nombreSector']."".'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#4CAF50" >
		<th>Fecha</th>
		<th>Concepto </th>
		<th>Material</th>
        <th>Costo Total</th>
            
          </tr>
        </thead>
	';
	
	
	while ($row=$resultado->fetch_assoc()) { 
		$date=date_create($row['fecha']);
		 $numero=$row['costo_total'];
	$content .= '
		<tr >
            <td>'.date_format($date,'d-m-y').'</td>
            <td>'.$row['concepto'].'</td>
            <td>'.$row['material'].'</td>
            <td>'. number_format($numero,2).'</td>

        </tr>
	';
	}
	$cosT=$row2['costoT'];
	$content .= '<h3  style="">'."Costo de la Produccion ".number_format($cosT,2)."".'</h3>';
	}
	$content .= '</table>';
	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');


?>
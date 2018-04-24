<?php
	include ("../conexion.php");
$query="SELECT * FROM sector WHERE estado = '1'  ORDER BY sector . id_sector DESC";
$resultado=$conexion->query($query);

	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('jhsm');
	$pdf->SetTitle("Sectores en Cosecha");
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'."Sectores en Cosecha".'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#4CAF50" >
		<th>Nombre</th>
		<th>Encargado </th>
		<th>Hectareas</th>
        <th>Costo de Produccion</th>
        <th>Ventas del Sector</th>
            
          </tr>
        </thead>
	';
	
	
	while ($row=$resultado->fetch_assoc()) { 
		$numero=$row['costoT'];
		$numero2=$row['venta'];
		$numero3=$row['hectareas'];
	$content .= '
		<tr >
            <td>'.$row['nombreSector'].'</td>
            <td>'.$row['nombreEncargado'].'</td>
            <td>'.number_format($numero3,1).'</td>
			 <td>'.number_format($numero,2).'</td>
            <td>'.number_format($numero2,2).'</td>

        </tr>
	';
	}
	
	$content .= '</table>';
	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');


?>
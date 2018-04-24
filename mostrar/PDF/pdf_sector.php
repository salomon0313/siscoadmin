<?php
	include ("../conexion.php");
$query="SELECT * FROM sector ORDER BY sector . id_sector DESC";
$resultado=$conexion->query($query);

	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('jhsm');
	$pdf->SetTitle("Sectores");
	
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
            	<h1 style="text-align:center;">'."sectores".'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#4CAF50" >
		<th>Nombre</th>
		<th>Encargado </th>
		<th>Hectareas</th>
		<th>Estado</th>
        <th>Costo Total</th>
            
          </tr>
        </thead>
	';
	
	
	while ($row=$resultado->fetch_assoc()) {
	$estatus=$row['estado']; 
	if($estatus==0)
	{
		$estatus="Produccion";
	}else
	{
		$estatus="Cosecha";
	}
	$content .= '
		<tr >
            <td>'.$row['nombreSector'].'</td>
            <td>'.$row['nombreEncargado'].'</td>
            <td>'.$row['hectareas'].'</td>
            <td>'.$estatus.'</td>
            <td>'.$row['costoT'].'</td>

        </tr>
	';
	}
	
	$content .= '</table>';
	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');


?>
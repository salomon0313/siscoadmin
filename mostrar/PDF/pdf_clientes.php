<?php
	include ("../conexion.php");
$query="SELECT * FROM clientes ORDER BY clientes . id_cliente DESC";
$resultado=$conexion->query($query);

	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('jhsm');
	$pdf->SetTitle("Clientes");
	
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
            	<h1 style="text-align:center;">'."Clientes ".'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#4CAF50" >
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Numero</th>
            
          </tr>
        </thead>
	';
		
	
	while ($row=$resultado->fetch_assoc()) {
	$content .= '
		<tr >
            <td>'.$row['nombre'].'</td>
            <td>'.$row['ape_p'].'</td>
            <td>'.$row['ape_m'].'</td>
            <td>'.$row['telefono'].'</td>

        </tr>
	';
	}

	
	$content .= '</table>';
	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');


?>
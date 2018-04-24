<?php
	include ("../conexion.php");
$id_sector=$_REQUEST['id_sector'];
$query="SELECT * FROM ventas WHERE id_sector = '$id_sector' ";
$resultado=$conexion->query($query);

	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('jhsm');
	$pdf->SetTitle("Ventas");
	
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
            	<h1 style="text-align:center;">'."Ventas del Sector ".$row2['nombreSector']."".'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#4CAF50" >
		<th>Fecha</th>
		<th>Cliente  </th>
		<th>Descripcion</th>
		<th>Toneladas</th>
        <th>Precio Toneladas</th>
        <th>Precio de Venta </th>  
        <th>Eestado </th>    
          </tr>
        </thead>
	';

	while ($row=$resultado->fetch_assoc()) {
		$date=date_create($row['fecha']);
			$estatus=$row['estado']; 
	if($estatus==0)
	{
		$estatus="Credito";
	}else
	{
		$estatus="Pagado";
	}
	$ton=$row['cantidadProducto'];
	$cost=$row['Costo'];
	$cosT=$row['costoT'];
	$content .= '
		<tr >
		 <td>'.date_format($date,'d-m-y').'</td>
		 <td>'.$row['nombreCliente'].'</td>
		 <td>'.$row['descripcion'].'</td>
		 <td>'.number_format($ton,2).'</td>
            <td>'.number_format($cost,2).'</td>
            <td>'.number_format($cosT,2).'</td>
            <td>'.$estatus.'</td>
        </tr>

	';
	}
$vent=$row2['venta'];
	$content .= '<h3  style="">'."Ventas Totales ".number_format($vent,2)."".'</h3>';
	
	$content .= '</table>';
	
	}
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	ob_end_clean();
	$pdf->output('Reporte.pdf', 'I');


?>
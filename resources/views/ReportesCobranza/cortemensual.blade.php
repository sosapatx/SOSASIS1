<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/example.css">
	<meta charset="utf-8">
</head>
<style>
	 #ABC {
                background-color: #58FAAC;
            }
     #color{
     	color:#08088A;
     }<?php
	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes=$arrayMeses[date('m')-1];
	?>
	  #header { position: fixed; left: 0px; top: -30px; right: 0px; height: 150px; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: white; }
    #footer .page:after { content: counter(page, decimal-leading-zero); }

</style>
<div id="header" >
              
        <table id="footer">
            <tr class="page">
                <td>
                    <span>Este el footer y pueder ir con letra más pequeña por ejemplo poner una
                    dirección o algo así :P</span>
                </td>
            </tr>
        </table>
</div>

<header>
	<h3><center id="color"><img src="img/sosapatex.png" style="margin: -30px 0px -5px -5px;float: left; ">Sistema Operador de los Servicios de Agua Potable y Alcantarillado del Municipio de San Martín Texmelucan, Pue.</center></h3>
	
<section id="ABC">
	<p align="left"><?php echo date('Y-m-j')?></p>

	<h3><center>Reporte de ingresos monetarios del mes de <?php echo $mes?></center></h3>
	<h3><center>Periodo <?php echo $mes."-".date('Y'); ?></center></h3>
</section>
<p align="right">Contador: <?php
session_start();
echo $_SESSION['usuario'];
?></p>
</header>
<body>
<?php 
//$dompdf->page_text(1,1, "{PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
//if (isset($pdf)) {
//  $pdf->page_script('
   
//    $pdf->text(770, 580, "Page $PAGE_NUM of $PAGE_COUNT", $font, 10, array(0, 0, 0));
//  ');
//}

?>
    <script type='text/php'>
      if ( isset($pdf) ) { 
        $font = Font_Metrics::get_font('helvetica', 'normal');
        $size = 9;
        $y = $pdf->get_height() - 24;
        $x = $pdf->get_width() - 15 - Font_Metrics::get_text_width('1/1', $font, $size);
        $pdf->page_text($x, $y, '{PAGE_NUM}/{PAGE_COUNT}', $font, $size);
      } 
    </script>
	
	
		<center>
			<H2>Contratos</H2>
			<div style="text-align: center;">
			<h2>Consumo Medidor</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>


					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;		
				$count=0;		

					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('1'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('1'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}



					
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
				<p align="left">Registros: <?php echo ($count+$count2); ?></p>
				
			</table>
			</div>
			<div style="text-align: center;">
			<h2>Cuota fija</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('2'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('2'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}


						
					
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>


			<div style="text-align: center;">
			<h2>Conexión agua potable</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('3'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('3'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}


						
					
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>




			<div style="text-align: center;">
			<h2>Conexión alcantarillado</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;
				$count=0;

					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('4'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('4'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



			<div style="text-align: center;">
			<h2>Rezagos</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('5'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('5'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



			<div style="text-align: center;">
			<h2>Recargos</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('6'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('6'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>




			<div style="text-align: center;">
			<h2>Cobranzas</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;

					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('7'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('7'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>




			<div style="text-align: center;">
			<h2>Cooperación</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;

					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('8'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('8'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



			<div style="text-align: center;">
			<h2>Servicio alcantarillado</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('9'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('9'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



			<div style="text-align: center;">
			<h2>Rezago alcantarillado</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('10'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('10'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



			<div style="text-align: center;">
			<h2>Saneamiento</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;

					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('11'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('11'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



			<div style="text-align: center;">
			<h2>Rezago Saneamiento</h2>
			<table style="margin: 0 auto;">

				<thead>
					<tr>
						<th>Contrato</th>
						<th>Fecha Pago</th>
						<th>Fecha Límite</th>
						<th>Hora</th>
						<th>Recargo</th>
						<th>Periodo</th>
						<th>Caja</th>
						<th>Clave</th>
						<th>Cancelada</th>
						<th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				use Illuminate\Support\Facades\DB;
				$cob=DB::table('Cobranza')->get();
				$total=0;				
				$count=0;
					foreach($cob as $key =>$c){
					//if($c->Fecha_P==date('Y').('-').date('m').('-').date('d')){
						for ($i=01; $i <10 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').('0').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('12'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
						$total=$total+$c->Total;	
						$count++;
					}
				
						}
					}

						$total2=0;
						$count2=0;
						foreach($cob as $key =>$c){
						for ($i=10; $i <=31 ; $i++) { 
							if(($c->Fecha_P==date('Y').('-').date('m').('-').($i))&($c->Pagado==('1'))&($c->Clave_conceptoCobros==('12'))){
				?>
						<tr>
							
							<td><center>{{$c->contrato}}</center></td>
							<td><center>{{$c->Fecha_P}}</center></td>
							<td><center>{{$c->Fecha_Limite}}</center></td>
							<td><center>{{$c->Hora}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->Clave_conceptoCobros}}</center></td>
							<td><center>{{$c->cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->Iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total2=$total2+$c->Total;	
							$count2++;
					}

						}
					}?>
				</tbody>
				<p align="right">Total <?php echo ($total2+$total) ;?></p>
<p align="left">Registros: <?php echo ($count+$count2); ?></p>
			</table>
			</div>



		</center>
</body>

</html>
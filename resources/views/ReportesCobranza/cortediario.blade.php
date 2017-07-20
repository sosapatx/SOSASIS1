<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/example.css">
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
<meta charset="utf-8">
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
</header>
<section id="ABC">
	<p align="left"><?php echo date('Y-m-j')?></p>

	<h3><center>Reporte de ingresos monetarios al día</center></h3>
	<h3><center>Periodo <?php echo $mes."-".date('Y'); ?></center></h3>
</section>
<p align="right">Contador: <?php
session_start();
echo $_SESSION['usuario'];
?></p>
<body>
<!--<label><?php //echo date('Y-m-j')?></label>-->
		<center >
			<H2>Contratos</H2>
			<div style="text-align: center;">
			<table style="margin: 0 auto;">
				<thead id="color">
					<tr>
						<!--<td>Id</td>-->
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
					if(($c->Fecha_P==date('Y').('-').date('m').('-').date('d'))&($c->pagado==('1'))){
						
				?>
						<tr>
							<!--<td><center>{{$c->id}}</center></td>-->
							<td><center>{{$c->NContrato}}</center></td>
							<td><center>{{$c->FechaPago}}</center></td>
							<td><center>{{$c->FechaLimite}}</center></td>
							<td><center>{{$c->HoraPago}}</center></td>
							<td><center>{{$c->Recargo}}</center></td>
							<td><center>{{$c->Periodo}}</center></td>
							<td><center>{{$c->caja}}</center></td>
							<td><center>{{$c->CveConcepto}}</center></td>
							<td><center>{{$c->Cancelada}}</center></td>
							<td><center>{{$c->Subtotal}}</center></td>
							<td><center>{{$c->iva}}</center></td>
							<td><center>{{$c->Total}}</center></td>
						</tr><?php
							$total=$total+$c->Total;
							$count++;
						}
					
					}
					
					?>
					
				</tbody>
				<p align="right">Total <?php echo $total?></p>
				<p align="left">Registros: <?php echo $count; ?></p>
			</table>
			</div>
		</center>

</body>
	 
 
</page>
</html>
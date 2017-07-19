@extends('layouts.admin')
@section('contenido')
<div class="row">
<script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f=new Date();
document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());



</script> 
<?php
session_start();
$_SESSION['usuario'] = 'Luis Alberto Madrid Díaz'; 

?>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Cobranza <br><a href="cobros/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	
		@include('layouts.search')
	</div>	
</div>
<a href="#" class="btn btn-primary glyphicon-hourglass" data-target="#c1" data-toggle="modal"> Corte diario</a> <a href="#" class="btn btn-primary glyphicon-hourglass" data-target="#c2" data-toggle="modal"> Corte mensual</a> <a href="#" class="btn btn-info" >Ingreso por agua</a>  <a href="#" class="btn btn-info">Ingreso por alcantarillado</a>  <a href="#" class="btn btn-info">Ingreso por saneamiento</a>

<!--<FORM name="form">
<input type="text" name="nombre" value="El nombre">
<input type="button" onclick="pasatext()" value="pasa text">
</FORM>
<SCRIPT language="javascript">
function pasatext(){
window.open('/ingresoalcantarillado','winpop','width=240,height=100');
}
</SCRIPT> 

<input type="text" name="texto" id="texto" value="Aca va tu texto"> -->
<?php
//echo $texto; 
?>

@include('Cobros.modal')

<div class="row" >
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-resposive">
			<table class="table table-triped table-dordered table-condensed table-hover">
				<thead>
				<tr>
					<td>#</td>
					<td><h6>CURP</h6></td>
					<td><h6>Nombre</h6></td>
					<td><h6>Teléfono</h6></td>
					<td><h6>Colonia</h6></td>
					<td><h6>Tipo de toma</h6></td>
					<td><h6>Fecha de contrato</h6></td>
					<td><h6>Historial</h6></td>
				</tr>
			</thead>
			@foreach($contratos as $info)
					<tr>
						<td><center>{{$info->NContrato}}</center></td>
						<td><center>{{$info->CURP}}</center></td>
						<td><center>{{$info->nombreS}}</center></td>
						<td><center>{{$info->telefonoS}}</center></td>
						<td><center>{{$info->Colonia}}</center></td>
						<td><center>{{$info->TipoToma}}</center></td>
						<td><center>{{$info->FechaContrato}}</center></td>
						<td>
							<a href="" class="btn btn-warning">Facturas</a>
						</td>
						

					</tr>

				@endforeach
			</table>
		</div>
		{{$contratos->render()}}
	</div>
	
</div>

@endsection
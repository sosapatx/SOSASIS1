@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes</h3>
		@include('cliente.ListaContratos.search')
	</div>
</div>

	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" border="1">
				<thead>
					<th>Nombre o Razón Social</th>
					<th>CURP</th>
					<th>RFC</th>
					<th>Ruta</th>
					<th>No. Contrato</th>
					<th>direccion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($listacontratos as $lc)
				<tr>
					<td>{{ $lc->nombreS}}</td>
					<td>{{ $lc->curp}}</td>
					<td>{{ $lc->rfc}}</td>
					<td>{{ $lc->rutaC}}</td>
					<td>{{ $lc->noContrato}}</td>
					<td>{{ $lc->direccion}}</td>
					<td>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$listacontratos->render()}}
	</div>
</div>
@endsection
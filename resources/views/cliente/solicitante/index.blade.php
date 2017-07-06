@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="solicitante/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('cliente.solicitante.search')

		<a href="{{URL::action('PredioController@index')}}"><button class="btn btn-success">Predios</button></a>
		<br>
		<br>
	</div>
</div>

	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" border="1">
				<thead>
					<th>No.</th>
					<th>Curp</th>
					<th>Nombre o Razón Social</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Celular</th>
					<th>Colonia</th>
					<th>RFC</th>
					<th>Opciones</th>
				</thead>
               @foreach ($solicitante as $sol)
				<tr>
					<td>{{ $sol->idSolicitante}}</td>
					<td>{{ $sol->curp}}</td>
					<td>{{ $sol->nombreS}}</td>
					<td>{{ $sol->direccion}}</td>
					<td>{{ $sol->telefono}}</td>
					<td>{{ $sol->celular}}</td>
					<td>{{ $sol->colonia}}</td>
					<td>{{ $sol->rfc}}</td>
					<td>
						<a href="{{URL::action('SolicitanteController@edit',$sol->idSolicitante)}}"><button class="btn btn-info">Editar</button></a>
						

                    
					</td>
				</tr>
				@include('cliente.solicitante.modal')
				@endforeach
			</table>
		</div>
		{{$solicitante->render()}}
	</div>
</div>
@endsection
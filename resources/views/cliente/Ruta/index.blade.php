@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>LISTADO DE RUTAS ya funciona el git<a href="Ruta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('cliente.Ruta.search')
	</div>
</div>

	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" border="1">
				<thead>
					<th>No de ruta.</th>
					<th>Calle</th>
					<th>Colonia</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ruta as $rut)
				<tr>
					<td>{{ $rut->nRuta}}</td>
					<td>{{ $rut->calle}}</td>
					<td>{{ $rut->colonia}}</td>
					<td>
						<a href="{{URL::action('RutaController@edit',$rut->nRuta)}}"><button class="btn btn-info">Editar</button></a>

						
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$ruta->render()}}
	</div>
</div>
@endsection
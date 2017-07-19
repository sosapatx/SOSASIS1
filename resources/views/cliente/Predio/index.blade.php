@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>LISTADO DE PREDIOS <a href="Predio/create"><button class="btn btn-success">Nuevo Predio</button></a></h3>
		@include('cliente.Predio.search')

		<a href="{{URL::action('ContratoController@index')}}"><button class="btn btn-success">Contratos</button></a>
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
					<th>Domicilio</th>
					<th>Colonia</th>
					<th>Localidad</th>
					<th>Transversal 1</th>
					<th>Transversal 2</th>
					<th>Manzana</th>
					<th>Lote</th>
					<th>Frente m</th>
					<th>Fondo m</th>
					<th>Superficie</th>
					<th>Opciones</th>
				</thead>
               @foreach ($predio as $pre)
				<tr>
					<td>{{ $pre->IdPredio}}</td>
					<td>{{ $pre->CURP}}</td>
					<td>{{ $pre->Direccion}}</td>
					<td>{{ $pre->Colonia}}</td>
					<td>{{ $pre->Localidad}}</td>
					<td>{{ $pre->Transversal1}}</td>
					<td>{{ $pre->Transversal2}}</td>
					<td>{{ $pre->Manzana}}</td>
					<td>{{ $pre->Lote}}</td>
					<td>{{ $pre->Frente_mtrs}}</td>
					<td>{{ $pre->Fondo_mtrs}}</td>
					<td>{{ $pre->Superficie}}</td>
					<td>
						<a href="{{URL::action('PredioController@edit',$pre->IdPredio)}}"><button class="btn btn-info">Editar</button></a>
						
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$predio->render()}}
	</div>
</div>
@endsection
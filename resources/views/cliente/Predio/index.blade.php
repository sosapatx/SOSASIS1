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
					<td>{{ $pre->idPredio}}</td>
					<td>{{ $pre->curpP}}</td>
					<td>{{ $pre->direccion}}</td>
					<td>{{ $pre->colonia}}</td>
					<td>{{ $pre->localidad}}</td>
					<td>{{ $pre->transversal1}}</td>
					<td>{{ $pre->transversal2}}</td>
					<td>{{ $pre->manzana}}</td>
					<td>{{ $pre->lote}}</td>
					<td>{{ $pre->frente_mtrs}}</td>
					<td>{{ $pre->fondo_mtrs}}</td>
					<td>{{ $pre->superficie}}</td>
					<td>
						<a href="{{URL::action('PredioController@edit',$pre->idPredio)}}"><button class="btn btn-info">Editar</button></a>
						
                        <!--<a href="" data-target="#modal-delete-{{$pre->curpP}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$predio->render()}}
	</div>
</div>
@endsection
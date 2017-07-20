@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<<<<<<< HEAD
		<h3>LISTADO DE CONTRATOS <a href="Contrato/create"><button class="btn btn-success">Nuevo</button></a></h3>
=======
		<h3>Listado de Contratos <a href="Contrato/create"><button class="btn btn-success">Nuevo</button></a></h3>
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
		@include('cliente.Contrato.search')
	</div>
</div>

<<<<<<< HEAD
	<a href="{{URL::action('ListaContratosController@index')}}"><button class="btn btn-success">Lista de Contratos</button></a>
	<br>

=======
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" border="1">
				<thead>
					<th>No. Contrato</th>
<<<<<<< HEAD
=======
					<th>No. predio</th>
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
					<th>CURP</th>
					<th>Ruta</th>
					<th>Descuento</th>
					<th>No. Medidor</th>
					<th>Marca</th>
					<th>Diametro</th>
					<th>Tipo Toma</th>
					<th>Edo. Toma</th>
					<th>Clasificación</th>
					<th>Fecha</th>
					<th>longuitud</th>
					<th>latitud</th>
					<th>Opciones</th>
				</thead>
               @foreach ($contrato as $con)
				<tr>
					
					<td>{{ $con->noContrato}}</td>
<<<<<<< HEAD
=======
					<td>{{ $con->predioC}}</td>
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
					<td>{{ $con->curpC}}</td>
					<td>{{ $con->rutaC}}</td>
					<td>{{ $con->descuento}}</td>
					<td>{{ $con->noMedidor}}</td>
					<td>{{ $con->marca}}</td>
					<td>{{ $con->diametroToma}}</td>
					<td>{{ $con->tipoToma}}</td>
					<td>{{ $con->edoToma}}</td>
					<td>{{ $con->clasificacion}}</td>
					<td>{{ $con->fechaContrato}}</td>
					<td>{{ $con->longuitud}}</td>
					<td>{{ $con->latitud}}</td>
					<td>
						<a href="{{URL::action('ContratoController@edit',$con->noContrato)}}"><button class="btn btn-info">Editar</button></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$contrato->render()}}
	</div>
</div>
@endsection
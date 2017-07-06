@extends ('layouts.admin')
@section('contenido')
	<h3>Create</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Solicitante</h3>

			@if(count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'cliente/solicitante','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="form-group">
				<label for="curp">Curp</label>
				<input type="text" class="form-control" placeholder="CURP..." name="curp">
			</div>

			<div class="form-group">
				<label for="nombreS">Nombre Solicitante</label>
				<input type="text" class="form-control" name="nombreS" placeholder="Nombre...">
			</div>

			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" class="form-control" name="direccion" placeholder="Direccion...">
			</div>

			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control" name="telefono" placeholder="Telefono...">
			</div>

			<div class="form-group">
				<label for="celular">Celular</label>
				<input type="text" class="form-control" name="celular" placeholder="Celular...">
			</div>

			<div class="form-group">
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia" placeholder="Colonia...">
			</div>

			<div class="form-group">
				<label for="rfc">R.F.C.</label>
				<input type="text" class="form-control" name="rfc" placeholder="RFC...">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
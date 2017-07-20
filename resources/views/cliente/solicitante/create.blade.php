@extends ('layouts.admin')
@section('contenido')
<<<<<<< HEAD
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>NUEVO SOLICITANTE</h3>
=======
	<h3>Create</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Solicitante</h3>
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337

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
<<<<<<< HEAD
				<label for="direccionS">Direccion</label>
				<input type="text" class="form-control" name="direccionS" placeholder="Direccion...">
			</div>

			<div class="form-group">
				<label for="telefonoS">Telefono</label>
				<input type="text" class="form-control" name="telefonoS" placeholder="Telefono...">
=======
				<label for="direccion">Direccion</label>
				<input type="text" class="form-control" name="direccion" placeholder="Direccion...">
			</div>

			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control" name="telefono" placeholder="Telefono...">
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
			</div>

			<div class="form-group">
				<label for="celular">Celular</label>
				<input type="text" class="form-control" name="celular" placeholder="Celular...">
			</div>

			<div class="form-group">
<<<<<<< HEAD
				<label for="Colonia">Colonia</label>
				<input type="text" class="form-control" name="Colonia" placeholder="Colonia...">
=======
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia" placeholder="Colonia...">
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
			</div>

			<div class="form-group">
				<label for="rfc">R.F.C.</label>
				<input type="text" class="form-control" name="rfc" placeholder="RFC...">
			</div>
<<<<<<< HEAD
			
			<div class="form-group">
				<label for="email">e-mail</label>
				<input type="text" class="form-control" name="email" placeholder="nombre@correo.com...">
			</div>
=======
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337

			<div class="form-group">
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
@extends ('layouts.admin')
@section('contenido')
<<<<<<< HEAD
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>NUEVA RUTA</h3>
=======
	<h3>Create</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Ruta</h3>
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

			{!!Form::open(array('url'=>'cliente/Ruta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


			<div class="form-group">
<<<<<<< HEAD
				<label for="calle">Calle</label>
=======
				<label for="calle">calle</label>
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
				<input type="text" class="form-control" name="calle" placeholder="Calle...">
			</div>

			<div class="form-group">
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia" placeholder="Colonia...">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
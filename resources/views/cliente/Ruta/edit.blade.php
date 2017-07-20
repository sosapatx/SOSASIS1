@extends ('layouts.admin')
@section('contenido')
<<<<<<< HEAD

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>EDITAR RUTA {{$Rutas->nRuta}}</h3>
=======
	<h3>Editar Ruta</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>editar Ruta</h3>
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

<<<<<<< HEAD
			{{ Form::model($Rutas, array('route'=>array('Ruta.update',$Rutas->nRuta), 'method'=>'PATCH')) }}
=======
			{{ Form::model($ruta, array('route'=>array('Ruta.update',$ruta->noRuta), 'method'=>'PATCH')) }}
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
            {{Form::token()}}


			<div class="form-group">
				<label for="calle">Calle</label>
<<<<<<< HEAD
				<input type="text" class="form-control" name="calle" value="{{$Rutas->Calle}}">
=======
				<input type="text" class="form-control" name="calle" value="{{$ruta->calle}}">
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
			</div>

			<div class="form-group">
				<label for="colonia">Colonia</label>
<<<<<<< HEAD
				<input type="text" class="form-control" name="colonia" value="{{$Rutas->Colonia}}">
=======
				<input type="text" class="form-control" name="colonia" value="{{$ruta->colonia}}">
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
			</div>

			<div class="form-group">
				
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
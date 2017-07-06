@extends ('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>EDITAR RUTA {{$ruta->noRuta}}</h3>

			@if(count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{{ Form::model($ruta, array('route'=>array('Ruta.update',$ruta->noRuta), 'method'=>'PATCH')) }}
            {{Form::token()}}


			<div class="form-group">
				<label for="calle">Calle</label>
				<input type="text" class="form-control" name="calle" value="{{$ruta->calle}}">
			</div>

			<div class="form-group">
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia" value="{{$ruta->colonia}}">
			</div>

			<div class="form-group">
				
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
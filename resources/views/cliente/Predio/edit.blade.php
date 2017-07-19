@extends ('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>EDITAR PREDIO {{$predio->IdPredio}}</h3>

			@if(count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{{ Form::model($predio, array('route'=>array('Predio.update',$predio->IdPredio), 'method'=>'PATCH')) }}
            {{Form::token()}}
			
			<div class="form-group">
				<label for="CURP">Curp Solicitante</label>
				<input type="text" class="form-control" name="CURP" value="{{$predio->CURP}}">
			</div>

			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" class="form-control" name="direccion" value="{{$predio->Direccion}}">
			</div>

			<div class="form-group">
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia" value="{{$predio->Colonia}}">
			</div>

			<div class="form-group">
				<label for="localidad">Localidad</label>
				<input type="text" class="form-control" name="localidad" value="{{$predio->Localidad}}">
			</div>

			<div class="form-group">
				<label for="transversal1">Transversal 1</label>
				<input type="text" class="form-control" name="transversal1" value="{{$predio->Transversal1}}">
			</div>
			
			<div class="form-group">
				<label for="transversal2">Transversal 2</label>
				<input type="text" class="form-control" name="transversal2" value="{{$predio->Transversal2}}">
			</div>

			<div class="form-group">
				<label for="manzana">Manzana</label>
				<input type="text" class="form-control" name="manzana" value="{{$predio->Manzana}}">
			</div>

			<div class="form-group">
				<label for="lote">Lote</label>
				<input type="text" class="form-control" name="lote" value="{{$predio->Lote}}">
			</div>

			<div class="form-group">
				<label for="frente_m">Frente m</label>
				<input type="text" class="form-control" name="frente_m" value="{{$predio->Frente_mtrs}}">
			</div>

			<div class="form-group">
				<label for="fondo_m">Fondo m</label>
				<input type="text" class="form-control" name="fondo_m" value="{{$predio->Frente_mtrs}}">
			</div>

			<div class="form-group">
				<label for="superficie">Superficie </label>
				<input type="text" class="form-control" name="superficie" value="{{$predio->Superficie}}">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
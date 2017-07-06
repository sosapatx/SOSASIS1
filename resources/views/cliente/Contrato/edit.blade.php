@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<h3>EDITAR CONTRATO {{$contrato->noContrato}}</h3>

			@if(count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{{ Form::model($contrato, array('route'=>array('Contrato.update',$contrato->noContrato), 'method'=>'PATCH')) }}
            {{Form::token()}}

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="noContrato">No. Contrato</label>
				<input type="text" class="form-control" value="{{$contrato->noContrato}}" name="noContrato">
			</div>

			<div class="form-group">
				<label for="predioC">Predio</label>
				<input type="text" class="form-control" name="predioC" value="{{$contrato->predioC}}">
			</div>

			<div class="form-group">
				<label for="curpC">CURP</label>
				<input type="text" class="form-control" name="curpC" value="{{$contrato->curpC}}">
			</div>

			<div class="form-group">
				<label for="rutaC">RUTA</label>
				<input type="text" class="form-control" name="rutaC" value="{{$contrato->rutaC}}">
			</div>

			<div class="form-group">
				<label for="descuento">Descuento</label>
				<input type="text" class="form-control" name="descuento" value="{{$contrato->descuento}}">
			</div>

			<div class="form-group">
				<label for="noMedidor">No. Medidor</label>
				<input type="text" class="form-control" name="noMedidor" value="{{$contrato->noMedidor}}">
			</div>

			<div class="form-group">
				<label for="marca">Marca</label>
				<input type="text" class="form-control" name="marca" value="{{$contrato->marca}}">
			</div>
		</div>
		
		<!--Segunda -->>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="diametroToma">Diametro</label>
				<input type="text" class="form-control" name="diametroToma" value="{{$contrato->diametroToma}}">
			</div>

			<div class="form-group">
				<label for="tipoToma">Tipo de Toma</label>
				<input type="text" class="form-control" name="tipoToma" value="{{$contrato->tipoToma}}">
			</div>

			<div class="form-group">
				<label for="edoToma">Estado de la Toma</label>
				<input type="text" class="form-control" name="edoToma" value="{{$contrato->edoToma}}">
			</div>

			<div class="form-group">
				<label for="clasificacion">Clasificacion</label>
				<input type="text" class="form-control" name="clasificacion" value="{{$contrato->clasificacion}}">
			</div>

			<div class="form-group">
				<label for="fechaContrato">Fecha de Contrato</label>
				<input type="text" class="form-control" name="fechaContrato" value="{{$contrato->fechaContrato}}">
			</div>

			<div class="form-group">
				<label for="longuitud">Longuitud</label>
				<input type="text" class="form-control" name="longuitud" value="{{$contrato->longuitud}}">
			</div>

			<div class="form-group">
				<label for="latitud">Latitud</label>
				<input type="text" class="form-control" name="latitud" value="{{$contrato->latitud}}">
			</div>

		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
		</div>
	</div>

			

			
			<div class="form-group">
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
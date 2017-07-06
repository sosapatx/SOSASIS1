@extends ('layouts.admin')
@section('contenido')
	<h3>Create</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>EDITAR SOLICITANTE:  {{$solicitante->curp}}</h3>

			@if(count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{{ Form::model($solicitante, array('route'=>array('solicitante.update',$solicitante->idSolicitante), 'method'=>'PATCH')) }}
            {{Form::token()}}
			<div class="form-group">
				<label for="curp">Curp</label>
				<input type="text" class="form-control" name="curp" value="{{$solicitante->curp}}">
			</div>

			<div class="form-group">
				<label for="nombreS">Nombre Solicitante</label>
				<input type="text" class="form-control" name="nombreS" value="{{$solicitante->nombreS}}">
			</div>

			<div class="form-group">
				<label for="direccionS">Direccion</label>
				<input type="text" class="form-control" name="direccionS" value="{{$solicitante->direccionS}}">
			</div>

			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control" name="telefono" value="{{$solicitante->telefono}}">
			</div>

			<div class="form-group">
				<label for="celular">Celular</label>
				<input type="text" class="form-control" name="celular" value="{{$solicitante->celular}}">
			</div>
			
			<div class="form-group">
				<label for="coloniaS">Colonia</label>
				<input type="text" class="form-control" name="coloniaS" value="{{$solicitante->coloniaS}}">
			</div>

			<div class="form-group">
				<label for="rfc">R.F.C.</label>
				<input type="text" class="form-control" name="rfc" value="{{$solicitante->rfc}}">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submint">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
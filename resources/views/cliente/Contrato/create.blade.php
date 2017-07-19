@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>NUEVO CONTRATO</h3>

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

			{!!Form::open(array('url'=>'cliente/Contrato','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="CURP">CURP</label>
				<select name="CURP" class="form-control">
					@foreach($predio as $pre)
						<option value="{{$pre->CURP}}">{{$pre->CURP}} {{$pre->nombreS}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="rutaC">RUTA</label>
				<select name="rutaC" class="form-control">
					@foreach($ruta as $rut)
						<option value="{{$rut->nRuta}}">{{$rut->nRuta}} {{$rut->Calle}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="noMedidor">No. Medidor</label>
				<input type="text" class="form-control" name="noMedidor" placeholder="Numero...">
			</div>

			<div class="form-group">
				<label for="marca">Marca del Medidor</label>
				<input type="text" class="form-control" name="marca" placeholder="MARCA...">
			</div>

			<div class="form-group">
				<label for="diametroToma">Diametro de la toma</label>
				<input type="text" class="form-control" name="diametroToma" placeholder="DIAMETRO...">
			</div>

			<div class="form-group">
				<label for="fechaContrato">Fecha de Contrato</label>
				<input type="text" class="form-control" name="fechaContrato" placeholder="AAAA/MM/DD">
			</div>

		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<div class="form-group">
				<label for="descuento">Descuento</label>
				<select name="descuento" class="form-control">
					<option value="no">NO</option>
					<option value="si">SI</option>					
				</select>
			</div>
			
			<div class="form-group">
				<label for="tipoToma">Tipo de Toma</label>
				<select name="tipoToma" class="form-control">
					<option value="Completa">Completa</option>
					<option value="Banqueta">Hasta la Banqueta</option>					
				</select>
			</div>

			<div class="form-group">
				<label for="edoToma">Estado de la Toma</label>
				<select name="edoToma" class="form-control">
					<option value="Activa">Activa</option>
					<option value="STemporalmente">Supendida Temporalmente</option>
					<option value="Cancelada">Cancelada</option>
				</select>
			</div>

			<div class="form-group">
				<label for="clasificacion">Clasificacion</label>
				<select name="clasificacion" class="form-control">
					<option value="domestica">Domestica</option>
					<option value="comercial">Comercial</option>
					<option value="industrial">Industrial</option>
				</select>
			</div>
			
			
			<div class="form-group">
				<label for="longuitud">Longuitud</label>
				<input type="text" class="form-control" name="longuitud" placeholder="LONGUITUD...">
			</div>

			<div class="form-group">
				<label for="latitud">Latitud</label>
				<input type="text" class="form-control" name="latitud" placeholder="LATITUD...">
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
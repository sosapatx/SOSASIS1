@extends ('layouts.admin')
@section('contenido')
	<h3>Predios</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Predio</h3>

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



			{!!Form::open(array('url'=>'cliente/Predio','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="curpP">Curp Solicitante</label>
				<select name="curpP" class="form-control">
					@foreach($solicitante as $sol)
						<option value="{{$sol->curp}}">{{$sol->curp}}  {{$sol->nombreS}} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" class="form-control" name="direccion" placeholder="Direccion...">
			</div>

			<div class="form-group">
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia" placeholder="Colonia...">
			</div>

			<div class="form-group">
				<label for="localidad">Localidad</label>
				<input type="text" class="form-control" name="localidad" placeholder="Localidad...">
			</div>

			<div class="form-group">
				<label for="transversal1">Transversal 1</label>
				<input type="text" class="form-control" name="transversal1" placeholder="Calle...">
			</div>
			
			<div class="form-group">
				<label for="transversal2">Transversal 2</label>
				<input type="text" class="form-control" name="transversal2" placeholder="Calle...">
			</div>
			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			<div class="form-group">
				<label for="manzana">Manzana</label>
				<input type="text" class="form-control" name="manzana" placeholder="No. Manzana...">
			</div>

			<div class="form-group">
				<label for="lote">Lote</label>
				<input type="text" class="form-control" name="lote" placeholder="No. lote...">
			</div>

			<div class="form-group">
				<label for="frente_m">Frente m</label>
				<input type="text" class="form-control" name="frente_m" placeholder="No. metros...">
			</div>

			<div class="form-group">
				<label for="fondo_m">Fondo m</label>
				<input type="text" class="form-control" name="fondo_m" placeholder="No. de metros...">
			</div>

			<div class="form-group">
				<label for="superficie">Superficie </label>
				<input type="text" class="form-control" name="superficie" placeholder="No. metros...">
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
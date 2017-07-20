<<<<<<< HEAD
{!! Form::open(array('url'=>'cliente/ListaContratos','method'=>'GET','autocomplete'=>'off', 'role'=>'search'))!!}
=======
{!! Form::open(array('url'=>'cliente/ListaCliente','method'=>'GET','autocomplete'=>'off', 'role'=>'search'))!!}
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="searchText" class="form-control" placeholder="Buscar..." value="{{$searchText}}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>
{{Form::close()}}
@extends('layouts.admin')
@section('contenido')
<h3>Reporte de agua <br><a href="{{route('cobros.index')}}"> Regresar a Cobranza</a></h3>

 

<!--<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">-->
<form name='miFormulario' method='post' action='http://localhost:8000/alcan/create'>
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
							<label for="v1">Fecha inicio</label>
							<input type="date" name="v1" id="v1" class="form-control" required="required" placeholder="AAAA-MM-dd" >
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<label for="v2">Fecha fin</label>
							<input type="date" name="v2" id="v2" class="form-control" required="required" placeholder="AAAA-MM-dd" >
						</div>
					</div>

</form>

<form name='form2' method="post" action="/ingresoagua">
<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<input type="hidden" id="fecha1" name="fecha1">
							<input type="hidden" id="fecha2" name="fecha2">
							{{ csrf_field() }}
							<button type="submit" class="btn btn-warning" id="boton">Imprimir PDF</button>
						</div>
					</div>
	
</form>
						

					
<script >
			$('#v2').on('change', function() {
				 var v1=document.getElementById('v1').value;
				var v2=document.getElementById('v2').value;
				if(v1>v2){
				alert("La fecha fin debe ser mayor a la fecha inicio")	
				}
				
				$('#fecha1').val(v1);
				$('#fecha2').val(v2);
 });

        </script>


       
@endsection
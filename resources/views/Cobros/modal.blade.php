<div class="modal fade modal-slide-in-rigtht" aria-hidden="true" role="dialog" tabindex="-1" id="c1">
	{{Form::Open(array('url'=>'/cortediario'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Reporte Diario</h4>
				</div>
				<div class="modal-body">
					<p>¿Desea imprimir el reporte diario?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<a href="/cortediario" class="btn btn-warning">Imprimir PDF</a>
				</div>
			</div>

		</div>

	{{Form::Close()}}
</div>
<div class="modal fade modal-slide-in-rigtht" aria-hidden="true" role="dialog" tabindex="-1" id="c2">
	{{Form::Open(array('url'=>'/cortemensual'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Reporte Mensual</h4>
				</div>
				<div class="modal-body">
					<p>¿Desea imprimir el reporte mensual?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<a href="/cortemensual" class="btn btn-warning">Imprimir PDF</a>
				</div>
			</div>

		</div>

	{{Form::Close()}}
</div>

<div class="modal fade modal-slide-in-rigtht" aria-hidden="true" role="dialog" tabindex="-1" id="c3">
	{{Form::Open(array('url'=>'/ingresoagua'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Reporte ingreso de agua</h4>
				</div>
				<div class="modal-body">
					<p>¿Desea imprimir el reporte del ingreso de agua?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<a href="/ingresoagua" class="btn btn-warning">Imprimir pdf</a>
				</div>
			</div>

		</div>

	{{Form::Close()}}
</div>

<div class="modal fade modal-slide-in-rigtht" aria-hidden="true" role="dialog" tabindex="-1" id="c4">
	{!!Form::open()!!}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Reporte ingreso alcantarillado</h4>
					
					
				</div>


				<div class="modal-body">
					<p>¿Desea imprimir el reporte?</p><br>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<label for="v1">Fecha inicio</label>
							<input type="date" name="v1" id="v1" class="form-control fselect ffilter" required value="{{old('Total')}}" placeholder="AAAA-MM-dd" >
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<label for="v2">Fecha inicio</label>
							<input type="date" name="v2" id="v2" class="form-control" required value="{{old('Total')}}" placeholder="AAAA-MM-dd" >
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<label for="v3">oculto</label>
							<input type="v3" name="v2" id="v3" class="form-control" placeholder="AAAA-MM-dd" >
						</div>
					</div>
					
				</div>
				<script>

	
 $('#v2').on('change', function() {
	 		//var d=document.getElementById('v1').value
               //alert($(this).val());
               //$('#Subtotal').val(d[1])
             
              var v1=$('#v1').val();
              var v2=$('#v2').val();
              var nombre=v1+"_"+v2;
              $('#v3').val(nombre)
              //var v =var1($('#v2').val());
               nombres($('#v3').val());
               
              //alert(nombres);
			//nombres($('#v2').val());

 });



 function nombres(anio) {
 			var v1=anio.split('_')[0];
 			var v2=anio.split('_')[1];
            // Request
            var posting = $.post( "/alcantarillado", { 
            	"_token": "{{ csrf_token() }}",
                'anio': v1,
                'anio2': v2
            	 } 
            );
            // Response
            posting.done(function( datos ) {
                //Aqui llenas los campos con los datos
		alert(datos);
		//$('#oculto').val(datos)
            });
        }

 </script>


				<div class="modal-footer">
				<button class="btn btn-primary" id="boton">Comprobar</button>

					<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<a href="/ingresoalcantarillado" class="btn btn-warning">Imprimir pdf</a>
				</div>
			</div>

		</div>

	{{!!Form::Close()!!}}
</div>

<div class="modal fade modal-slide-in-rigtht" aria-hidden="true" role="dialog" tabindex="-1" id="c5">
	{{Form::Open(array('url'=>'/ingresosaneamiento'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Reporte saneamiento</h4>
				</div>
				<div class="modal-body">
					<p>¿Desea imprimir el reporte?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<a href="/ingresosaneamiento" class="btn btn-warning">Imprimir pdf</a>
				</div>
			</div>

		</div>

	{{Form::Close()}}
</div>


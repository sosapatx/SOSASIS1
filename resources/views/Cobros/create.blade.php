
@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<script>
</script>
 <?php
session_start();
//echo $_SESSION['usuario'];
echo date('H'.':'.'i'.':'.'s');
?> 

		<h3>Nuevo pago</h3>	
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($error->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
<h4><a href="{{route('cobros.index')}}">Regresar a página de inicio</a><br></h4>
<label style="color:red ">Campo obligatorio *</label>
<!--<SCRIPT language="javascript">
document.write('Nombre: <input type="text" name="nombre" value="'+opener.document.form.nombre.value+'">');
</SCRIPT> -->


{!!Form::open(array('url'=>'cobros','method'=>'POST','autocomplete'=>'off','id'=>'resp'))!!}
{{Form::token()}}
<br><div class="row">
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="c"><label style="color: red" >*</label> Número de contrato o Nombre</label>
			<select name="c" id="c" class="form-control selectpicker" data-live-search="true" required="required">
				<option value="" disabled selected>Elije contrato</option>
				    @foreach($contrato as $r)
				    <option value="{{$r->NContrato}}_{{$r->EdoToma}}">{{$r->NContrato}} {{$r->nombreS}}</option>
				    @endforeach
			</select>
		</div>
	</div>


	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Cs"><label style="color: red" >*</label> Motivo de pago</label>
			<select name="Cs" id="Cs" class="form-control selectpicker" data-live-search="true" >
				<option value="" disabled selected>Elije motivo de pago</option>
				    @foreach($cobranzas as $razon)
				    <option value="{{$razon->CveConcepto}}_{{$razon->generaiva}}_{{$razon->importe}}">{{$razon->Descripcion}}</option>
				    @endforeach
			</select>
		</div>
	</div>	

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for=Fecha_P><label style="color: red" >*</label>Fecha de pago</label>
			<input type="text" name="FechaPago" id="FechaPago" class="form-control" value="<?php
					echo date('Y-m-j')
					?>"	>
		</div>
	</div>	
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-122">
		<div class="form-group">
			<label for="Fecha_Limite"><label style="color: red" >*</label> Fecha límite del siguiente pago</label>
			<input type="text" name="FechaLimite" id="FechaLimite" class="form-control" value="<?php
						$fecha = date('Y-m-j');
						$nuevafecha = strtotime ( '+1 month' , strtotime ( $fecha ) ) ;
						$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
						
				$nuevafecha1 = strtotime ( '+5 day' , strtotime ( $nuevafecha ) ) ;
				$nuevafecha1= date ( 'Y-m-j' , $nuevafecha1 );
				 
				echo $nuevafecha1;
					?>">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Factura"><label style="color: red" >*</label> Factura</label>
			<input type="text" name="Factura" id="Factura" class="form-control" value="1">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Hora"><label style="color: red" >*</label> Hora de pago</label>
			<input type="text" name="HoraPago" id="HoraPago" class="form-control" value=" <?php echo date('H'.':'.'i'.':'.'s');?> ">
		</div>
	</div>

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Recargo"><label style="color: red" >*</label> Recargo</label>
			<input type="text" name="Recargo" id="Recargo"  required="required" placeholder="Recargo..." value="" class="form-control">
		</div>
	</div>

	
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Periodo"><label style="color: red" >*</label> Periodo de Pago</label>
			<input type="text" name="Periodo" id="Periodo" class="form-control" required="required" value=" <?php $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
     
    $mes=$arrayMeses[date('m')-1]; echo $mes;  ?>">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="ano"><label style="color: red" >*</label> Año</label>
			<input type="text" name="Anio" id="Anio" class="form-control" value="<?php
					echo date('Y')
					?>">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="caja"><label style="color: red" >*</label> Caja</label>
			<input type="text" name="caja" id="caja" class="form-control" placeholder="Caja..." required value="{{old('caja')}}">
		</div>
	</div>

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 hidden">
		<div class="form-group">
			<label for="contrato">Id de contrato</label>
			<input name="NContrato" type="text" id="NContrato" class="form-control">
			
		</div>
	</div>


	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 hidden">
		<div class="form-group">
			<label for="Clave_conceptoCobros">Id del motivo de pago</label>
			<input type="text" name="CveConcepto" id="CveConcepto" class="form-control" >
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="cancelada"><label style="color: red" >*</label> Estado de la toma</label>
			<input type="text" name="Cancelada" id="Cancelada" class="form-control" required="required"  placeholder="Subtotal...">
		</div>
	</div>
	
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Subtotal"><label style="color: red" >*</label> Subtotal</label>
			<input type="text" name="Subtotal" id="Subtotal" class="form-control" required="required"  placeholder="Subtotal...">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Iva"><label style="color: red" >*</label> IVA</label>
			<input type="text" name="iva" id="iva" class="form-control" required value="{{old('Iva')}}" placeholder="IVA...">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Total"><label style="color: red" >*</label> Total</label>
			<input type="text" name="Total" id="Total" class="form-control" required value="{{old('Total')}}" placeholder="Total..." >
		</div>
	</div>

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
		<div class="form-group">
			<label for="Pagado"><label style="color: red" >*</label> ¿Ha sido pagado?</label>
			<select name="pagado" id="pagado" class="form-control" required value="{{old('Pagado')}}">
				<option value="" disabled selected>Elije la opción</option>
				<option value="1">Si</option>
				<option value="0">No</option>
			</select>
		</div>
	</div>

	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group" >
		<!--<input name="_token" value="{{ csrf_token() }}" type="hidden"> -->
			<button class="btn btn-primary" id="guardar" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>
</div>

{!!Form::close()!!}

@push('scripts')

<script>

var act=document.getElementById('c').value.split('_');
//$('#cancelada').val(act[1])
//alert(act[1])		

$("#Cs").change(mostrarValores);
function mostrarValores(){
	var datos=document.getElementById('Cs').value.split('_');
	var d=document.getElementById('c').value.split('_');
	if(d[1]=="Activo"){
	$('#Cancelada').val(1);
}
if(d[1]=="Cancelado"){
	$('#Cancelada').val(0);

}
if(d[1]=="Suspendido"){
	$('#Cancelada').val(2);
	
}




  	
		if (datos[0]=="1") {
	//$('#Subtotal').val(d[1])

$('#NContrato').val(d[0])
var contratos=document.getElementById('NContrato').value;	 		
               //alert($(this).val());
               //alert(contratos)
               //$('#Subtotal').val(d[1])

               nombres(contratos);
			            
					       



//               alert(contratos)
 function nombres(anio) {
 			//var test=anio.split('_')[0];
            // Request
            var posting2 = $.post( "/testpagado", { 
            	"_token": "{{ csrf_token() }}",
                'anion': anio
            	 } 
            );
            posting2.done(function( dt ) {
            	
            	if(dt==1){
            		alert('Ha sido pagado el mes actual')
            	}
            	if(dt==0){
            		alert('El mes actual no ha sido pagado')
            	}

			    if(dt==1)
			    {
			        document.getElementById('guardar').disabled=true;
			    }
			    else
			    {
			        document.getElementById('guardar').disabled=false;
			    }
            	
            });

            var posting = $.post( "/testconsulta", { 
            	"_token": "{{ csrf_token() }}",
                'anio': anio
            	 } 
            );
            // Response
            posting.done(function( datos2 ) {

                //Aqui llenas los campos con los datos
		//alert(datos2);
		var datos3=datos2.split('_')[0];
		var datos4=datos2.split('_')[1];
		var year=datos4.split('-')[0];
		var month=datos4.split('-')[1];
		var day=datos4.split('-')[2];
		$('#Subtotal').val(datos3)


		var hoy = new Date();
		var dd = hoy.getDate();
		var mm = hoy.getMonth()+1; //hoy es 0!
		var yyyy = hoy.getFullYear();

		if(dd<10) {
		    dd='0'+dd
		} 

		if(mm<10) {
		    mm='0'+mm
		} 
		
		hoy = yyyy+'-'+mm+'-'+dd;
		$adelantado=year+'-'+(month+j)+'-'+day;
		var f1=datos4;
		var f2=hoy;
		
		if(f1<f2){
    $('#Recargo').val(((datos3*10)/100));
    
    }
    else{
    	  $('#Recargo').val(0)
   }
   if(f2<f1){
   	var j=parseInt("1");
   	var i=parseInt(month);
   	if(month<10){
   		$('#FechaLimite').val(year+'-'+'0'+(i+j)+'-'+day)
   	}else
   	$('#FechaLimite').val(year+'-'+(i+j)+'-'+day)
   }
		if(datos[1]=="Si"){
		//$("#Iva").val(16);
		var tot=((datos3*16)/100)+ parseInt(Subtotal.value);
		$("#iva").val(((datos3*16)/100));
		$("#Total").val(tot+parseInt(Recargo.value))

	}else{
		
		$("#iva").val(0)
		$("#Total").val(datos3)
	}

	var t=document.getElementById('Total').value;
var cance=document.getElementById('cancelada').value;
if(cance==0){
	$('#Recargo').val(0);
	$('#Subtotal').val(0);
	$('#iva').val(0);
	$('#Total').val(0);
}

            });
        }
	

	
}
else{
	$('#Recargo').val(0)
	$('#Subtotal').val(datos[2])
	$('#NContrato').val(d[0])
	$('#CveConcepto').val(datos[0]);
	var hoy = new Date();
		var dd = hoy.getDate();
		var mm = hoy.getMonth()+2; //hoy es 0!
		var yyyy = hoy.getFullYear();			

	$('#FechaLimite').val(yyyy+'-'+mm+'-'+dd);
	if(datos[1]=="Si"){
		//$("#Iva").val(16);
		var tot=((datos[2]*16)/100)+ parseInt(Subtotal.value);
		$("#iva").val(((datos[2]*16)/100));
		$("#Total").val(tot+parseInt(Recargo.value))

	}else{
		
		$("#iva").val(0)
		$("#Total").val(datos[2])
	}

	
}
		if (datos[0]=="5") {
$('#NContrato').val(d[0])
var contratos=document.getElementById('NContrato').value;	 		
               nombres(contratos);
 function nombres(anio) {
            var posting2 = $.post( "/testpagado", { 
            	"_token": "{{ csrf_token() }}",
                'anion': anio
            	 } 
            );
            posting2.done(function( dt ) {
            });
            var posting = $.post( "/testconsulta", { 
            	"_token": "{{ csrf_token() }}",
                'anio': anio
            	 } 
            );
            posting.done(function( datos2 ) {
		var datos3=datos2.split('_')[0];
		var datos4=datos2.split('_')[1];
		var year=datos4.split('-')[0];
		var month=datos4.split('-')[1];
		var day=datos4.split('-')[2];
		$('#Subtotal').val(datos3)
		var hoy = new Date();
		var dd = hoy.getDate();
		var mm = hoy.getMonth()+1; //hoy es 0!
		var yyyy = hoy.getFullYear();
		if(dd<10) {
		    dd='0'+dd
		} 
		if(mm<10) {
		    mm='0'+mm
		} 
		hoy = yyyy+'-'+mm+'-'+dd;
		$adelantado=year+'-'+(month+j)+'-'+day;
		var f1=datos4;
		var f2=hoy;
		if(f1<f2){
    $('#Recargo').val(((datos3*10)/100));
    }
    else{
    	  $('#Recargo').val(0)
   }
   if(f2<f1){
   	var j=parseInt("1");
   	var i=parseInt(month);
   	if(month<10){
   		$('#FechaLimite').val(year+'-'+'0'+(i+j)+'-'+day)
   	}else
   	$('#FechaLimite').val(year+'-'+(i+j)+'-'+day)
   }
		if(datos[1]=="1"){
		//$("#Iva").val(16);
		var tot=((datos3*16)/100)+ parseInt(Subtotal.value);
		$("#iva").val(((datos3*16)/100));
		$("#Total").val(tot+parseInt(Recargo.value))

	}else{
		
		$("#Iva").val(0)
		$("#Total").val(datos3)
	}
	var t=document.getElementById('Total').value;
	var cance=document.getElementById('cancelada').value;
	if(cance==0){
	$('#Recargo').val(0);
	$('#Subtotal').val(0);
	$('#iva').val(0);
	$('#Total').val(0);
}
            });
         var posting3 = $.post( "/rezagospago", { 
            	"_token": "{{ csrf_token() }}",
                'anion': anio
            	 } 
            );
            posting3.done(function( dt ) {
				var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				var f=new Date();
				var ms=meses[f.getMonth()];
            	var fecha=dt.split('-')[1];
            	var monto=dt.split('-')[0];
            	var total=document.getElementById('Total').value;
            	var t=parseInt(total);
            	var m=parseInt(monto);
            	if(fecha==ms){
            		$("#Total").val(total)
            	}else{
            		$("#Total").val(m+t)
            	}            	
            });   
        }	
}
else{
	$('#Recargo').val(0)
	$('#Subtotal').val(datos[2])
	$('#NContrato').val(d[0])
	$('#CveConcepto').val(datos[0]);
	var hoy = new Date();
		var dd = hoy.getDate();
		var mm = hoy.getMonth()+2; //hoy es 0!
		var yyyy = hoy.getFullYear();			

	$('#FechaLimite').val(yyyy+'-'+mm+'-'+dd);
	if(datos[1]=="Si"){
		//$("#Iva").val(16);
		var tot=((datos[2]*16)/100)+ parseInt(Subtotal.value);
		$("#iva").val(((datos[2]*16)/100));
		document.getElementById('guardar').disabled=false;
		$("#Total").val(tot+parseInt(Recargo.value))

	}else{
		document.getElementById('guardar').disabled=false;
		$("#iva").val(0)
		$("#Total").val(datos[2])
	}
}
}
</script>
@endpush
@endsection
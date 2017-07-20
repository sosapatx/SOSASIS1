<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
<<<<<<< HEAD
use Illuminate\Support\Facedes\Input;

use Illuminate\Support\Facades\DB;
=======
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cliente/solicitante','SolicitanteController');
Route::resource('cliente/Predio','PredioController');
Route::resource('cliente/Ruta','RutaController');
Route::resource('cliente/Contrato', 'ContratoController');
<<<<<<< HEAD
Route::resource('cliente/ListaContratos','ListaContratosController');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('cobros','Cobranza1Controller');

Route::get('/cortediario', function(){
	//$corted=App\cobranza::all();
	$cortedrep=PDF::loadview('ReportesCobranza.cortediario');
	return $cortedrep->download('CorteDiario.pdf');
});

Route::post('/testpagado', function(){

	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes=$arrayMeses[date('m')-1];

	$pagado=DB::table('Cobranza')
	->where('NContrato',$_POST['anion'])
	->where('CveConcepto','1')
	->where('Periodo',$mes)
	->orderBy('idCobranza','desc')
	->first();

	if(is_null($pagado)){
		echo "0";
	}else{
		echo "1";
	}
});

Route::post('/testconsulta', function(){
	$resultado=DB::table('Mediciones')
	->where('NContrato',$_POST['anio'])
	->orderBy('IdMedicion','desc')
	->first();

	$pago=DB::table('Cobranza')
	->where('NContrato',$_POST['anio'])
	->where('pagado','1')
	->orderBy('idCobranza','desc')
	->first();

	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes=$arrayMeses[date('m')-1];

	$pagado=DB::table('Cobranza')
	->where('NContrato',4)
	->where('CveConcepto','1')
	->where('Periodo',$mes)
	->orderBy('idCobranza','desc')
	->first();
	
	if(is_null($pago)){
	echo $resultado->Importe.'_';
	}else{
		echo $resultado->Importe.'_'.$pago->Fecha_Limite;
	}
});


Route::post('/rezagospago',function(){
	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
     
    $mes=$arrayMeses[date('m')-1];
	$id=$_POST['anion'];
	$eliminar=DB::table('Rezago2')
	->where('NContrato',$id)
	->get();
	$t=0;
	foreach ($eliminar as $key => $e) {
		$cn=DB::table('Cobranza')
		->where('NContrato',$e->nContrato)
		->where('pagado',0)
		->orderBy('idCobranza','desc')
		->first();
		$t=$t+$cn->Total;
	}
	foreach ($eliminar as $key => $e) {
		$cn1=DB::table('Cobranza')
		->where('NContrato',$e->nContrato)
		->where('pagado',0)
		->orderBy('idCobranza','desc')
		->first();
		
	}
	echo $t."-".$cn1->Periodo;
});

Route::get('/cortemensual', function(Request $request){
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes=$arrayMeses[date('m')-1];
    $fecha = date('Y-m-j');
			$nuevafecha = strtotime ( '+1 month' , strtotime ( $fecha ) ) ;
			$nuevafecha = date ( 'Y-m-j' , $nuevafecha );		
	$nuevafecha1 = strtotime ( '+5 day' , strtotime ( $nuevafecha ) ) ;
	$nuevafecha1= date ( 'Y-m-j' , $nuevafecha1 );
	$hora=date('H'.':'.'i'.':'.'s');
	$ano=date('Y');
	$actual=date('Y-m-j');

	$cb=DB::table('Contratos')->get();
	$day=date("j");
	foreach ($cb as $key => $c) {
		$test=DB::table('Cobranza')
		->select('idCobranza','NContrato','FechaLimite','Periodo')
		->where('NContrato',$c->NContrato)
		->where('CveConcepto',5)
		->where('Periodo',$mes)
		->max('idCobranza');

		$test2=DB::table('Cobranza')
		->select('idCobranza','NContrato','FechaLimite','Periodo')
		->where('NContrato',$c->NContrato)
		->where('CveConcepto',1)
		->where('Periodo',$mes)
		->max('idCobranza');


		if(is_null($test)&&(is_null($test2)) &&($c->EdoToma=='Activo')&& ($day>27)){
			$resultado=DB::table('Medicion')
			->where('NContrato',$c->NContrato)
			->orderBy('IdMedicion','desc')
			->first();
			DB::table('Cobranza')
				->insert([
				['NContrato'=>$c->NContrato,'FechaPago'=>$actual,'HoraPago'=>$hora,'FechaLimite'=>$nuevafecha1,'Recargo'=>((($resultado->Importe)*10)/100),'Periodo'=>$mes,'Anio'=>$ano,'Factura'=>'0','Subtotal'=>$resultado->Importe,'iva'=>((($resultado->Importe)*16)/100),'Total'=>((($resultado->Importe)*10)/100)+($resultado->Importe)+((($resultado->Importe)*16)/100),'Cancelada'=>'0','pagado'=>'0',"CveConcepto"=>'5','caja'=>'0']
				]);

		}
		if(is_null($test)&&(is_null($test2))&& ($c->EdoToma=='Suspendido')&& ($day>27)){
			$resultado=DB::table('Medicion')
			->where('NContrato',$c->NContrato)
			->orderBy('IdMedicion','desc')
			->first();
			DB::table('Cobranza')
				->insert([
				['NContrato'=>$c->NContrato,'FechaPago'=>$actual,'HoraPago'=>$hora,'FechaLimite'=>$nuevafecha1,'Recargo'=>((($resultado->Importe)*10)/100),'Periodo'=>$mes,'Anio'=>$ano,'Factura'=>'0','Subtotal'=>$resultado->Importe,'iva'=>((($resultado->Importe)*16)/100),'Total'=>((($resultado->Importe)*10)/100)+($resultado->Importe)+((($resultado->Importe)*16)/100)/2,'Cancelada'=>'0','pagado'=>'0',"CveConcepto"=>'5','caja'=>'0']
				]);
		}
	}
$consulta=DB::table('Cobranza as cz')
	->join('Contratos as c','c.NContrato','=','cz.NContrato')
	->select('cz.Periodo','cz.Anio','cz.idCobranza','cz.pagado','c.EdoToma', 'c.NContrato','cz.CveConcepto')
	->get();

foreach ($consulta as $key => $c) {
$rezagos=DB::table('Rezago2')
->where('idCobranza','=',$c->NContrato)
->first();
	if (is_null($rezagos)&&($c->pagado==('0'))&&($day>01)&&($c->CveConcepto=="5" or $c->CveConcepto=="1")) {
		DB::table('Rezago2')
				->insert([
				['idCobranza'=>$c->idCobranza,'NContrato'=>$c->NContrato,'IdNotificacion'=>'1']
				]);	
}else{	
}
}

$eliminar=DB::table('Rezago2')
	->get();
	foreach ($eliminar as $key => $e) {
		$cn=DB::table('Cobranza')
		->where('NContrato',$e->nContrato)
		->orderBy('idCobranza','desc')
		->first();		
		if($cn->pagado=='1' &&($cn->CveConcepto=="5" or $cn->CveConcepto=="1")){	
		$cn1=DB::table('Cobranza')
		->where('NContrato',$cn->contrato)
		->where('Pagado','1')
		->first();
		
				DB::table('Rezago2')
				->where('nContrato',$cn1->contrato)
				->delete();
			}
	}

	//$cortem=App\cobranza::all();
	$cortemrep=PDF::loadview('ReportesCobranza.cortemensual');

return $cortemrep->download('CorteMensual.pdf');
});
?>
=======
Route::resource('cliente/ListaContratos','ListaContratosController');
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337

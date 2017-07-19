<?php

namespace sosapatex\Http\Controllers;

use Illuminate\Http\Request;
use sosapatex\mContrato;
use Illuminate\Support\Facades\Redirect;
use sosapatex\Http\Requests\ContratoFormRequest;
use DB;
use sosapatex\Http\Requests;
use Carbon\Carbon;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
          $query=trim($request->get('searchText'));
            $Contratos=DB::table('Contratos')->where('NContrato','LIKE','%'.$query.'%')
            ->orwhere('CURP','LIKE','%'.$query.'%')
            ->orderBy('NContrato','desc')
            ->paginate(7);
            return view('cliente.Contrato.index',["Contratos"=>$Contratos,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ruta=DB::table('Rutas')->where('nRuta','>=','0')->get();

        $predio=DB::table('predio')
        ->join ('solicitante','Predio.CURP','=','solicitante.CURP')
        ->select('predio.CURP','solicitante.nombreS' )
        ->get();

        $fecha=Carbon::now();
        $fecha=$fecha->format('d-m-y');

        return view('cliente.Contrato.create',array("predio"=>$predio,"ruta"=>$ruta));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoFormRequest $request)
    {
        $contrato=new mContrato;
        $contrato->CURP=$request->get('CURP');
        $contrato->nRuta=$request->get('rutaC');
        $contrato->Descuento=strtoupper($request->get('descuento'));
        $contrato->NMedidor=strtoupper($request->get('noMedidor'));
        $contrato->Marca=strtoupper($request->get('marca'));
        $contrato->DiametroToma=$request->get('diametroToma');
        $contrato->TipoToma=strtoupper($request->get('tipoToma'));
        $contrato->EdoToma=strtoupper($request->get('edoToma'));
        $contrato->Clasificacion=strtoupper($request->get('clasificacion'));
        $contrato->FechaContrato=strtoupper($request->get('fechaContrato'));
        $contrato->Longuitud=strtoupper($request->get('longuitud'));
        $contrato->Latitud=strtoupper($request->get('latitud'));
        $contrato->clave_TA=strtoupper($request->get('clave_TA'));
        $contrato->save();
        return Redirect::to('cliente/Contrato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("cliente.Contrato.edit",["contrato"=>mContrato::findOrFail($id)]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoFormRequest $request, $id)
    {
        $contrato=mContrato::findOrFail($id);
        //$contrato->predioC=strtoupper($request->get('predioC'));
        $contrato->CURP=strtoupper($request->get('CURP'));
        $contrato->nRuta=strtoupper($request->get('rutaC'));
        $contrato->Descuento=strtoupper($request->get('descuento'));
        $contrato->NMedidor=strtoupper($request->get('noMedidor'));
        $contrato->Marca=strtoupper($request->get('marca'));
        $contrato->DiametroToma=strtoupper($request->get('diametroToma'));
        $contrato->TipoToma=strtoupper($request->get('tipoToma'));
        $contrato->EdoToma=strtoupper($request->get('edoToma'));
        $contrato->Clasificacion=strtoupper($request->get('clasificacion'));
        $contrato->FechaContrato=strtoupper($request->get('fechaContrato'));
        $contrato->Longuitud=strtoupper($request->get('longuitud'));
        $contrato->Latitud=strtoupper($request->get('latitud'));
        $contrato->clave_TA=1;//strtoupper($request->get('clave_TA'));
        $contrato->update();
        return Redirect::to('cliente/Contrato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

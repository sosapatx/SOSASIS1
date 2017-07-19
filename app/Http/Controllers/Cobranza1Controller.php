<?php

namespace sosapatex\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\cobranza;
use Illuminate\Support\Facades\Redirect;

class Cobranza1Controller extends Controller
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
            $contratos=DB::table('Contratos as c')
            ->join('solicitante as s','c.CURP','=','s.CURP')
            ->select('c.NContrato','s.CURP','s.nombreS','s.telefonoS','s.Colonia','c.TipoToma','c.FechaContrato')
            ->where('s.nombreS','LIKE','%'.$query.'%')
            ->orwhere('s.CURP','LIKE','%'.$query.'%')
            ->orderBy('c.NContrato','desc')
            ->paginate(7);
            return view('Cobros.index',["contratos"=>$contratos,"searchText"=>$query]);

        }
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
         if($request){
           $contrato=DB::table('Contratos as c')
           ->join('solicitante as s','c.CURP','=','s.CURP')
           ->select('c.NContrato','s.CURP','s.nombreS','s.telefonoS','s.Colonia','c.TipoToma','c.FechaContrato','c.EdoToma')
            ->get();
        $cobranzas=DB::table('CatCobros')->get();
        return view("Cobros.create",["cobranzas"=>$cobranzas,"contrato"=>$contrato,'cob'=>DB::table('cobranza')->get()]);
    }else{

    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cobranzas=new cobranza();

            $cobranzas->NContrato = $request->get('NContrato');
            $cobranzas->FechaPago = $request->get('FechaPago');
            $cobranzas->HoraPago = $request->get('HoraPago');
            $cobranzas->FechaLimite = $request->get('FechaLimite');
            $cobranzas->Recargo = $request->get('Recargo');
            $cobranzas->Periodo = $request->get('Periodo');
            $cobranzas->Anio = $request->get('Anio');
            $cobranzas->Factura = $request->get('Factura');
            $cobranzas->Subtotal = $request->get('Subtotal');
            $cobranzas->iva = $request->get('iva');            
            $cobranzas->Total = $request->get('Total');
            $cobranzas->Cancelada = $request->get('Cancelada');
            $cobranzas->pagado = $request->get('pagado');
            $cobranzas->CveConcepto = $request->get('CveConcepto');
            $cobranzas->caja = $request->get('caja');
            $cobranzas->save();
            return Redirect::to('cobros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

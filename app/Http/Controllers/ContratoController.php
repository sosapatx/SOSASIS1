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
            $contrato=DB::table('contrato')->where('noContrato','LIKE','%'.$query.'%')
            ->orwhere('curpC','LIKE','%'.$query.'%')
            ->orderBy('noContrato','desc')
            ->paginate(7);
            return view('cliente.Contrato.index',["contrato"=>$contrato,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ruta=DB::table('ruta')->where('noRuta','>=','0')->get();

        $predio=DB::table('predio')
        ->join ('solicitante','predio.curpP','=','solicitante.curp')
        ->select('predio.curpP','solicitante.nombreS' )
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
        $contrato->curpC=$request->get('curpC');
        $contrato->rutaC=$request->get('rutaC');
        $contrato->descuento=strtoupper($request->get('descuento'));
        $contrato->noMedidor=strtoupper($request->get('noMedidor'));
        $contrato->marca=strtoupper($request->get('marca'));
        $contrato->diametroToma=$request->get('diametroToma');
        $contrato->tipoToma=strtoupper($request->get('tipoToma'));
        $contrato->edoToma=strtoupper($request->get('edoToma'));
        $contrato->clasificacion=strtoupper($request->get('clasificacion'));
        $contrato->fechaContrato=strtoupper($request->get('fechaContrato'));
        $contrato->longuitud=strtoupper($request->get('longuitud'));
        $contrato->latitud=strtoupper($request->get('latitud'));
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
        $contrato->predioC=strtoupper($request->get('predioC'));
        $contrato->curpC=strtoupper($request->get('curpC'));
        $contrato->rutaC=strtoupper($request->get('rutaC'));
        $contrato->descuento=strtoupper($request->get('descuento'));
        $contrato->noMedidor=strtoupper($request->get('noMedidor'));
        $contrato->marca=strtoupper($request->get('marca'));
        $contrato->diametroToma=strtoupper($request->get('diametroToma'));
        $contrato->tipoToma=strtoupper($request->get('tipoToma'));
        $contrato->edoToma=strtoupper($request->get('edoToma'));
        $contrato->clasificacion=strtoupper($request->get('clasificacion'));
        $contrato->fechaContrato=strtoupper($request->get('fechaContrato'));
        $contrato->longuitud=strtoupper($request->get('longuitud'));
        $contrato->latitud=strtoupper($request->get('latitud'));
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

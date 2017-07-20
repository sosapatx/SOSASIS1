<?php

namespace sosapatex\Http\Controllers;

use Illuminate\Http\Request;
use sosapatex\mPredio;
use Illuminate\Support\Facades\Redirect;
use sosapatex\Http\Requests\PredioFormRequest;
use DB;
use sosapatex\Http\Requests;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){}

    public function index(Request $request)
    {
        if($request){
          $query=trim($request->get('searchText'));
            $predio=DB::table('predio')->where('CURP','LIKE','%'.$query.'%')
            ->orderBy('IdPredio','desc')
            ->paginate(7);
            return view('cliente.predio.index',["predio"=>$predio,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitante=DB::table('solicitante')->where('idSolicitante','>=','0')->get();
        return view("cliente.predio.create",array("solicitante"=>$solicitante));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $predio=new mPredio;
        $predio->CURP=$request->get('CURP');
        $predio->Direccion=strtoupper($request->get('direccion')); //$request->get('nombreS');
        $predio->Colonia=strtoupper($request->get('colonia'));
        $predio->Localidad=strtoupper($request->get('localidad'));
        $predio->Transversal1=strtoupper($request->get('transversal1'));
        $predio->Transversal2=strtoupper($request->get('transversal2'));
        $predio->Manzana=$request->get('manzana');
        $predio->Lote=$request->get('lote');
        $predio->Frente_mtrs=$request->get('frente_m');
        $predio->Fondo_mtrs=$request->get('fondo_m');
        $predio->Superficie=$request->get('superficie');
        $predio->save();
        return Redirect::to('cliente/Predio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view("cliente.Predio.show",["predio"=>mPredio::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("cliente.Predio.edit",["predio"=>mPredio::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PredioFormRequest $request, $id)
    {
        $predio=new mPredio;
        $predio=mPredio::findOrFail($id);
        $predio->CURP=strtoupper($request->get('CURP'));
        $predio->Direccion=strtoupper($request->get('direccion')); 
        $predio->Colonia=strtoupper($request->get('colonia'));
        $predio->Localidad=strtoupper($request->get('localidad'));
        $predio->Transversal1=strtoupper($request->get('transversal1'));
        $predio->Transversal2=strtoupper($request->get('transversal2'));
        $predio->Manzana=$request->get('manzana');
        $predio->Lote=$request->get('lote');
        $predio->Frente_mtrs=$request->get('frente_m');
        $predio->Fondo_mtrs=$request->get('fondo_m');
        $predio->Superficie=$request->get('superficie');
        $predio->update();
        return Redirect::to('cliente/Predio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}

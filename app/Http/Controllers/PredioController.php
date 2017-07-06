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
            $predio=DB::table('predio')->where('curpP','LIKE','%'.$query.'%')
            ->orderBy('idPredio','desc')
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
        $predio->curpP=$request->get('curpP');
        $predio->direccion=strtoupper($request->get('direccion')); //$request->get('nombreS');
        $predio->colonia=strtoupper($request->get('colonia'));
        $predio->localidad=strtoupper($request->get('localidad'));
        $predio->transversal1=strtoupper($request->get('transversal1'));
        $predio->transversal2=strtoupper($request->get('transversal2'));
        $predio->manzana=strtoupper($request->get('manzana'));
        $predio->lote=strtoupper($request->get('lote'));
        $predio->frente_mtrs=strtoupper($request->get('frente_m'));
        $predio->fondo_mtrs=strtoupper($request->get('fondo_m'));
        $predio->superficie=strtoupper($request->get('superficie'));
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
        $predio->curpP=strtoupper($request->get('curpP'));
        $predio->direccion=strtoupper($request->get('direccion')); 
        $predio->colonia=strtoupper($request->get('colonia'));
        $predio->localidad=strtoupper($request->get('localidad'));
        $predio->transversal1=strtoupper($request->get('transversal1'));
        $predio->transversal2=strtoupper($request->get('transversal2'));
        $predio->manzana=strtoupper($request->get('manzana'));
        $predio->lote=strtoupper($request->get('lote'));
        $predio->frente_mtrs=strtoupper($request->get('frente_m'));
        $predio->fondo_mtrs=strtoupper($request->get('fondo_m'));
        $predio->superficie=strtoupper($request->get('superficie'));
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
        $predio=mPredio::findOrFail($id);
        $predio->manzana='Destroy';
        $predio->update();
        return Redirect::to('cliente/Predio');
    }
}

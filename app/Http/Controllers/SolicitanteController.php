<?php

namespace sosapatex\Http\Controllers;

use Illuminate\Http\Request;
use sosapatex\mSolicitante;
use sosapatex\mPredio;
use Illuminate\Support\Facades\Redirect;
use sosapatex\Http\Requests\SolicitanteFormRequest;
use DB;
use sosapatex\Http\Requests;


class SolicitanteController extends Controller
{
    public function __construct(){}

    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$solicitante=DB::table('solicitante')->where('curp','LIKE','%'.$query.'%')
            ->orwhere('nombreS','LIKE','%'.$query.'%')
    		->orderBy('idSolicitante','desc')
    		->paginate(7);
    		return view('cliente.solicitante.index',["solicitante"=>$solicitante,"searchText"=>$query]);
            	}
    }

    public function create(){
    	return view("cliente.solicitante.create");
    }

    public function store(SolicitanteFormRequest $request){
    	$solicitante=new mSolicitante;
    	$solicitante->curp=strtoupper($request->get('curp'));
        $solicitante->nombreS=strtoupper($request->get('nombreS')); 
    	$solicitante->direccionS=strtoupper($request->get('direccionS'));
    	$solicitante->telefonoS=$request->get('telefonoS');
    	$solicitante->celular=$request->get('celular');
        $solicitante->coloniaS=strtoupper($request->get('coloniaS'));
        $solicitante->rfc=strtoupper($request->get('rfc'));
        $solicitante->save();
    	return Redirect::to('cliente/solicitante');
    }

    public function show($id){
        return view("cliente.solicitante.show",["solicitante"=>mSolicitante::findOrFail($id)]);
    }

    public function edit($id){
        return view("cliente.solicitante.edit",["solicitante"=>mSolicitante::findOrFail($id)]);
    }

    public function update(SolicitanteFormRequest $request, $id){
        $solicitante=mSolicitante::findOrFail($id);
        $solicitante->curp=strtoupper($request->get('curp'));
        $solicitante->nombreS=strtoupper($request->get('nombreS'));
        $solicitante->direccionS=strtoupper($request->get('direccionS'));
        $solicitante->telefono=$request->get('telefono');
        $solicitante->celular=$request->get('celular');
        $solicitante->coloniaS=strtoupper($request->get('coloniaS'));
        $solicitante->rfc=strtoupper($request->get('rfc'));
        $solicitante->update();
        return Redirect::to('cliente/solicitante');
    }

    public function destroy($id){
        $solicitante=mSolicitante::findOrFail($id);
        $solicitante->nombreS='Destroy';
        $solicitante->update();
        return Redirect::to('cliente/solicitante');
    }

    public function llenar($id){
        $solicitante=mSolicitante::findOrFail($id);
        $solicitante->curp=get('curp');  
    }
}

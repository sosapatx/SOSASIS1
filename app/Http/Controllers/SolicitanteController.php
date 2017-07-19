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
    		$solicitante=DB::table('solicitante')->where('CURP','LIKE','%'.$query.'%')
            ->orwhere('nombreS','LIKE','%'.$query.'%')
    		->orderBy('CURP','desc')
    		->paginate(7);
    		return view('cliente.solicitante.index',["solicitante"=>$solicitante,"searchText"=>$query]);
            	}
    }

    public function create(){
    	return view("cliente.solicitante.create");
    }

    public function store(SolicitanteFormRequest $request){
    	$solicitante=new mSolicitante;
    	$solicitante->CURP=strtoupper($request->get('CURP'));
        $solicitante->nombreS=strtoupper($request->get('nombreS')); 
    	$solicitante->direccionS=strtoupper($request->get('direccionS'));
    	$solicitante->telefonoS=$request->get('telefonoS');
    	$solicitante->celular=$request->get('celular');
        $solicitante->colonia=strtoupper($request->get('colonia'));
        $solicitante->rfc=strtoupper($request->get('rfc'));
        $solicitante->email=$request->get('email');
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
        $solicitante->CURP=strtoupper($request->get('CURP'));
        $solicitante->nombreS=strtoupper($request->get('nombreS'));
        $solicitante->direccionS=strtoupper($request->get('direccionS'));
        $solicitante->telefonoS=$request->get('telefonoS');
        $solicitante->celular=$request->get('celular');
        $solicitante->colonia=strtoupper($request->get('colonia'));
        $solicitante->rfc=strtoupper($request->get('rfc'));
        $solicitante->email=$request->get('email');
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

<?php

namespace sosapatex\Http\Controllers;

use Illuminate\Http\Request;
use sosapatex\mRuta;
use Illuminate\Support\Facades\Redirect;
use sosapatex\Http\Requests\RutaFormRequest;
use DB;
use sosapatex\Http\Requests;

class RutaController extends Controller
{
    public function __construct(){}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
          $query=trim($request->get('searchText'));
            $Rutas=DB::table('Rutas')->where('nRuta','LIKE','%'.$query.'%')
            ->orwhere('calle','LIKE','%'.$query.'%')
            ->orderBy('nRuta','desc')
            ->paginate(7);
            return view('cliente.Ruta.index',["Rutas"=>$Rutas,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cliente.Ruta.create");   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RutaFormRequest $request)
    {
        $Rutas=new mRuta;
        //$ruta->noRuta=$request->get('noRuta');
        $Rutas->calle=$request->get('calle');
        $Rutas->colonia=$request->get('colonia');
        $Rutas->save();
        return Redirect::to('cliente/Ruta');
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
        return view("cliente.Ruta.edit",["Rutas"=>mRuta::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RutaFormRequest $request, $id)
    {
        $Rutas=mRuta::findOrFail($id);
        //$ruta->noRuta=$request->get('noRuta');
        $Rutas->calle=$request->get('calle');
        $Rutas->colonia=$request->get('colonia');
        $Rutas->update();
        return Redirect::to('cliente/Ruta');
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

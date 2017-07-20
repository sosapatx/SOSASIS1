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
<<<<<<< HEAD
            $Rutas=DB::table('Rutas')->where('nRuta','LIKE','%'.$query.'%')
            ->orwhere('Calle','LIKE','%'.$query.'%')
            ->orderBy('nRuta','desc')
            ->paginate(7);
            return view('cliente.Ruta.index',["Rutas"=>$Rutas,"searchText"=>$query]);
=======
            $ruta=DB::table('ruta')->where('noRuta','LIKE','%'.$query.'%')
            ->orderBy('noRuta','desc')
            ->paginate(7);
            return view('cliente.Ruta.index',["ruta"=>$ruta,"searchText"=>$query]);
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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
<<<<<<< HEAD
        $Rutas=new mRuta;
        //$ruta->noRuta=$request->get('noRuta');
        $Rutas->Calle=$request->get('calle');
        $Rutas->Colonia=$request->get('colonia');
        $Rutas->save();
=======
        $ruta=new mRuta;
        //$ruta->noRuta=$request->get('noRuta');
        $ruta->calle=$request->get('calle');
        $ruta->colonia=$request->get('colonia');
        $ruta->save();
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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
<<<<<<< HEAD
        return view("cliente.Ruta.edit",["Rutas"=>mRuta::findOrFail($id)]);
=======
        return view("cliente.Ruta.edit",["ruta"=>mRuta::findOrFail($id)]);
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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
<<<<<<< HEAD
        $Rutas=mRuta::findOrFail($id);
        //$ruta->noRuta=$request->get('noRuta');
        $Rutas->Calle=$request->get('calle');
        $Rutas->Colonia=$request->get('colonia');
        $Rutas->update();
=======
        $ruta=mRuta::findOrFail($id);
        //$ruta->noRuta=$request->get('noRuta');
        $ruta->calle=$request->get('calle');
        $ruta->colonia=$request->get('colonia');
        $ruta->update();
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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

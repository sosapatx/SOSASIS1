<?php

namespace sosapatex\Http\Controllers;

use Illuminate\Http\Request;
use sosapatex\mListaContratos;
use Illuminate\Support\Facades\Redirect;
<<<<<<< HEAD
use sosapatex\Http\Requests\ListaContratoFormRequest;
=======
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
use DB;
use sosapatex\Http\Requests;

class ListaContratosController extends Controller
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
<<<<<<< HEAD
            $listacontratos=DB::table('listacontratos')->where('noContrato','LIKE','%'.$query.'%')
            ->orwhere('nombreS','LIKE','%'.$query.'%')
=======
            $listacontratos=DB::table('listaContratos')->where('noContrato','LIKE','%'.$query.'%')
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
            ->orderBy('noContrato','desc')
            ->paginate(7);
            return view('cliente.ListaContratos.index',["listacontratos"=>$listacontratos,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        
=======
        //
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        
=======
        //
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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
        
=======
        //
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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
<<<<<<< HEAD
=======
        //
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
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

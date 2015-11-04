<?php

namespace App\Http\Controllers;

use App\Impuesto;
use App\ImpuestoVencimiento;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImpuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impuestos  = Impuesto::paginate(5);
        return view('impuesto.index', compact('impuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('impuesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $impuesto = new Impuesto($request->all());
        $impuesto->save();
        $request->session()->flash('alert-success', 'Se creo correctamente el impuesto');
        return \Redirect::route('impuesto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fechas     = ImpuestoVencimiento::where('impuestoId', $id)->get();
        $impuesto   = Impuesto::findOrFail($id);
        return view('impuesto.show',  array('fechas' => $fechas, 'impuesto' => $impuesto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $impuesto = Impuesto::findOrFail($id);
        return view('impuesto.edit', compact('impuesto'));
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
        $impuesto = Impuesto::findOrFail($id);
        $impuesto->fill($request->all());
        $impuesto->save();
        $request->session()->flash('alert-success', 'Se modifico correctamente el impuesto');
        return \Redirect::route('impuesto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $impuesto = Impuesto::findOrFail($id);
        $impuesto->delete();

        $mensaje    =   'Se borro correctamente el impuesto ' . $id;

        if($request->ajax()) 
        {
            return response()->json(
                [
                    'id'        => $id,
                    'mensaje'   => $mensaje
                ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImpuestoVencimiento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImpuestoVencimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new ImpuestoVencimiento($request->all());
        $res->save();

        $request->session()->flash('alert-success', 'Se creo correctamente el impuesto');
        return \Redirect::route('impuesto.show', $request->impuestoId);
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
        $impuestovencimiento = ImpuestoVencimiento::findOrFail($id);
        $impuestovencimiento->delete();
        $request->session()->flash('alert-success', 'Se borro correctamente la fecha');
        return \Redirect::route('impuesto.show', $request->impuestoId);
    }
}

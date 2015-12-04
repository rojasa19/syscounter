<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use App\Cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class clienteTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Tarea($request->all());
        $tarea->save();
        $request->session()->flash('alert-success', 'Se asigno correctamente la tarea al cliente');
        return \Redirect::route('cliente.show', $request->clienteId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes   = Cliente::paginate();
        $cliente   = Cliente::findOrFail($id);
        return view('tarea.create', array('clientes' => $clientes, 'cliente' => $cliente));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea     = Tarea::findOrFail($id);
        $clientes   = Cliente::paginate();
        $cliente    = Cliente::findOrFail($id);
        return view('tarea.edit', array(
            'tarea' => $tarea,
            'clientes' => $clientes, 
            'cliente' => $cliente
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tarea     = Tarea::findOrFail($request->clienteId);
        $tarea->receptor = $request->receptor;
        $tarea->titulo = $request->titulo;
        $tarea->fecha = $request->fecha;
        $tarea->textomsg = $request->textomsg;
        $tarea->save();
        $request->session()->flash('alert-success', 'Se modifico correctamente la tarea');
        return \Redirect::route('cliente.show', $request->clienteId);
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

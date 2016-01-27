<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Cliente;
use App\Impuesto;
use App\clienteImpuesto;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class clienteImpuestoController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes   = Cliente::where('idUsers', Auth::user()->id)->orderBy('name', 'asc')->paginate();
        $cliente    = Cliente::findOrFail($id);
        $impuestos  = Impuesto::where('aplica', $cliente->contribuyente)->lists('name', 'id');

        return view('cliente.createimpuestocliente',  array('clientes' => $clientes, 'cliente' => $cliente, 'impuestos' => $impuestos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clienteImpuesto = new clienteImpuesto();
        $clienteImpuesto->usuarioId = $request->usuarioId;
        $clienteImpuesto->clienteId = $request->clienteId;
        $clienteImpuesto->impuestoId = $request->impuestoId;
        $clienteImpuesto->receptor = $request->receptor;
        $clienteImpuesto->diasantes = $request->diasantes;
        $clienteImpuesto->textomsg = $request->textomsg;
        $clienteImpuesto->save();
        $request->session()->flash('alert-success', 'Se asigno correctamente el impuesto al cliente');
        return \Redirect::route('cliente.show', $request->clienteId);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $impuestosCli  = clienteImpuesto::findOrFail($id);
        $cliente    = Cliente::findOrFail($impuestosCli->clienteId);
        $clientes   = Cliente::where('idUsers', Auth::user()->id)->orderBy('name', 'asc')->paginate();
        $impuestos  = Impuesto::lists('name', 'id');

        return view('cliente.clienteimpuesto',  array(
                                            'cliente' => $cliente, 
                                            'clientes' => $clientes,
                                            'impuestos' => $impuestos,
                                            'impuestosCli' => $impuestosCli
                                        ));
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
        $impuestoCli = clienteImpuesto::findOrFail($id);
        $impuestoCli->usuarioId   = $request->usuarioId;
        $impuestoCli->clienteId   = $request->clienteId;
        $impuestoCli->impuestoId  = $request->impuestoId;
        $impuestoCli->receptor    = $request->receptor;
        $impuestoCli->diasantes   = $request->diasantes;
        $impuestoCli->textomsg    = $request->textomsg;
        $impuestoCli->save();
        $request->session()->flash('alert-success', 'Se modifico correctamente el impuesto');
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
        $impuestosCli  = clienteImpuesto::findOrFail($id);
        $impuestosCli->delete();
        return $id;
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Impuesto;
use App\Cliente;
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
    public function index(Request $request)
    {
        $impuestos  = Impuesto::name($request->name)
                                ->alcance($request->alcance)
                                ->vencimiento($request->vencimiento)
                                ->orderBy('name', 'asc')
                                ->paginate();
        $clientes   = Cliente::where('idUsers', Auth::user()->id)->orderBy('name', 'asc')->paginate();
        return view('impuesto.index', array('impuestos' => $impuestos, 'clientes' => $clientes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes   = Cliente::where('idUsers', Auth::user()->id)->orderBy('name', 'asc')->paginate();
        return view('impuesto.create', array('clientes' => $clientes));
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
        $impuesto->aplica = implode(', ', $request->aplica);
        //dd($impuesto);
        $impuesto->save();
        $request->session()->flash('alert-success', 'Se creo correctamente el impuesto');
        return \Redirect::route('impuesto.show', $impuesto->id);
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
        $clientes   = Cliente::where('idUsers', Auth::user()->id)->orderBy('name', 'asc')->paginate();
        $impuesto   = Impuesto::findOrFail($id);
        return view('impuesto.show',  array('fechas' => $fechas, 'impuesto' => $impuesto, 'clientes' => $clientes));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::where('idUsers', Auth::user()->id)->orderBy('name', 'asc')->paginate();
        $impuesto = Impuesto::findOrFail($id);
        $impuesto->aplica = explode(", ", $impuesto->aplica);
        return view('impuesto.edit', array('impuesto' => $impuesto, 'clientes' => $clientes));
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
        $impuesto->aplica = implode(', ', $request->aplica);
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

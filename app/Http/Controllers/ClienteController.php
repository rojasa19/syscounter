<?php

namespace App\Http\Controllers;

use Auth;
use App\Tarea;
use App\Cliente;
use App\Impuesto;
use App\clienteImpuesto;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::name($request->buscador)->orderBy('name', 'asc')->paginate();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clientes   = Cliente::paginate();
        return view('cliente.create', array('clientes' => $clientes));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente($request->all());
        $cliente->save();
        if($cliente->contribuyente != "")
        {
            $impuestos = Impuesto::select('impuesto.id as impuestoId', 'impuestovencimiento.textomsg as textomsg')
                                    ->join('impuestovencimiento', 'impuesto.id', '=', 'impuestovencimiento.impuestoId')
                                    ->where('impuesto.aplica', $cliente->contribuyente)
                                    ->where('impuestovencimiento.aplica', 'like', '%'.$cliente->cruitTercero.'%')
                                    ->paginate();

            foreach ($impuestos as $impuesto) 
            {
                $clienteimpuesto = new clienteImpuesto();
                $clienteimpuesto->usuarioId     = Auth::user()->id;
                $clienteimpuesto->clienteId     = $cliente->id;
                $clienteimpuesto->impuestoId    = $impuesto->impuestoId;
                $clienteimpuesto->diasantes     = "2";
                $clienteimpuesto->receptor      = "todos";
                $clienteimpuesto->textomsg      = $impuesto->textomsg;
                $clienteimpuesto->save();
            }
        }

        $request->session()->flash('alert-success', 'Se creo correctamente el cliente');
        return \Redirect::route('cliente.show', $cliente->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente        = Cliente::findOrFail($id);
        $tareas         = Tarea::where('clienteId', $id)->paginate();
        $clientes       = Cliente::paginate();
        $impuestos      = Impuesto::where('aplica', $cliente->contribuyente)->paginate();
        $impuestosCli   = clienteImpuesto::select(
                                'clienteImpuesto.id',
                                'clienteImpuesto.receptor',
                                'clienteImpuesto.diasantes',
                                'impuesto.name as impuesto'
                            )
                            ->join('impuesto', 'clienteImpuesto.impuestoId', '=', 'impuesto.id')
                            ->where(array(
                                    'clienteId' => $id,
                                    'usuarioId' => Auth::user()->id
                                ))
                            ->paginate();

        return view('cliente.show',  array(
                                            'cliente' => $cliente, 
                                            'clientes' => $clientes,
                                            'impuestos' => $impuestos,
                                            'tareas' => $tareas,
                                            'impuestosCli' => $impuestosCli
                                        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $clientes   = Cliente::paginate();
        return view('cliente.edit', array('cliente' => $cliente, 'clientes' => $clientes));
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
        $cliente = Cliente::findOrFail($id);
        $cliente->fill($request->all());
        $cliente->save();
        $request->session()->flash('alert-success', 'Se modifico correctamente el cliente');
        return \Redirect::route('cliente.show', $cliente->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        return $id;
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        $mensaje    =   'Se borro correctamente el cliente ' . $id;

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

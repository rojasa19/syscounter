<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Cliente;
use App\Impuesto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $impuestos = Impuesto::all();
        $clientes = Cliente::where('idUsers', Auth::user()->id)->get();
        $rows = array();
        
        //Comienzo de la logica, recorro impuestos
        foreach ($impuestos as $impuesto) 
        {
            $days = array();
            array_push($days, $impuesto->name);
            foreach ($this->getMonths(date('m'), 'Y-m-d') as $day) {
                $impuestoFecha = $this->getRelationImpuestoFecha($impuesto->id, $day);
                $arrayAbreviaciones = $this->getAbreviacionByDay($clientes, $impuestoFecha);
                array_push($days, $arrayAbreviaciones);
            }
            array_push($rows, $days);
        }
        //dd($rows);
        return view('home', array(
                'clientes' => $clientes, 
                'impuestos' => $impuestos, 
                'rows' => $rows, 
                'listdays' => $this->getMonths(date('m'), 'D-d')
            ));
    }

    /*
     * Funcion que retorna los dias en base al mes
     * @params String $month
     * @return Array $list
     */
    private function getMonths($month = null, $format = 'D-d') {
        $list = array();
        
        if(!$month)
        {
            $month = date('m');
        }
        
        $year = date('y');

        for($d=1; $d<=31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);    
            
            if (date('m', $time)==$month)
            {       
                $list[] = date($format, $time);
            }
        }
        return $list;
    }
    
    /*
     * Funcion que retorna los impuestos
     * @params Int $impuestoId, String $fecha
     * @return Array $list
     */
    private function getRelationImpuestoFecha($impuestoId, $fecha) {
        $impuestosFecha = DB::table('impuesto AS i')
                ->select(
                            'i.id',
                            'i.name',
                            'i.aplica',
                            'iv.impuestoId',
                            'iv.fecha',
                            'iv.aplica as cuitAplica'
                        )
                ->join('impuestovencimiento as iv', 'i.id', '=', 'iv.impuestoId')
                ->where('iv.impuestoId', '=' ,$impuestoId)
                ->where('iv.fecha', '=' ,$fecha)
                ->first();
        return $impuestosFecha;
    }

    /*
     * funcion que retorna el listado de abreviaciones
     * @params Obj $clientes, Date $impuestoFecha
     * @return Array $datos
     */
    private function getAbreviacionByDay($clientes, $impuestoFecha) {
        
        if(!$impuestoFecha){
            return null;
        }
        $datos = array();
        foreach ($clientes as $cliente) {
            if(
                in_array($cliente->cruitTercero, explode(',', $impuestoFecha->cuitAplica))
                && in_array($cliente->contribuyente, explode(', ', $impuestoFecha->aplica))
            ) {
                array_push($datos, $cliente->abreviacion);
            }
        }
        if(!$datos){
            return null;
        }
        return $datos;
    }
}

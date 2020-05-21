<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Ingreso_vehiculo;
use App\Ticket;
use DB;
use Carbon\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ticket = DB::table('vehiculos as v')
                ->join('ingreso_vehiculos as i', 'i.vehiculos_id', '=', 'v.id')
                ->join('tipo_vehiculos as tv', 'tv.id', '=', 'v.tipo')
                ->join('tarifas as t', 'tv.id', '=', 't.tipo_vehiculo_id')
                ->SELECT('i.id', 'v.placa', 'tv.nombre', 'i.fecha_ingreso', 't.valor')
                ->where('v.placa', 'LIKE', '%' . $query . '%')
                ->where('t.estado', 'Activo')
                ->where('i.estado', 'Activo')
                ->paginate(10);
            return view('ticket.index', ["ticket" => $ticket, "searchText" => $query]);
        }
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
        //
    }
}

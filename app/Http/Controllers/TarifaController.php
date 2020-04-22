<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TarifaFormRequest;
use App\Http\Requests;
use App\Tarifa;
use DB;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifa = Tarifa::all(); //findOrfail(1)
        return view('Tarifa.index')->with('tarifa', $tarifa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_vehiculo=DB::table('tipo_vehiculos')->select('tipo_vehiculos.nombre', 'tipo_vehiculos.id')->get();
        return view('Tarifa.create')->with('tipo_vehiculo',$tipo_vehiculo);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifaFormRequest $request)
    {
        $request->user()->authorizeRoles('admin');

        $tarifa = new Tarifa;
        $tarifa->tipo = $request->get('tipo_vehiculo_id');
        $tarifa->placa = $request->get('valor');
        $tarifa->modelo = $request->get('estado');
        $tarifa->save();
        return Redirect::to('tarifa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifas = Tarifa::find($id);
        return view('Tarifa.show', compact('tarifas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifa = tarifa::find($id);
        return view('tarifa.edit', compact('tarifa'));
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
        $request->user()->authorizeRoles('admin');

        $this->validate($request, ['tipo_vehiculo_id' => 'required',  'valor' => 'required', 'estado' => 'required']);
        tarifa::find($id)->update($request->all());
        return redirect()->route('tarifa.index')->with('success', 'Tarifa Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarifa::find($id)->delete();
        return redirect()->route('tarifa.index')->with('success', 'Tarifa Eliminada');
    }
}

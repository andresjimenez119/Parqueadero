<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PdfController extends Controller
{
    //Vehiculos
    public function imprimirVehiculos(Request $request)
    {
        $vehiculos = DB::table('vehiculos as ve')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 've.tipo')
            ->select('tv.nombre', 've.tipo', 've.id', 've.placa')
            ->get();
        $pdf = \PDF::loadView('Pdf.vehiculosPDF', ['vehiculos' => $vehiculos]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos.pdf');
    }

    public function imprimirVehiculoUnico(Request $request, $id)
    {
        $vehiculounico = DB::table('vehiculos as ve')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 've.tipo')
            ->select('tv.nombre', 've.id', 've.color', 've.placa', 've.tipo', 've.modelo')
            ->where('ve.id', '=', $id)->get();

        foreach ($vehiculounico as $ve) {
            $id = $ve->id;
            $color = $ve->color;
            $placa = $ve->placa;
            $tipovehiculo = $ve->nombre;
            $modelo = $ve->modelo;
        }
        $pdf = \PDF::loadView('Pdf.vehiculoUnicoPDF', [
            'id' => $id,
            'color' => $color,
            'placa' => $placa,
            'tipovehiculo' => $tipovehiculo,
            'modelo' => $modelo,
        ]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Vehiculo Unico.pdf');
    }

    //Tipos De Vehiculos
    public function imprimirTipoVehiculos(Request $request)
    {
        $tipovehiculos = DB::table('tipo_vehiculos as tv')
            ->select('tv.id', 'tv.nombre', 'tv.descripcion')
            ->get();
        $pdf = \PDF::loadView('Pdf.tipoVehiculosPDF', ['tipovehiculos' => $tipovehiculos]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Lista Tipo Vehiculos.pdf');
    }

    public function imprimirTipoVehiculoUnico(Request $request, $id)
    {
        $tipovehiculounico = DB::table('tipo_vehiculos as tv')
            ->select('tv.id', 'tv.nombre', 'tv.descripcion')
            ->where('tv.id', '=', $id)->get();

        foreach ($tipovehiculounico as $tv) {
            $id = $tv->id;
            $nombre = $tv->nombre;
            $descripcion = $tv->descripcion;
        }

        $pdf = \PDF::loadView('Pdf.tipoVehiculoUnicoPDF', [
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Tipo Vehiculo Unico.pdf');
    }

    //Tarifas
    public function imprimirTarifas(Request $request)
    {
        $tarifas = DB::table('tarifas as tar')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 'tar.tipo_vehiculo_id')
            ->select('tar.id', 'tar.tipo_vehiculo_id', 'tar.valor', 'tar.estado', 'tv.nombre')
            ->get();
        $pdf = \PDF::loadView('Pdf.tarifasPDF', ['tarifas' => $tarifas]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Lista Tarifas.pdf');
    }







    public function imprimirIngresos(Request $request)
    {
        $ingreso = DB::table('ingreso_vehiculos as i')
            ->join('vehiculos as ve', 've.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
            ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 've.table1_Id_Tipo')
            ->select('ve.Id_Vehiculo', 've.Placa', 'i.Fecha_Ingreso', 'i.Estado', 'tv.Nombre')->get();
        $pdf = \PDF::loadView('Pdf.ingreso_vehiculosPDF', ['ingreso' => $ingreso]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos.pdf');
    }


    //PDF DE UN INGRESO ESPECIFICO//
    public function imprimirIngresoEspecifico(Request $request, $id_ingreso)
    {

        $ingresoespecifico = DB::table('ingreso_vehiculos as i')
            ->join('vehiculos as ve', 've.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
            ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 've.table1_Id_Tipo')
            ->select('ve.Id_Vehiculo', 've.Placa', 'i.Id_Ingreso', 'i.Fecha_Ingreso', 'i.Estado', 'tv.Nombre')
            ->where('i.Id_Ingreso', '=', $id_ingreso)->get();

        foreach ($ingresoespecifico as $in) {
            $placavehiculo = $in->Placa;
            $fechaingreso = $in->Fecha_Ingreso;
            $estado = $in->Estado;
            $idingreso = $in->Id_Ingreso;
            $tiponombre = $in->Nombre;
        }

        //Pdf.vehiculoEspecificoPDF => Tiene que ser el mismo nombre que colocara en el views/Pdf/.....

        $pdf = \PDF::loadView('Pdf.ingresoEspecificoPDF', [
            'placavehiculo' => $placavehiculo,
            'fechaingreso' => $fechaingreso,
            'estado' => $estado,
            'idingreso' => $idingreso,
            'tiponombre' => $tiponombre,
        ]);


        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Ingreso Especifico.pdf');
    }

    //PDF DE TODOS LOS VEHICULOS RETIRADOS
    public function imprimirVehiculosRetirados(Request $request)
    {

        $salida = DB::table('salida_vehiculos as s')
            ->join('ingreso_vehiculos as i', 'i.Id_Ingreso', '=', 's.Ingreso_idIngreso')
            ->join('vehiculos as v', 'v.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
            ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 'v.table1_Id_Tipo')
            ->orderBy('Id_Ingreso', 'desc')
            ->select('i.Id_Ingreso', 'v.Placa', 'i.Fecha_Ingreso', 's.Fecha_salida', 'tv.Nombre', 's.Total')->get();
        $pdf = \PDF::loadView('Pdf.vehiculos_retiradosPDF', ['salida' => $salida]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos Retirados.pdf');
    }


    //SALIDA ESPECIFICA //
    public function imprimirSalida(Request $request, $id_ingreso)
    {

        $salidaespecifico = DB::table('salida_vehiculos as s')
            ->join('ingreso_vehiculos as i', 'i.Id_Ingreso', '=', 's.Ingreso_idIngreso')
            ->join('vehiculos as v', 'v.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
            ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 'v.table1_Id_Tipo')
            ->select('i.Id_Ingreso', 'v.Placa', 'i.Fecha_Ingreso', 's.Fecha_salida', 'tv.Nombre', 's.Total')

            ->where('i.Id_Ingreso', '=', $id_ingreso)->get();

        foreach ($salidaespecifico as $sa) {
            $placavehiculo = $sa->Placa;
            $fechaingreso = $sa->Fecha_Ingreso;
            $fechasalida = $sa->Fecha_salida;
            $idingreso = $sa->Id_Ingreso;
            $tiponombre = $sa->Nombre;
            $valortotal = $sa->Total;
        }

        $pdf = \PDF::loadView('Pdf.salida_vehiculosPDF', [
            'placavehiculo' => $placavehiculo,
            'fechaingreso' => $fechaingreso,
            'fechasalida' => $fechasalida,
            'idingreso' => $idingreso,
            'tiponombre' => $tiponombre,
            'valortotal' => $valortotal,

        ]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Salida Especifico.pdf');
    }
}

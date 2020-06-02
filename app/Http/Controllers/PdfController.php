<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function imprimirVehiculos(Request $request){
        $vehiculos = DB::table('vehiculos as ve')
        ->join('tipo_vehiculos as tv','tv.id','=','ve.tipo_vehiculo_id')
        ->select('tv.nombre','ve.tipo_vehiculo_id','ve.id','ve.placa')
        ->get();
        $pdf = \PDF::loadView('Pdf.vehiculosPDF',['vehiculos' => $vehiculos ]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos.pdf');
        }
}

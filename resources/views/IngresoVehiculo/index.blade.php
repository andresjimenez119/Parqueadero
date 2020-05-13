@extends('layouts.layout')
@section('contenido')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de ingresos <a href="/ingresoV/create"><button class="btn btn-primary">Nuevo</button></a></h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Fecha Ingreso</th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Vehiculo</th>
                    <th>Opciones</th>

                </thead>
                @foreach ($ingreso as $ingreso)
                <tr>
                    <td>{{$ingreso->Id_Ingreso}}</td>
                    <td>{{$ingreso->Fecha_Ingreso}}</td>
                    <td>{{$ingreso->Estado}}</td>
                    <td>{{$ingreso->Users_Id}}</td>
                    <td>{{$ingreso->Vehiculos_Id_Vehiculos}}</td>
                    <td>
                        <a href="{{URL::action('IngresoVehiculoController@edit',$ingreso->Id_Ingreso)}}">
                            <button class="btn btn-info">Editar</button></a>

                        <a href="" data-target="#modal-delete-{{$ingreso->Id_Ingreso}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
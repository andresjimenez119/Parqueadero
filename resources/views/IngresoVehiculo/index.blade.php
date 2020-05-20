@extends('layouts.layout')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="text-align: center">
        <h3>Listado de ingresos </h3>
        <div style="text-align: right">
            <a href="/ingresoV/create"><button class="btn btn-primary">Nuevo  <span class="glyphicon glyphicon-folder-open"></button></a>
            <a href="/salidaV"><button style="text-align: right" class="btn btn-success">Ir a Generar Salida  <span class="glyphicon glyphicon-log-out"></button></a>
            </div>
        <hr>
       
    </div>
</div>


<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="table responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Fecha Ingreso</th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Vehiculo - Placa</th>
                    <th>Opciones</th>

                </thead>
                @foreach ($ingreso as $ingreso)
                <tr>
                    <td>{{$ingreso->id}}</td>
                    <td>{{$ingreso->fecha_ingreso}}</td>
                    <td>{{$ingreso->estado}}</td>
                    <td>{{$ingreso->users_id}}</td>
                    <td>{{$ingreso->vehiculos_id}}</td>
                    <td>
                        <a href="{{URL::action('Ingreso_vehiculoController@edit',$ingreso->id)}}">
                            <button class="btn btn-info">Editar  <span class="glyphicon glyphicon-pencil"></button></a>

                        <a href="" data-target="#modal-delete-{{$ingreso->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar  <span class="glyphicon glyphicon-remove"></button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

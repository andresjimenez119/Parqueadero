@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Generar Ticket </h3>
            @include('Ticket.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Tipo de Vehiculo</th>
                    <th>Fecha Ingreso</th>
                    <th>valor hora</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($ticket as $ticket)
                <tr>
                    <td>{{ $ticket->id}}</td>
                    <td>{{ $ticket->placa}}</td>
                    <td>{{ $ticket->nombre}}</td>
                    <td>{{ $ticket->fecha_ingreso}}</td>
                    <td>{{ $ticket->valor}}</td>
                    <td>
                        <a href="{{route('ticket', [$ticket->placa, $ticket->id ,$ticket->valor])}}">
                            <button class="btn btn-info">Generar Salida</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
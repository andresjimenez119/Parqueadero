@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Registrar Nuevo Vehiculo</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::open(array('url'=>'vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Color</label>
            <input type="text" name="color" class="form-control" placeholder="Ingresa Color Del Vehiculo..." style="text-align: center">
        </div>
        <div class="form-group">
            <label for="descripcion">Tipo De Vehiculo</label>
            <select name="tipo" id="tipo" class="form-control input-md" style="text-align: center">
                <option value="O" disabled selected>Selecione Tipo</option>
                <option value="Automovil">Automovil</option>
                <option value="Motocicleta">Motocicleta</option>
            </select>
            <!--<input type="text" name="tipo" class="form-control" placeholder="Tipo...">-->
        </div>
        <div class="form-group">
            <label for="nombre">Placa</label>
            <input type="text" name="placa" class="form-control" placeholder="Ingresa Placa Del Vehiculo..." style="text-align: center">
        </div>
        <div class="form-group">
            <label for="descripcion">Modelo</label>
            <input type="text" name="modelo" class="form-control" placeholder="Ingresa Modelo Del Vehiculo..." style="text-align: center">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{ route('vehiculo.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></span></a>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
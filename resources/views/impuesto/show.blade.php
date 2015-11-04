@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Impuesto {{ $impuesto->name }}</div>
          <div class="panel-body">
            @include('errors.error-notification') 
            <div class="panel panel-default">
              <div class="panel-heading">Agregar fecha vencimiento</div>
              <div class="panel-body">
                {!! Form::open(['route' => 'impuestovencimiento.store', 'method' => 'post']) !!}
                  <input name="impuestoId" type="hidden" value="{{ $impuesto->id }}">
                  <div class="form-group">
                    {!! Form::label('fecha', 'Fecha vencimiento') !!}
                    {!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Ingrese fecha']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('aplica', 'CUIT que aplican') !!}
                    {!! Form::text('aplica', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los ultimos numeros que aplican (separado con ",")']) !!}
                  </div>
                  <a href="{{ URL::previous() }}" class="btn btn-dafault">Volver atras</a>
                  <button type="submit" class="btn btn-info pull-right">Agregar</button>
                {!! Form::close() !!}
              </div>
            </div>
            <table class="table table-condensed">
              <tr>
                <th>Fecha vencimiento</th>
                <th>CUIT aplican</th>
                <th>Acción</th>
              </tr>
              @foreach($fechas as $fecha)
                <tr data-id="{{ $fecha->id }}">
                  <td>{{ $fecha->fecha }}</td>
                  <td>{{ $fecha->aplica }}</td>
                  <td>
                    <a class="btn-delete" href="#!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
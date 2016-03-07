@extends('admin_template')

@section('aside')
  @foreach($clientes as $cliente)
  <li>
    <a href="{{ route('cliente.show', $cliente->id) }}">
      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>{{ $cliente->name }}
    </a>
  </li>
  @endforeach
@endsection

@section('admin')

        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Impuesto {{ $impuesto->name }}</h3>
          </div>
          <div class="box-body">
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
                  <div class="form-group">
                    {!! Form::label('contenidoemail', 'Mensaje de alerta') !!}
                    <textarea name="contenidoemail" rows="10" placeholder="Ingrese mensaje de alerta (opcional)..." class="form-control"></textarea>
                  </div>
                  <a href="{{ URL::previous() }}" class="btn btn-dafault">Volver atras</a>
                  <button type="submit" class="btn btn-info pull-right">Agregar</button>
                {!! Form::close() !!}
              </div>
            </div>
            <div class="box">
              <div class="box-body ">
                <table class="table table-condensed">
                  <tr>
                    <th><p class="text-center">Fecha vencimiento</p></th>
                    <th><p class="text-center">CUIT aplican</p></th>
                    <th><p class="text-center">Acción</p></th>
                  </tr>
                  @foreach($fechas as $fecha)
                    <tr data-id="{{ $fecha->id }}">
                      <td><p class="text-center">{{ $fecha->fecha }}</p></td>
                      <td><p class="text-center">{{ $fecha->aplica }}</p></td>
                      <td><p class="text-center">
                        <a class="btn-delete" href="#!" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                      </p></td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>

@endsection

{!! Form::open(['route' => ['impuestovencimiento.destroy', ':IMPUESTOVENCIMIENTO_ID'], 'method' => 'delete', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@section('scripts')
  <script>
    $(document).ready(function() {
        $('.btn-delete').click(function(e) 
        {
            e.preventDefault();
            var row   = $(this).parents('tr');
            var id    = row.data('id');
            var form  = $('#form-delete');
            var url   = form.attr('action').replace(':IMPUESTOVENCIMIENTO_ID', id);
            var data  = form.serialize();
            $.post(url, data, function(res) {
                row.fadeOut();
            }).fail(function() {
                row.show();
            });
        });
    });
  </script>
@endsection
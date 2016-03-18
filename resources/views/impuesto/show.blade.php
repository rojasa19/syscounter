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
            <a class="btn btn-primary pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Agregar vencimiento</a>
          </div>
          <div class="box-body">
            @include('errors.error-notification') 
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Datos del Impuesto</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('aplica', 'Tipo de contribuyente') !!}
                                <div class="checkbox">
                                    <label>
                                        <input name="aplica[]" disabled="disabled" type="checkbox" value="TO" {{(in_array('TO', explode(', ', $impuesto->aplica)))? 'checked' : ''}}> Todos
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="aplica[]" disabled="disabled" type="checkbox" value="SA" {{(in_array('SA', explode(', ', $impuesto->aplica)))? 'checked' : ''}}> Sociedad anónima
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="aplica[]" disabled="disabled" type="checkbox" value="SRL" {{(in_array('SRL', explode(', ', $impuesto->aplica)))? 'checked' : ''}}> Sociedad responsabilidad limitada
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="aplica[]" disabled="disabled" type="checkbox" value="SH" {{(in_array('SH', explode(', ', $impuesto->aplica)))? 'checked' : ''}}> Sociedad de hecho
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="aplica[]" disabled="disabled" type="checkbox" value="RI" {{(in_array('RI', explode(', ', $impuesto->aplica)))? 'checked' : ''}}> Responsable inscripto
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="aplica[]" disabled="disabled" type="checkbox" value="MONO" {{(in_array('MONO', explode(', ', $impuesto->aplica)))? 'checked' : ''}}> Monotributista
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('alcance', 'Alcance del impuesto') !!}
                                {!! Form::select('alcance', [
                                  ''      =>  'Seleccione alcance',
                                  'nacional'    =>  'Nacional',
                                  'provincial'  =>  'Provincial',
                                  'municipal'   =>  'Municipal',
                                ], $impuesto->alcance, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('vencimiento', 'Tipo vencimiento') !!}
                                {!! Form::select('vencimiento', [
                                    ''        =>  'Seleccione tipo',
                                    'mensual' =>  'Mensual',
                                    'anual'   =>  'Anual'
                                ], $impuesto->vencimiento, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Agregar fecha vencimiento</h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
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
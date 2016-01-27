@extends('admin_template')

@section('aside')
  @foreach($clientes as $cl)
  <li>
    <a href="{{ route('cliente.show', $cl->id) }}">
      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>{{ $cl->name }}
    </a>
  </li>
  @endforeach
@endsection

@section('admin')

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><strong>Cliente: </strong>{{ $cliente->name }}</h3>
    </div>
    <div class="box-body">
      @include('errors.error-notification') 

      <!--Datos personales-->
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos Personales</h3>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-condensed table-striped table-bordered">
                <tr>
                  <th class="text-center">Abreviacion</th>
                  <th class="text-center">Contribuyente</th>
                  <th class="text-center">CUIT</th>
                  <th class="text-center" colspan="2">Clave Fiscal</th>
                  <th class="text-center">E-mail</th>
                  <th class="text-center">Teléfono</th>
                  <th class="text-center">Acciones</th>
                </tr>
                <tr data-clienteid="{{ $cliente->id }}">
                  <td class="text-center">{{ $cliente->abreviacion }}</td>
                  <td class="text-center">{{ $cliente->contribuyente }}</td>
                  <td class="text-center">{{ $cliente->cruitPrimero }}-{{ $cliente->cruitSegundo }}-{{ $cliente->cruitTercero }}</td>
                  <td class="text-center">{{ $cliente->cruitEmpresa }}</td>
                  <td class="text-center">{{ $cliente->clavefiscal }}</td>
                  <td class="text-center">{{ $cliente->email }}</td>
                  <td class="text-center">{{ $cliente->telefono }}</td>
                  <td class="text-center">
                    <a href="{{ route('cliente.edit', $cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a id="deleteCliente" class="btn-delete" href="#!" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
              </table>
            </div>
            {!! Form::open(['route' => ['cliente.destroy', ':CLIENTE_ID'], 'method' => 'DELETE', 'id' => 'form-cliente-delete']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <!--Impuestos asignados-->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Impuestos asignados</h3>
          <a class="btn btn-info pull-right" href="{{ route('impuestocliente.show', $cliente->id) }}">
            Agregar impuesto
          </a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
              <table class="table table-condensed table-hover">
                <tr>
                  <th>Impuesto</th>
                  <th>Receptor</th>
                  <th>Dias</th>
                  <th>Acciones</th>
                </tr>
                @foreach($impuestosCli as $impuestoCli)
                <tr data-impuestoid="{{$impuestoCli->id}}">
                  <td>{{ $impuestoCli->impuesto }}</td>
                  <td>{{ $impuestoCli->receptor }}</td>
                  <td>{{ $impuestoCli->diasantes }}</td>
                  <td>
                    <a href="{{ route('impuestocliente.edit', $impuestoCli->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a id="deleteImpuesto" class="btn-delete" href="#!" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            {!! Form::open(['route' => ['impuesto.destroy', ':IMPUESTO_ID'], 'method' => 'DELETE', 'id' => 'form-impuesto-delete']) !!}
            {!! Form::close() !!}
        </div>
      </div>

      <!--Tareas asignadas-->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tareas</h3>
          <a class="btn btn-primary pull-right" href="{{ route('tarea.show', $cliente->id) }}">Agregar tarea</a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
              <table class="table table-condensed table-hover">
                <tr>
                  <th>Motivo</th>
                  <th>Receptor</th>
                  <th>Dias</th>
                  <th>Acciones</th>
                </tr>
                @foreach($tareas as $tarea)
                <tr data-tareaid="{{$tarea->id}}">
                  <td>{{ $tarea->titulo }}</td>
                  <td>{{ $tarea->receptor }}</td>
                  <td>{{ $tarea->fecha }}</td>
                  <td>
                    <a href="{{ route('tarea.edit', $tarea->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a id="deleteTarea" class="btn-delete" href="#!" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
                @endforeach
              </table>
              {!! Form::open(['route' => ['tarea.destroy', ':TAREA_ID'], 'method' => 'DELETE', 'id' => 'form-tarea-delete']) !!}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() 
    {
      //Script borra cliente
      $("#deleteCliente").click(function(e)
      {
        e.preventDefault();
        var row          = $(this).parents('tr');
        var clienteid    = row.data('clienteid');
        var formcliente  = $('#form-cliente-delete');
        var urlcliente   = formcliente.attr('action').replace(':CLIENTE_ID', clienteid);
        var datacliente  = formcliente.serialize();
        var res       = confirm('Esta seguro que desea borrar el cliente');
        
        if(res)
        {
          $.post(urlcliente, datacliente, function(res) 
          {
            row.fadeOut();
          });
        }
      });

      //Script borra impuesto
      $("#deleteImpuesto").click(function(e)
      {
        e.preventDefault();
        var row          = $(this).parents('tr');
        var impuestoid   = row.data('impuestoid');
        var formimpuesto = $('#form-impuesto-delete');
        var urlimpuesto  = formimpuesto.attr('action').replace(':IMPUESTO_ID', impuestoid);
        var dataimpuesto = formimpuesto.serialize();
        var res       = confirm('Esta seguro que desea borrar la tarea');
        
        if(res)
        {
          $.post(urlimpuesto, dataimpuesto, function(res) 
          {
            row.fadeOut();
          });
        }
      });

      //Script borra tarea
      $("#deleteTarea").click(function(e)
      {
        e.preventDefault();
        var row       = $(this).parents('tr');
        var tareaid   = row.data('tareaid');
        var formtarea = $('#form-tarea-delete');
        var urltarea  = formtarea.attr('action').replace(':TAREA_ID', tareaid);
        var datatarea = formtarea.serialize();
        var res       = confirm('Esta seguro que desea borrar la tarea');
        
        if(res)
        {
          $.post(urltarea, datatarea, function(res) 
          {
            row.fadeOut();
          });
        }
      });

    });
  </script>
@endsection

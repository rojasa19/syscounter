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

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Clientes</h3>

      <!-- Formulario de busqueda -->
      {!! Form::open(['route' => 'cliente.index', 'method' => 'get', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
        
        <div class="form-group">
          {!! Form::text('buscador', null, ['class' => 'form-control', 'placeholder' => 'Ingrese valor']) !!}
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      
      {!! Form::close() !!}

    </div>
    <div class="box-body">
        @include('errors.error-notification') 
        <a href="{{ route('cliente.create') }}" class="btn btn-info" style="margin-bottom: 20px">Nuevo cliente</a>
        <p class="pull-right">Hay {{ $clientes->total() }} clientes</p>
        <div class="table-responsive">
          <table class="table table-condensed table-striped table-bordered">
            <tr>
              <th class="text-center">Nombre</th>
              <th class="text-center">Abreviación</th>
              <th class="text-center">Contribuyente</th>
              <th class="text-center">CUIT</th>
              <th colspan="2" class="text-center">Clave Fiscal</th>
              <th class="text-center">E-mail</th>
              <th class="text-center">Teléfono</th>
              <th class="text-center">Acciones</th>
            </tr>
            @foreach($clientes as $cliente)
              <tr data-id="{{ $cliente->id }}">
                <td>{{ $cliente->name }}</td>
                <td>{{ $cliente->abreviacion }}</td>
                <td>{{ $cliente->contribuyente }}</td>
                <td>{{ $cliente->cruitPrimero . $cliente->cruitSegundo . $cliente->cruitTercero }}</td>
                <td>{{ $cliente->cruitEmpresa }}</td>
                <td>{{ $cliente->clavefiscal }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>
                  <a href="{{ route('cliente.show', $cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Ver"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                  <a href="{{ route('cliente.edit', $cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-delete" href="#!" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
    </div>
    <div class="box-footer">
        {!! $clientes->render() !!}
    </div>
  </div>

@endsection

{!! Form::open(['route' => ['cliente.destroy', ':cliente_ID'], 'method' => 'delete', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@section('script')
  <script>
    $(document).ready(function() {
      $('.btn-delete').click(function(e) 
      {
        e.preventDefault();

        var row   = $(this).parents('tr');
        var id    = row.data('id');
        var form  = $('#form-delete');
        var url   = form.attr('action').replace(':cliente_ID', id);
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
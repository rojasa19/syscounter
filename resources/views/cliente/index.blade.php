@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @include('errors.error-notification') 
        <div class="panel panel-default">
          <div class="panel-heading">Clientes</div>
          <div class="panel-body">
            <p class="pull-right">Hay {{ $clientes->total() }} clientes</p>
            <a href="{{ route('cliente.create') }}" class="btn btn-info" style="margin-bottom: 20px">Nuevo cliente</a>
            <table class="table table-condensed">
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>CUIT</th>
                <th>Contribuyente</th>
                <th>E-mail</th>
                <th>Telefono</th>
                <th>Acciones</th>
              </tr>
              @foreach($clientes as $cliente)
                <tr data-id="{{ $cliente->id }}">
                  <td>{{ $cliente->id }}</td>
                  <td>{{ $cliente->name }}</td>
                  <td>{{ $cliente->contribuyente }}</td>
                  <td>{{ $cliente->cruitPrimero . $cliente->cruitSegundo . $cliente->cruitTercero }}</td>
                  <td>{{ $cliente->email }}</td>
                  <td>{{ $cliente->telefono }}</td>
                  <td>
                    <a href="{{ route('cliente.show', $cliente->id) }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                    <a href="{{ route('cliente.edit', $cliente->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn-delete" href="#!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </table>
            {!! $clientes->render() !!}
          </div>
        </div>
      </div>
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
@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @include('errors.error-notification') 
        <div class="panel panel-default">
          <div class="panel-heading">Impuestos</div>
          <div class="panel-body">
            <p class="pull-right">Hay {{ $impuestos->total() }} impuestos</p>
            <a href="{{ route('impuesto.create') }}" class="btn btn-info" style="margin-bottom: 20px">Nuevo Impuesto</a>
            <table class="table table-condensed">
              <tr>
                <th>#</th>
                <th>Impuesto</th>
                <th>Aplica</th>
                <th>Acciones</th>
              </tr>
              @foreach($impuestos as $impuesto)
                <tr data-id="{{ $impuesto->id }}">
                  <td>{{ $impuesto->id }}</td>
                  <td>{{ $impuesto->name }}</td>
                  <td>{{ $impuesto->aplica }}</td>
                  <td>
                    <a href="{{ route('impuesto.show', $impuesto->id) }}"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></a>
                    <a href="{{ route('impuesto.edit', $impuesto->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn-delete" href="#!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </table>
            {!! $impuestos->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

{!! Form::open(['route' => ['impuesto.destroy', ':IMPUESTO_ID'], 'method' => 'delete', 'id' => 'form-delete']) !!}
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
        var url   = form.attr('action').replace(':IMPUESTO_ID', id);
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
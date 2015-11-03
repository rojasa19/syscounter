@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Impuestos</div>
          <div class="panel-body">
            <p class="pull-right">Hay {{ $impuestos->total() }} impuestos</p>
            <a href="{{ route('impuesto.create') }}" class="btn btn-info" style="margin-bottom: 20px">Nuevo Impuesto</a>
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>Impuesto</th>
                <th>Aplica</th>
                <th colspan="2">Acciones</th>
              </tr>
              @foreach($impuestos as $impuesto)
                <tr>
                  <td>{{ $impuesto->id }}</td>
                  <td>{{ $impuesto->name }}</td>
                  <td>{{ $impuesto->aplica }}</td>
                  <td><a href=""><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                  <td><a href=""><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
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

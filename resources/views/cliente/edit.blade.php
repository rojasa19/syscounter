@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Modificar Cliente {{ $cliente->name }}</div>
          <div class="panel-body">
            {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'put']) !!}
              @include('cliente.partial.fields')
              <button type="submit" class="btn btn-info">Modificar</button>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

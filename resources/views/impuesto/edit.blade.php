@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Modificar Impuesto {{ $impuesto->name }}</div>
          <div class="panel-body">
            {!! Form::model($impuesto, ['route' => ['impuesto.update', $impuesto->id], 'method' => 'put']) !!}
              @include('impuesto.partial.fields')
              <button type="submit" class="btn btn-info">Modificar</button>
            {!! Form::close() !!}
            @include('impuesto.partial.destroy')
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

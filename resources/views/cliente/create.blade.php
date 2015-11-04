@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Nuevo Cliente</div>
          <div class="panel-body">
            {!! Form::open(['route' => 'cliente.store', 'method' => 'post']) !!}
              @include('cliente.partial.fields')
              <input type="hidden" name="idUsers" value="{{ Auth::user()->id }}">
              <button type="submit" class="btn btn-info">Crear</button>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

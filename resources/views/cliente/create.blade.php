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
        <h3 class="box-title">Nuevo Cliente</h3>
    </div>
    <div class="box-body">
      {!! Form::open(['route' => 'cliente.store', 'method' => 'post']) !!}
        @include('cliente.partial.fields')
        <input type="hidden" name="idUsers" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-info">Crear</button>
      {!! Form::close() !!}
    </div>
  </div>

@endsection

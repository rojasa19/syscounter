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
      <h3 class="box-title">Nuevo Impuesto</h3>
    </div>
    <div class="box-body">
      {!! Form::open(['route' => 'impuesto.store', 'method' => 'post']) !!}
        @include('impuesto.partial.fields')
    </div>
    <div class="box-footer">
        <a class="btn btn-default pull-right" href="{{ URL::previous() }}">Cancelar</a>
        <button type="submit" class="btn btn-info">Crear</button>
        {!! Form::close() !!}
    </div>
  </div>
@endsection

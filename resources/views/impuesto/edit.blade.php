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
      <h3 class="box-title">Modificar Impuesto: <strong>{{ $impuesto->name }}</strong></h3>
    </div>
    <div class="panel-body">
      {!! Form::model($impuesto, ['route' => ['impuesto.update', $impuesto->id], 'method' => 'put']) !!}
        @include('impuesto.partial.fieldsMod')
      </div>
      <div class="box-footer">
        <a class="btn btn-default pull-right" href="{{ URL::previous() }}">Cancelar</a>
        <button type="submit" class="btn btn-info">Modificar</button>
        {!! Form::close() !!}
    </div>
  </div>

@endsection

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
          <h3 class="box-title">Modificar Cliente {{ $cliente->name }}</h3>
        </div>
        <div class="box-body">
          {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'put']) !!}
          @include('cliente.partial.fields')
        </div>
        <div class="box-footer">  
          <a class="btn btn-default pull-right" href="{{ URL::previous() }}">Cancelar</a>
          <button type="submit" class="btn btn-info">Modificar</button>
          {!! Form::close() !!}
        </div>
  </div>

@endsection

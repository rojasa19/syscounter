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
    <h4 class="box-title">Nueva tarea</h4>
  </div>
  <div class="box-body">
    {!! Form::open(['route' => 'tarea.store', 'method' => 'post']) !!}
      <input type="hidden" name="usuarioId" value="{{ Auth::user()->id }}">
      <input type="hidden" name="clienteId" value="{{ $cliente->id }}">
      <div class="form-group">
        {!! Form::label('dirigido', 'Remitente de la alerta') !!}
        {!! Form::select('dirigido', [
                                    '' =>  'Seleccione receptor',
                                    'todos' =>  'Ambos',
                                    'contador' =>  'Contador',
                                    'cliente' =>  'Cliente',
                                    'ninguno' =>  'Ninguno'
                                  ], null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('titulo', 'Asunto de la tarea') !!}
        {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un asunto']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('fecha', 'Día de la tarea') !!}
        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('textomsgtarea', 'Mensaje de la tarea') !!}
        <textarea name="textomsg" class="form-control" rows="8"></textarea>
      </div>
  </div>
  <div class="box-footer">
    <a class="btn btn-default" href="{{ URL::previous() }}">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection
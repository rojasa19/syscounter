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
    <h4 class="box-title">Modificar tarea</h4>
  </div>
  <div class="box-body">
    {!! Form::open(['route' => 'tarea.update', 'method' => 'PUT']) !!}
      <input type="hidden" name="usuarioId" value="{{ Auth::user()->id }}">
      <input type="hidden" name="clienteId" value="{{ $cliente->id }}">
      <div class="form-group">
        {!! Form::label('receptor', 'Remitente de la alerta') !!}
        {!! Form::select('receptor', [
                                    ''      =>  'Seleccione receptor',
                                    'ambos'    =>  'Ambos',
                                    'contado'  =>  'Contador',
                                    'cliente'  =>  'Cliente',
                                    'ninguno'  =>  'Ninguno'
                                  ], $tarea->receptor, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('titulo', 'Asunto de la tarea') !!}
        {!! Form::text('titulo', $tarea->titulo, ['class' => 'form-control', 'placeholder' => 'Ingrese un asunto']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('fecha', 'Día de la tarea') !!}
        {!! Form::date('fecha', $tarea->fecha, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('textomsgtarea', 'Mensaje de la tarea') !!}
        <textarea name="textomsg" class="form-control" rows="8">{{ $tarea->textomsg }}</textarea>
      </div>
  </div>
  <div class="box-footer">
    <a class="btn btn-default" href="{{ URL::previous() }}">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection
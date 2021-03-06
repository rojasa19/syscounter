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
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="box-title">Asociar impuesto a cliente</h3>
  </div>
  <div class="modal-body">
    {!! Form::open(['route' => 'impuestocliente.store', 'method' => 'post']) !!}
      <input type="hidden" name="usuarioId" value="{{ Auth::user()->id }}">
      <input type="hidden" name="clienteId" value="{{ $cliente->id }}">
      <div class="form-group">
        {!! Form::label('impuestos', 'Impuestos') !!}
        {!! Form::select('impuestoId', $impuestos, null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('receptor', 'Remitente de la alerta') !!}
        {!! Form::select('receptor', [
                                    ''      =>  'Seleccione receptor',
                                    'todos'    =>  'Ambos',
                                    'contador'  =>  'Contador',
                                    'cliente'  =>  'Cliente',
                                    'ninguno'  =>  'Ninguno'
                                  ], null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('diasantes', 'Días antes') !!}
        {!! Form::text('diasantes', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los días antes para la alerta']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('textomsg', 'Mensaje de alerta') !!}
        <textarea name="textomsg" class="form-control" rows="8" placeholder="Si no ingresa ningun mensaje se ingresara el mensaje por defecto..."></textarea>
      </div>
  </div>
  <div class="box-footer">
    <a class="btn btn-default pull-right" href="{{ URL::previous() }}">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>
@endsection
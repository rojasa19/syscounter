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
      <h3 class="box-title"><strong>Cliente: </strong>{{ $cliente->name }}</h3>
    </div>
    <div class="box-body">
      @include('errors.error-notification') 

      <!--Datos personales-->
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos Personales</h3>
          <div class="box-body">
            <table class="table">
              <tr>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Abreviacion</th>
                <th>Telefono</th>
                <th>CUIT</th>
                <th>Acciones</th>
              </tr>
              <tr>
                <td>{{ $cliente->name }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->abreviacion }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->cruitPrimero }}-{{ $cliente->cruitSegundo }}-{{ $cliente->cruitTercero }}</td>
                <td>
                  <a href="{{ route('cliente.edit', $cliente->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-delete" href="#!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <!--Impuestos asignados-->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Impuestos asignados</h3>
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#impuesto">
            Agregar impuesto
          </button>
        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <th>Impuesto</th>
              <th>Receptor</th>
              <th>Dias</th>
              <th>Acciones</th>
            </tr>
            @foreach($impuestosCli as $impuestoCli)
            <tr>
              <td>{{ $impuestoCli->impuesto }}</td>
              <td>{{ $impuestoCli->receptor }}</td>
              <td>{{ $impuestoCli->diasantes }}</td>
              <td>
                <a href="{{ route('cliente.edit', $cliente->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a class="btn-delete" href="#!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

      <!--Impuestos asignados-->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tareas</h3>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tarea">
            Agregar tarea
          </button>
        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <th>Impuesto</th>
              <th>E-mail</th>
              <th>Dias</th>
              <th>Acciones</th>
            </tr>
          </table>
        </div>
    </div>
  </div>

<!-- Modal impuesto -->
<div class="modal fade" id="impuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo impuesto</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'impuestocliente.store', 'method' => 'post']) !!}
          <input type="hidden" name="usuarioId" value="{{ Auth::user()->id }}">
          <input type="hidden" name="clienteId" value="{{ $cliente->id }}">
          <div class="form-group">
            {!! Form::label('impuestos', 'Impuestos') !!}
            <select name="impuestoId" class="form-control">
              <option value="">Seleccione Impuesto</option>
              @foreach($impuestos as $impuesto)
              <option value="{{ $impuesto->id }}">{{ $impuesto->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('receptor', 'Remitente de la alerta') !!}
            {!! Form::select('receptor', [
                                        ''      =>  'Seleccione receptor',
                                        'ambos'    =>  'Ambos',
                                        'contado'  =>  'Contador',
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- Modal tarea -->
<div class="modal fade" id="tarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva tarea</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'cliente.store', 'method' => 'post']) !!}
          <input type="hidden" name="idCliente" value="{{ $cliente->id }}">
          <div class="form-group">
            {!! Form::label('titulo', 'Asunto de la tarea') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un asunto']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('diatarea', 'Día de la tarea') !!}
            {!! Form::date('diatarea', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('textomsgtarea', 'Mensaje de la tarea') !!}
            <textarea name="textomsg" class="form-control" rows="8"></textarea>
          </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
@endsection
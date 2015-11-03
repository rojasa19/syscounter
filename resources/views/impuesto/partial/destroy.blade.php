{!! Form::model($impuesto, ['route' => ['impuesto.destroy', $impuesto->id], 'method' => 'delete']) !!}
  <button type="submit" class="btn btn-danger pull-right">Eliminar</button>
{!! Form::close() !!}
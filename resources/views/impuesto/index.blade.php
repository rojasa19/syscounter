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
      <h3 class="box-title">Impuestos</h3>
      <p class="pull-right">Hay {{ $impuestos->total() }} impuestos</p>
    </div>
    <div class="box-body">
      @include('errors.error-notification') 
      <a href="{{ route('impuesto.create') }}" class="btn btn-info" style="margin-bottom: 20px">Nuevo Impuesto</a>

      <!-- Formulario de busqueda -->
      {!! Form::open(['route' => 'impuesto.index', 'method' => 'get', 'class' => 'navbar-form', 'role' => 'search']) !!}
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre impuesto']) !!}
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {!! Form::select('alcance', [
                                        ''      =>  'Seleccione alcance',
                                        'nacional'    =>  'Nacional',
                                        'provincial'  =>  'Provincial',
                                        'municipal'   =>  'Municipal',
                                      ], Input::only('alcance'), ['class' => 'form-control', 'id' => 'alcance']) !!}
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            {!! Form::select('vencimiento', [
                                        ''        =>  'Seleccione tipo',
                                        'mensual' =>  'Mensual',
                                        'anual'   =>  'Anual'
                                      ], Input::only('vencimiento'), ['class' => 'form-control', 'id' => 'vencimiento']) !!}
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </div>
      </div>
      {!! Form::close() !!}

      <table class="table table-condensed">
        <tr>
          <th>Impuesto</th>
          <th>Alcance del impuesto</th>
          <th>Tipo vencimiento</th>
          <th>Acciones</th>
        </tr>
        @foreach($impuestos as $impuesto)
          <tr data-id="{{ $impuesto->id }}">
            <td>{{ $impuesto->name }}</td>
            <td>{{ $impuesto->alcance }}</td>
            <td>{{ $impuesto->vencimiento }}</td>
            <td>
              <a href="{{ route('impuesto.show', $impuesto->id) }}" data-toggle="tooltip" data-placement="top" title="Ver"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></a>
              <a href="{{ route('impuesto.edit', $impuesto->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
              <a id="delete-impuesto" class="btn-delete" href="#!" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    <div class="box-footer">
      {!! $impuestos->render() !!}
    </div>
  </div>

@endsection

{!! Form::open(['route' => ['impuesto.destroy', ':IMPUESTO_ID'], 'method' => 'delete', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@section('script')
  <script>
    $(document).ready(function() {
      $('#delete-impuesto').click(function() 
      {
        alert("Entro!!!");
      }
    });
  </script>
@endsection
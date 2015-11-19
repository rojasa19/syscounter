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

      <!--Impuestos asignados-->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tareas</h3>
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

@endsection
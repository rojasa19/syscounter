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
      <h3 class="box-title">Dashboard</h3><hr>
      <div class="row">
        <div class="col-md-4">
          <select class="form-control" name="" id="">
            <option value="">Seleccione Impuesto</option>
            @foreach($impuestos as $impuesto)
              <option value="{{$impuesto->id}}">{{$impuesto->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-control" name="" id="">
            <option value="">Seleccione Cliente</option>
            @foreach($clientesfiltro as $cliFilter)
                <option value="{{$cliFilter->id}}">{{$cliFilter->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-control" name="" id="">
            <option value="">Seleccione mes en curso</option>
          </select>
        </div>
      </div>
    </div>
    <div class="box-body">
    </div>
    <div class="box-footer">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Impuestos</th>
                @foreach($listdays as $day)
                <th>{{ $day }}</th>
                @endforeach
            </tr>
            @foreach($rows as $row)
            <tr>
                @foreach($row as $dato)
                    @if(is_string($dato))
                    <td> {{ $dato }} </td>
                    @elseif (is_array($dato))
                    <td>
                        @foreach($dato as $abreviacion)
                        <span style="padding-left: 15px; padding-right: 15px;" class="label label-primary">{{$abreviacion}}</span>
                        @endforeach
                    </td>
                    @else
                    <td></td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>

@endsection
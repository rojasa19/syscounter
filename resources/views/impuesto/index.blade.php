@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Impuestos</div>
          <div class="panel-body">
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>Impuesto</th>
                <th>Acciones</th>
              </tr>
              @foreach($impuestos as $impuesto)

                

              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

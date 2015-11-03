@extends('app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Nuevo Impuestos</div>
          <div class="panel-body">
            {!! Form::open(['route' => 'impuesto.store', 'method' => 'post']) !!}

              <div class="form-group">
                {!! Form::label('name', 'Nombre impuesto') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre impuesto']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('aplica', 'Tipo de contribuyente') !!}
                {!! Form::select('aplica', [
                                            ''      =>  'Seleccione tipo',
                                            'TO'    =>  'Todos',
                                            'SA'    =>  'Sociedad anónima',
                                            'SRL'   =>  'Sociedad responsabilidad limitada',
                                            'SH'    =>  'Sociedad de hecho',
                                            'RI'    =>  'Responsable inscripto',
                                            'MONO'  =>  'Monotributista'
                                          ], null, ['class' => 'form-control']) !!}
              </div>
              <button type="submit" class="btn btn-info">Crear</button>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

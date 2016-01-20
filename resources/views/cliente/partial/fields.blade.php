<div class="form-group">
  {!! Form::label('name', 'Nombre cliente') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre cliente']) !!}
</div>
<div class="form-group">
  {!! Form::label('abreviacion', 'Abreviación nombre') !!}
  {!! Form::text('abreviacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese tres letras']) !!}
</div>
<div class="form-group">
  {!! Form::label('contribuyente', 'Tipo de contribuyente') !!}
  {!! Form::select('contribuyente', [
                              ''      =>  'Seleccione tipo',
                              'TO'    =>  'Todos',
                              'SA'    =>  'Sociedad anónima',
                              'SRL'   =>  'Sociedad responsabilidad limitada',
                              'SH'    =>  'Sociedad de hecho',
                              'RI'    =>  'Responsable inscripto',
                              'MONO'  =>  'Monotributista'
                            ], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('cruitPrimero', 'CUIT') !!}
  <div class="row">
    <div class="col-xs-12 col-md-4">{!! Form::text('cruitPrimero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese primeros dos digitos']) !!}</div>
    <div class="col-xs-12 col-md-4">{!! Form::text('cruitSegundo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese segundos digitos']) !!}</div>
    <div class="col-xs-12 col-md-4">{!! Form::text('cruitTercero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese ultimo digito']) !!}</div>
  </div>
</div>
<div class="form-group">
  {!! Form::label('cruitEmpresa', 'CUIT de clave fiscal') !!}
  {!! Form::text('cruitEmpresa', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de CUIT de la clave fiscal']) !!}
</div>
<div class="form-group">
  {!! Form::label('clavefiscal', 'Clave fiscal') !!}
  {!! Form::text('clavefiscal', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su clave fiscal']) !!}
</div>
<div class="form-group">
  {!! Form::label('email', 'E-mail') !!}
  {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese email cliente']) !!}
</div>
<div class="form-group">
  {!! Form::label('telefono', 'Telefono') !!}
  {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese telefono cliente']) !!}
</div>
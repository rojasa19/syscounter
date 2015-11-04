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
  {!! Form::text('cruitPrimero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese primeros dos digitos']) !!}
  {!! Form::text('cruitSegundo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese segundos digitos']) !!}
  {!! Form::text('cruitTercero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese ultimo digito']) !!}
</div>
<div class="form-group">
  {!! Form::label('email', 'E-mail') !!}
  {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese email cliente']) !!}
</div>
<div class="form-group">
  {!! Form::label('telefono', 'Telefono') !!}
  {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese telefono cliente']) !!}
</div>
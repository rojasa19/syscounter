<div class="form-group">
  {!! Form::label('name', 'Nombre impuesto') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre impuesto']) !!}
</div>
<div class="form-group">
  {!! Form::label('aplica', 'Tipo de contribuyente') !!}
  {!! Form::select('aplica[]', [
                              ''      =>  'Seleccione tipo',
                              'TO'    =>  'Todos',
                              'SA'    =>  'Sociedad anónima',
                              'SRL'   =>  'Sociedad responsabilidad limitada',
                              'SH'    =>  'Sociedad de hecho',
                              'RI'    =>  'Responsable inscripto',
                              'MONO'  =>  'Monotributista'
                            ], null, array('multiple' => true, 'class' => 'form-control')) !!}
</div>
<div class="form-group">
  {!! Form::label('alcance', 'Alcance del impuesto') !!}
  {!! Form::select('alcance', [
                              ''      =>  'Seleccione alcance',
                              'nacional'    =>  'Nacional',
                              'provincial'  =>  'Provincial',
                              'municipal'   =>  'Municipal',
                            ], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('vencimiento', 'Tipo vencimiento') !!}
  {!! Form::select('vencimiento', [
                              ''        =>  'Seleccione tipo',
                              'mensual' =>  'Mensual',
                              'anual'   =>  'Anual'
                            ], null, ['class' => 'form-control']) !!}
</div>
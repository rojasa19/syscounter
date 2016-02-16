<div class="form-group">
  {!! Form::label('name', 'Nombre impuesto') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre impuesto']) !!}
</div>
<div class="form-group">
  {!! Form::label('aplica', 'Tipo de contribuyente') !!}
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="TO" {{(in_array('TO', $impuesto->aplica))? 'checked' : ''}}> Todos
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="SA" {{(in_array('SA', $impuesto->aplica))? 'checked' : ''}}> Sociedad anónima
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="SRL" {{(in_array('SRL', $impuesto->aplica))? 'checked' : ''}}> Sociedad responsabilidad limitada
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="SH" {{(in_array('SH', $impuesto->aplica))? 'checked' : ''}}> Sociedad de hecho
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="RI" {{(in_array('RI', $impuesto->aplica))? 'checked' : ''}}> Responsable inscripto
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="MONO" {{(in_array('MONO', $impuesto->aplica))? 'checked' : ''}}> Monotributista
        </label>
    </div>
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
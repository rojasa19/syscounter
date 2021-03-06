<div class="form-group">
  {!! Form::label('name', 'Nombre impuesto') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre impuesto']) !!}
</div>
<div class="form-group">
  {!! Form::label('aplica', 'Tipo de contribuyente') !!}
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="TO"> Todos
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="SA"> Sociedad anónima
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="SRL"> Sociedad responsabilidad limitada
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="SH"> Sociedad de hecho
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="RI"> Responsable inscripto
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input name="aplica[]" type="checkbox" value="MONO"> Monotributista
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
@extends('app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Registrate</div>
 
                <div class="panel-body">
                    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            {!! Form::input('text', 'lastname', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            {!! Form::input('text', 'telefono', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Fecha Nacimiento</label>
                            {!! Form::input('date', 'nacimiento', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            {!! Form::password('password', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Password confirmation</label>
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Tipo Usuario</label>
                            <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                                <option value="">Seleccione tipo</option>
                                <option value="Personal">Personal</option>
                                <option value="Profesional">Profesional</option>
                            </select>
                        </div>

                        <div>
                            {!! Form::submit('send',['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
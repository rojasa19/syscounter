<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SYSCOUNTER</title>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/style.css') !!}
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registrate</div>
                        
                        <div class="flash-message" style="display: none">
                            <p class="alert alert-danger">El email ya existe<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        </div>
         
                        <div class="panel-body">
                            {!! Form::open(['route' => 'auth/register', 'class' => 'form', 'id' => 'form-register']) !!}

                                <div class="form-group">
                                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                    <label>Nombre completo</label>
                                    {!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    {!! Form::input('text', 'telefono', '', ['class'=> 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    {!! Form::email('email', '', ['id' => 'email', 'class'=> 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    {!! Form::password('password', ['class'=> 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Password confirmation</label>
                                    {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("form").submit(function(e) {
                    e.preventDefault();

                    var self = this;
                    var inputEmail = $('#email').val();
                    var token = $('#_token').val();

                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8000/checkuser",
                        data: {
                            _token: token,
                            email: inputEmail
                        },
                        cache: false
                    }).done(function(result) 
                    {
                        if (result == '')
                        {
                            self.submit();
                        } else {
                            $('.flash-message').show();
                        }
                    });
                });
            });
        </script>
    </body>
</html>
@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel" >
                <div class="panel-heading" style="background: #85b3f9; color: white;font-weight: bold;">Registrarse en Mu Online Server</div>
                <div class="panel-body">
                    <div class="alert alert-info">Éste es el formulario de registro de Mu Online Server. Intentá completar todos los campos con datos reales de usuario. Recordá que todos los datos de la cuenta son privados y sólo vos tenés que saberlo. </div>
                    
                    <form class="form-horizontal" id="register-form" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}                 
                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                <div id="img-contenedor">
                                    <img id="img-perfil" src="img/avatar.jpg" style="height: 50px;">
                                </div>                           
                            </div>
                            <div class="col-md-6">
                            <input data-multiple-caption="{count} files selected" multiple id="file" type="file" name="file" class="inputfile" accept="image/*" style="display: none">
                            <label id="labelImg" style="font-size: 13px;font-weight: bold;color: white;border:none;background: none;font-family: 'roboto', sans-serif; margin-top: 20px;background: #85b3f9;padding: 10px;border-radius: 3px;" for="file">Seleccionar imagen</label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ID de la cuenta</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" required autofocus autocomplete="false">
                                <small id="exist-username" style="color: #ea3b3b; font-size: 12px;display:none;">El ID ya existe.</small>
                                <small>Identificación que utilizarás para iniciar sesión. (4-10 dígitos)</small>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre de usuario</label>                            

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                                <small>Alias para el foro y comentarios en el sitio web.(4-15 dígitos)</small>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                                <small id="exist-email" style="color: #ea3b3b; font-size: 12px;display:none;">El e-mail ya existe.</small>
                                <small>Procurá poner un E-mail verdadero y evitá problemas futuros.</small>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <small>Utilizá una contraseña segura y que no te olvides. (4-10 dígitos)</small>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <small>Repetí la clave. No copies y pegues por las dudas. </small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Código de recuperación (PIN)</label>
                            
                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control" name="code" max="4" min="4" required>
                                <small>Si olvidás éste número no vas a poder recuperar la cuenta. (4 digitos)</small>
                            </div>
                        </div>
                        <div class="form-group">                            
                                <label for="myRange" class="col-md-4 control-label">Desliza a la derecha</label>                            
                            <div class="col-md-6" style="margin-top: 10px;">                            
                                <input type="range" min="1" max="100" value="0" class="slider" id="myRange">
                              
                            </div>
                        </div>

                    <div class="form-group" style="text-align: center; margin-bottom: 30px;">
                        <div class="checkbox">
                            <label>Al registrarme acepto los <a href="/rules">términos, condiciones y reglamento</a> de Mu Online Server</label>
                          </div>
                        </div>

                        <div class="form-group" style="text-align: center">                            
                                <a id="btn-register" style="" class="btn btn-primary disabled">
                                    Registrarme
                                </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-contenedor + img').remove();
                $('#img-contenedor').append('<img id="img-perfil" src="'+e.target.result+'" style="height:50px; width:50px; border-radius: 40px;" />');
            }
            reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function(){

        $("#file").change(function () {    
                $('#img-perfil').remove();                
                $('#img-perfil').hide('slow');
                filePreview(this);                
        });

        $("#myRange").change(function () {
            if($('#myRange').val() == 100){            
                $('#btn-register').removeClass("disabled");
            }else{
                $('#btn-register').addClass("disabled");
            }
        });



        $('#btn-register').click(function (){
            var username = true;
            var name = true;
            var email = true;
            var password = true;
            var code = true; 
            if($('#password').val().length != 0 || $('#password').val().length > 10 || $('#password').val().length < 4){
                if($('#password').val() != $('#password-confirm').val()){
                    $("#password").css('border', '1px solid #ff8e8e');
                    $("#password-confirm").css('border', '1px solid #ff8e8e');
                    password = false;                    
                }else{
                    $("#password").css('border', '1px solid #e7e7e7');
                    $("#password-confirm").css('border', '1px solid #e7e7e7');
                    password = true;
                }
            }else{
                $("#password").css('border', '1px solid #ff8e8e');
                $("#password-confirm").css('border', '1px solid #ff8e8e');
                password = false;
            }
            if($('#username').val().length == 0 || $('#username').val().length > 10 || $('#username').val().length < 4){
                $("#username").css('border', '1px solid #ff8e8e');
                username = false;
            }else{
                $("#username").css('border', '1px solid #e7e7e7');
                username = true; 
            }
            if($('#name').val().length == 0 || $('#name').val().length > 15 || $('#name').val().length < 4){             
                $("#name").css('border', '1px solid #ff8e8e');
                name = false;
            }else{
                $("#name").css('border', '1px solid #e7e7e7');
                name = true; 
            }     
            if($('#code').val().length == 0 || $('#code').val().length > 4 || $('#code').val().length < 4){             
                $("#code").css('border', '1px solid #ff8e8e');
                code = false;
            }else{
                $("#code").css('border', '1px solid #e7e7e7');
                code = true; 
            }                                   
            if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
                $("#email").css('border', '1px solid #ff8e8e');                                
                email = false;
            }else{
                var consulta = $("#email").val();
                $.ajax({
                        type: "POST",
                        url: "/comprobation.php",
                        data: "b="+consulta,
                        dataType: "html",
                        error: function(){
                                },
                        success: function(data){                            
                        if(data == 'yes'){
                            email = false;
                            $("#email").css('border', '1px solid #ff8e8e');
                            $("#exist-email").show('slow');
                        }else{
                            email = true;
                            $("#email").css('border', '1px solid #e7e7e7');   
                            $("#exist-email").hide('slow');                         
                                if(code === true && name === true && password === true && username === true && email === true){
                                    var consulta1 = $("#username").val();
                                        $.ajax({
                                            type: "POST",
                                            url: "/comprobationusername.php",
                                            data: "c="+consulta1,
                                            dataType: "html",
                                            error: function(){
                                            },
                                            success: function(data){                                                                        
                                                if(data == 'yes'){
                                                    username = false;
                                                    $("#username").css('border', '1px solid #ff8e8e');
                                                    $("#exist-username").show('slow');
                                                }else{
                                                    username = true;
                                                    $("#username").css('border', '1px solid #e7e7e7');   
                                                    $("#exist-username").hide('slow');                         
                                                if(code === true && name === true && password === true && username === true && email === true){
                                                    $("#register-form").submit();                            
                                                }
                                            }
                                        }                
                                    });                                                    
                        }
                        }
                        }                
                    });
            }
        });




        });
    </script>
@endsection

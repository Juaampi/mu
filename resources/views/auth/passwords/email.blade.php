@extends('layouts.app')

<!-- Main Content -->
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('reset'))
<script>swal("Perfecto!", "Haz reestablecido tu contraseña exitosamente. Recuerda que sólo tienes 3 cambios de contraseña. En caso de superarlos contactate con la administración.", "success");</script>
@endif
<div class="container">
    <div class="row" style="margin-top: 15vh; margin-bottom: 10vh">
        
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="reset-form" class="form-horizontal" role="form" method="POST" action="{{route('resetPassword')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail de la cuenta</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                <small id="noexist-email" style="color: #ea3b3b; font-size: 12px;display:none;">El e-mail no existe.</small>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">PIN</label>
                            
                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control" name="code" max="4" min="4" required>
                                <small id="noexist-code" style="color: #ea3b3b; font-size: 12px;display:none;">Número incorrecto.</small>
                                <small>Número de seguridad de la cuenta</small>
                            </div>
                        </div>
                    

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nueva Contraseña</label>

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
                            <label for="myRange" class="col-md-4 control-label">Desliza a la derecha</label>                            
                        <div class="col-md-6" style="margin-top: 10px;">                            
                            <input type="range" min="1" max="100" value="0" class="slider" id="myRange">
                          
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a id="btn-reset" class="btn btn-primary disabled">
                                   Cambiar contraseña
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){

    $("#file").change(function () {    
            $('#img-perfil').remove();                
            $('#img-perfil').hide('slow');
            filePreview(this);                
    });

    $("#myRange").change(function () {
        if($('#myRange').val() == 100){            
            $('#btn-reset').removeClass("disabled");
        }else{
            $('#btn-reset').addClass("disabled");
        }
    });



    $('#btn-reset').click(function (){         
        var email = true;
        var password = true;
        var code = true; 
        if($('#password').val().length != 0 && $('#password').val().length < 10 && $('#password').val().length > 4){
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
                    if(data == 'no'){
                        email = false;
                        $("#email").css('border', '1px solid #ff8e8e');
                        $("#noexist-email").show('slow');     
                                               
                    }else{
                        email = true;
                        $("#email").css('border', '1px solid #e7e7e7');   
                        $("#noexist-email").hide('slow');                         
                        if(code === true && password === true && email === true){
                                var consulta1 = $("#code").val();
                                var consulta2 = $("#email").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "/comprobationcode.php",
                                        data: {c: consulta1,d: consulta2},
                                        dataType: "html",
                                        error: function(){                                            
                                        },
                                        success: function(data){   
                                                                                                                                                          
                                            if(data == 'yes'){
                                                code = true;
                                                $("#code").css('border', '1px solid #e7e7e7');   
                                                $("#noexist-code").hide('slow');                                                       
                                            }else{
                                                code = false;
                                                $("#code").css('border', '1px solid #ff8e8e');
                                                $("#noexist-code").show('slow');   
                                            }                      
                                            if(code === true && password === true && email === true){
                                                $("#reset-form").submit();                            
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

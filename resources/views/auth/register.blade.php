@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel" >
                <div class="panel-heading" style="background: #85b3f9; color: white;font-weight: bold;">Registrarse en UnderMu Server</div>
                <div class="panel-body">
                    <div class="alert alert-info">Éste es el formulario de registro de UnderMu Server. Intentá completar todos los campos con datos reales de usuario. Recordá que todos los datos de la cuenta son privados y sólo vos tenés que saberlo. </div>
                    
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

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="pais" class="col-md-4 control-label">País
                            </label>

                            <div class="col-md-6">
                                <select id="pais" name="pais" class="form-control">
                                    <option value="AF">Afganistán</option>
                                    <option value="AL">Albania</option>
                                    <option value="DE">Alemania</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antártida</option>
                                    <option value="AG">Antigua y Barbuda</option>
                                    <option value="AN">Antillas Holandesas</option>
                                    <option value="SA">Arabia Saudí</option>
                                    <option value="DZ">Argelia</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaiyán</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrein</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BE">Bélgica</option>
                                    <option value="BZ">Belice</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermudas</option>
                                    <option value="BY">Bielorrusia</option>
                                    <option value="MM">Birmania</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia y Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brasil</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="BT">Bután</option>
                                    <option value="CV">Cabo Verde</option>
                                    <option value="KH">Camboya</option>
                                    <option value="CM">Camerún</option>
                                    <option value="CA">Canadá</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CY">Chipre</option>
                                    <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comores</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, República Democrática del</option>
                                    <option value="KR">Corea</option>
                                    <option value="KP">Corea del Norte</option>
                                    <option value="CI">Costa de Marfíl</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croacia (Hrvatska)</option>
                                    <option value="CU">Cuba</option>
                                    <option value="DK">Dinamarca</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egipto</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="AE">Emiratos Árabes Unidos</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="SI">Eslovenia</option>
                                    <option value="ES" selected>España</option>
                                    <option value="US">Estados Unidos</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Etiopía</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="PH">Filipinas</option>
                                    <option value="FI">Finlandia</option>
                                    <option value="FR">Francia</option>
                                    <option value="GA">Gabón</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GD">Granada</option>
                                    <option value="GR">Grecia</option>
                                    <option value="GL">Groenlandia</option>
                                    <option value="GP">Guadalupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GY">Guayana</option>
                                    <option value="GF">Guayana Francesa</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GQ">Guinea Ecuatorial</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="HT">Haití</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HU">Hungría</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IQ">Irak</option>
                                    <option value="IR">Irán</option>
                                    <option value="IE">Irlanda</option>
                                    <option value="BV">Isla Bouvet</option>
                                    <option value="CX">Isla de Christmas</option>
                                    <option value="IS">Islandia</option>
                                    <option value="KY">Islas Caimán</option>
                                    <option value="CK">Islas Cook</option>
                                    <option value="CC">Islas de Cocos o Keeling</option>
                                    <option value="FO">Islas Faroe</option>
                                    <option value="HM">Islas Heard y McDonald</option>
                                    <option value="FK">Islas Malvinas</option>
                                    <option value="MP">Islas Marianas del Norte</option>
                                    <option value="MH">Islas Marshall</option>
                                    <option value="UM">Islas menores de Estados Unidos</option>
                                    <option value="PW">Islas Palau</option>
                                    <option value="SB">Islas Salomón</option>
                                    <option value="SJ">Islas Svalbard y Jan Mayen</option>
                                    <option value="TK">Islas Tokelau</option>
                                    <option value="TC">Islas Turks y Caicos</option>
                                    <option value="VI">Islas Vírgenes (EEUU)</option>
                                    <option value="VG">Islas Vírgenes (Reino Unido)</option>
                                    <option value="WF">Islas Wallis y Futuna</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italia</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japón</option>
                                    <option value="JO">Jordania</option>
                                    <option value="KZ">Kazajistán</option>
                                    <option value="KE">Kenia</option>
                                    <option value="KG">Kirguizistán</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="LA">Laos</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LV">Letonia</option>
                                    <option value="LB">Líbano</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libia</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lituania</option>
                                    <option value="LU">Luxemburgo</option>
                                    <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MY">Malasia</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MV">Maldivas</option>
                                    <option value="ML">Malí</option>
                                    <option value="MT">Malta</option>
                                    <option value="MA">Marruecos</option>
                                    <option value="MQ">Martinica</option>
                                    <option value="MU">Mauricio</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">México</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldavia</option>
                                    <option value="MC">Mónaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Níger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk</option>
                                    <option value="NO">Noruega</option>
                                    <option value="NC">Nueva Caledonia</option>
                                    <option value="NZ">Nueva Zelanda</option>
                                    <option value="OM">Omán</option>
                                    <option value="NL">Países Bajos</option>
                                    <option value="PA">Panamá</option>
                                    <option value="PG">Papúa Nueva Guinea</option>
                                    <option value="PK">Paquistán</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Perú</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PF">Polinesia Francesa</option>
                                    <option value="PL">Polonia</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="UK">Reino Unido</option>
                                    <option value="CF">República Centroafricana</option>
                                    <option value="CZ">República Checa</option>
                                    <option value="ZA">República de Sudáfrica</option>
                                    <option value="DO">República Dominicana</option>
                                    <option value="SK">República Eslovaca</option>
                                    <option value="RE">Reunión</option>
                                    <option value="RW">Ruanda</option>
                                    <option value="RO">Rumania</option>
                                    <option value="RU">Rusia</option>
                                    <option value="EH">Sahara Occidental</option>
                                    <option value="KN">Saint Kitts y Nevis</option>
                                    <option value="WS">Samoa</option>
                                    <option value="AS">Samoa Americana</option>
                                    <option value="SM">San Marino</option>
                                    <option value="VC">San Vicente y Granadinas</option>
                                    <option value="SH">Santa Helena</option>
                                    <option value="LC">Santa Lucía</option>
                                    <option value="ST">Santo Tomé y Príncipe</option>
                                    <option value="SN">Senegal</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leona</option>
                                    <option value="SG">Singapur</option>
                                    <option value="SY">Siria</option>
                                    <option value="SO">Somalia</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="PM">St Pierre y Miquelon</option>
                                    <option value="SZ">Suazilandia</option>
                                    <option value="SD">Sudán</option>
                                    <option value="SE">Suecia</option>
                                    <option value="CH">Suiza</option>
                                    <option value="SR">Surinam</option>
                                    <option value="TH">Tailandia</option>
                                    <option value="TW">Taiwán</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TJ">Tayikistán</option>
                                    <option value="TF">Territorios franceses del Sur</option>
                                    <option value="TP">Timor Oriental</option>
                                    <option value="TG">Togo</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad y Tobago</option>
                                    <option value="TN">Túnez</option>
                                    <option value="TM">Turkmenistán</option>
                                    <option value="TR">Turquía</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UA">Ucrania</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistán</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="YE">Yemen</option>
                                    <option value="YU">Yugoslavia</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabue</option>
                                    </select>                                
                                <small>El país es importante a la hora de dar premios.</small>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <small>Utilizá una contraseña segura y que no te olvides. (6-10 dígitos)</small>
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

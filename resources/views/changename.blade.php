@extends('layouts.app')
@section('content')
@if(session()->has('success'))
<script>swal("Perfecto!", "Haz cambiado el nombre de tu personaje. Ahora puedes ingresar nuevamente.", "success");</script>
@endif
<div class="page-wrapper chiller-theme toggled" style="background: #fafafa">
    <a id="show-sidebar" class="btn btn-sm btn-dark" style="margin-top: -6px;font-size: 25px;z-index: 9999;margin-left: 30px">
      <i class="fa fa-bars" style="color: #85b3f9"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content" style="margin-top:30px;">
        <div class="sidebar-brand" style="margin-top: 60px;">
          <a href="/dashboard">Panel de control</a>
          <div id="close-sidebar">
            <i class="fa fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic">
            <img class="img-responsive img-rounded" @if(Auth::user()->img) src="img-perfil/{{Auth::user()->img}}" @else src="img-perfil/avatar.jpg" @endif  alt="User picture">
          </div>
          <div class="user-info">
            <span class="user-name">{{Auth::user()->memb_name}}
            </span>
            <span class="user-role">{{Auth::user()->memb___id}}</span>
            <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </span>
          </div>
        </div>        

        <div class="sidebar-search">
            <div>
                <strong>Wcoins <span style="float: right;"><img style="height: 20px;" src="img/coins.png"> @if(Auth::user()->shop) {{Auth::user()->shop->WCoinC }} @else 0 @endif </span></strong>
            </div>
          </div>
          <!-- sidebar-search  -->
        
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>General</span>
            </li>
            <li class="sidebar">
              <a href="/dashboard" class="menu-button">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
                <span>Información</span>                
              </a>
            </li>                  
            <li class="sidebar-dropdown"  style="background: #4c4c4c8c">
                <a class="btn-pointer">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <span>Personajes</span><span style="float:right;margin-right: -30px;"><i class="fa fa-angle-down" aria-hidden="true"></i></span>                  
                </a>
                <div class="sidebar-submenu">
                    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>                    
                  <ul >
                    @if(Auth::user()->characters())
                    @foreach(Auth::user()->characters()->get() as $character)                    
                    <li >                        
                        <a class="btn-pointer" id="{{$character->Name}}"><i class="fa fa-user" aria-hidden="true"></i> {{$character->Name}}</a></li>
                        <form id="{{$character->Name}}form" action="{{route('players')}}" method="POST">
                                 {{ csrf_field() }}          
                            <input type="hidden" value="{{$character->Name}}" name="name">    
                            <script>
                                $(document).ready(function(){
                            
                                   $("#<?php echo $character->Name ?>").click(function() {
                                       $("#<?php echo $character->Name ?>form").submit();    
                                   });
                                });
                               </script>                        
                        </form>                                                                   
                    @endforeach
                    @else
                        <li><a href="#">Sin personajes</a></li>
                    @endif
                  </ul>
                </div>
              </li>           
              
              
              <li class="sidebar">
                <a href="/configuration">
                  <i class="fa fa-cog" aria-hidden="true"></i>
                  <span>Configuración</span>                
                </a>
              </li>
            </ul>
          </div>
      <!-- sidebar-content  -->

    </nav>
    <!-- sidebar-wrapper  -->
    <div id="information" class="page-content" style="margin-top: 60px;width:100%">
      <div class="container" style="width:100%">
        <h2>Información de la cuenta</h2>
        <hr>       
            <p>Usted está a punto de cambiar el nombre del personaje <strong></strong>. Recuerde que una vez que lo cambie no podrá efectuar ningún reclamo ni volver el tiempo atrás. </p>                                                  
                        <p><div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Costo: <img src="img/coins.png" height="15px">300</strong></div></p>                         
                        <form id="changename-form" class="form-horizontal" role="form" method="POST" action="/changename">
                            {{ csrf_field() }}
                            <input type="hidden" name="memb___id" value="{{Auth::user()->memb___id}}">
                            <input type="hidden" name="name" value="{{$name}}">                          
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Nuevo nombre de {{$name}}<strong></strong></label>                            
                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control" name="newname" required autofocus>
                                    <small>Ingrese el nuevo nombre del personaje.(4-10 dígitos)</small>    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code" class="col-md-3 control-label">PIN</label>
                                
                                <div class="col-md-4">
                                    <input id="code" type="number" class="form-control" name="code" required>
                                    <small id="noexist-code" style="color: #ea3b3b; font-size: 12px;display:none;">Número incorrecto.</small>
                                    <small>Número de seguridad de la cuenta</small>
                                </div>
                            </div>                            
                            <div class="form-group">                            
                                <label for="myRange" class="col-md-3 control-label">Desliza a la derecha</label>                            
                            <div class="col-md-4" style="margin-top: 10px;">                            
                                <input type="range" min="1" max="100" value="0" class="slider" id="myRange">                              
                            </div>
                        </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                   <input id="btn-changename" type="submit" class="btn btn-primary disabled" value="Cambiar nombre">
                                </div>
                            </div>
                        </form>                      
                    </div>                  
                  </div>
              
                </div>
                          
                    
        
    
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>                    

  

  <script>      

  
$(document).ready(function(){  

$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


$("#myRange").change(function () {
            if($('#myRange').val() == 100){            
                $('#btn-changename').removeClass("disabled");
            }else{
                $('#btn-changename').addClass("disabled");
            }
        });



        $('#btn-changename').click(function (){            
            var name = true;                        
            var code = true;            
           
            if($('#name').val().length == 0 || $('#name').val().length > 10 || $('#name').val().length < 4){             
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
            if(code === true && name === true){                                                 
                                var consulta1 = $("#code").val();
                                var consulta2 = "<?php echo Auth::user()->mail_addr ; ?>";                                
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
                                            if(code === true && name === true){
                                                //$("#changename-form").submit();                            
                                            }
                                        }                                                    
                                });                                                    
                            }
        });
});
  </script>

@endsection
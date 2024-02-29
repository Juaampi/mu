@extends('layouts.app')
@section('content')


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
            <li class="sidebar" style="background: #4c4c4c8c">
              <a href="/coins" class="menu-button">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
                <span>Obtener Wcoins</span>                
              </a>
            </li>                      
            <li class="sidebar-dropdown">
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
        <h2>Donaciones por Wcoins</h2>
        <hr>
        <div class="row">
          <div class="col-md-4">
              <div class="panel">
              <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                  ¿Cómo obtener Wcoins? 
              </div>
              <div class="panel-body">
                <p>Para obtener Wcoins les dejamos éstas 2 plataformas de pago, las cuales son por ahora las preferidas de todos por lo sencillo y práctico que resulta comprar a través de ésta plataforma.</p>
                <p>Si decide optar por mercado pago deberá ingresar en el campo "Wcoins" la cantidad de Wcoins que quiera adquirir y luego pagar por la plataforma de Mercado Pago.</p> 
                <p>En cambio si opta por Paypal, el proceso es el mismo, pero con la diferencia que deberá pagar a través de Paypal.</p>
                <p>El proceso es automático por lo que al terminar de pagar, si la operación es exitosa, debera tener en su cuenta, el saldo anterior más lo recién adquirido. </p>
              </div>
          </div>
          </div>
          <div class="col-md-4">
              <div class="panel">
            <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                Mercado Pago
            </div>
            <div class="panel-body">
              <div class="row" style="text-align: center; margin-bottom: 10px;">
                <img src="img/mercadopago.png" style="height: 100px;">
              </div>
              <div class="row">
                <form action="{{route('mercadopago')}}" method="POST">
                  {{ csrf_field() }}  
                <div class="col-md-8">
                  <input name="wcoins" type="number" class="form-control" placeholder="Wcoins">
                </div>
                <div class="col-md-4">                  
                  <input type="submit" class="btn btn-primary" value="Comprar">
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel">
          <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
              Paypal
          </div>
          <div class="panel-body">
            <div class="row" style="text-align: center; margin-bottom: 10px;">
              <img src="img/paypal.png" style="height: 100px;">
            </div>
            <div class="row">
              <form action="{{route('paypal')}}" method="GET">
                {{ csrf_field() }}  
              <div class="col-md-8">
                <input name="wcoins" type="number" class="form-control" placeholder="Wcoins">
              </div>
              <div class="col-md-4">                  
                <input type="submit" class="btn btn-primary" value="Comprar">
              </div>
              </form>
            </div>
            
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          
          <div class="col-md-12">
            <table class="table table-stripped">
              <h2>Transacciones</h2>
              <thead>
              <th>Plataforma</th>
              <th>Wcoins</th>
              <th>Estado</th>
              <th>Fecha</th>
              </thead>
              <tbody>
                <tr>
                @foreach($preferencias as $preferencia)
                <td>{{$preferencia->plataforma}}</td>
                <td>{{$preferencia->wcoins}}</td>
                <td>
                  @if($preferencia->estado == 1)
                    <span class="badge badge-info" style="background: #e5c80c">Pendiente de pago</span>
                  @endif
                  @if($preferencia->estado == 2)
                    <span class="badge badge-success" style="background: green">Entregado</span>
                  @endif
                </td>
                <td>{{$preferencia->created_at}}</td>
                </tr>
                @endforeach                    
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>  
    
   
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>                    

  

  <script>      

  
$(document).ready(function(){

  function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#btn-submit').remove();
                $('#img-contenedor + img').remove();
                $('#img-contenedor').append('<img id="img-perfil" src="'+e.target.result+'" style="height:70px; width:70px; border-radius: 40px;" />');
                $('#img-contenedor').append('<br><input id="btn-submit" type="submit" value="Guardar Imagen" />');
            }
            reader.readAsDataURL(input.files[0]);
            }
        }        

        $("#file").change(function () {    
                $('#img-perfil').remove();                
                $('#img-perfil').hide('slow');
                filePreview(this);                
        });

        $("#btn-information").click(function() {
            $('html, body').animate({scrollTop:0});
            $("#information").show();
            $("#player").hide();    
        });      
        $("#btn-player").click(function() {
            $('html, body').animate({scrollTop:0});
            $("#information").hide();
            $("#player").show();    
        });      

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
                                console.log(consulta2);
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
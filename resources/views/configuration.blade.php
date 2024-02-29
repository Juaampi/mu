@extends('layouts.app')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('success'))
<script>swal("Perfecto!", "Haz actualizado tu imagen de perfil correctamente!", "success");</script>
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
            <li class="sidebar">
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
                <a href="/configuration" style="background: #4c4c4c8c">
                  <i class="fa fa-cog" aria-hidden="true"></i>
                  <span>Configuración</span>                
                </a>
              </li>
            </ul>
          </div>
    
    </nav>
    <!-- sidebar-wrapper  -->
    <div id="information" class="page-content" style="margin-top: 60px;width:100%">
      <div class="container" style="width:100%">
        <h2>Configuración de la cuenta</h2>
        <hr>
        <div class="row">
          <div class="col-md-4">
              <div class="panel">
              <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                  Datos personales
              </div>
              <div class="panel-body">
                    <a href="/password/reset">Cambiar Contraseña</a>
              </div>
              </div>
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
});
</script>
@endsection
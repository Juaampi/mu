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
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="#">
          <i class="fa fa-power-off"></i>
        </a>
      </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <div id="information" class="page-content" style="margin-top: 60px;width:100%">
      <div class="container" style="width:100%">
        <h2>Información de la cuenta</h2>
        <hr>
        <div class="row">
          <div class="col-md-4">
              <div class="panel">
              <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                  Datos personales
              </div>
              <div class="panel-body">
                <form method="POST" action="{{route('changeimage')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}  
                  <input type="hidden" value="{{Auth::user()->memb_guid}}" name="memb_guid" />
                  <p id="img-contenedor" style="text-align: center"><img id="img-perfil" @if(Auth::user()->img) height="60px" src="img-perfil/{{Auth::user()->img}}" @else src="img-perfil/avatar.jpg" height="60px" @endif></p>              
                  <input data-multiple-caption="{count} files selected" multiple id="file" type="file" name="file" class="inputfile" accept="image/*" style="display: none">
                  <p style="text-align: center"><label id="labelImg" style="font-size: 13px;font-weight: bold;color: white;border:none;background: none;font-family: 'roboto', sans-serif; margin-top: 20px;background: #85b3f9;padding: 10px;border-radius: 3px;" for="file">Cambiar imagen de perfil</label></p>
                </form>
              
            <p><strong>ID account: </strong>  {{Auth::user()->memb___id}}</p>
            <p><strong>Nombre de usuario: </strong> {{Auth::user()->memb_name}} </p>
            <p><strong>Registrado: </strong> {{Auth::user()->created_at}} </p>
            <p><strong>Email: </strong> {{Auth::user()->mail_addr}} </p>
            <p><strong>País: </strong> <img src="img/flags/{{Auth::user()->country}}.gif"> </p>
              </div>
          </div>
          </div>
          <div class="col-md-4">
              <div class="panel">
            <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                Créditos
            </div>
            <div class="panel-body">
          <p><strong>Wcoins: </strong>@if(Auth::user()->shop) {{Auth::user()->shop->WCoinC }} @else 0 @endif</p>
          <p><strong>Goblin Points: </strong> @if(Auth::user()->shop) {{Auth::user()->shop->GoblinPoint }} @else 0 @endif          
            </div>
            <div class="panel-footer">
                <a href="#">¿Cómo obtener Wcoins?</a>
            </div>
              </div>
        </div>
        <div class="col-md-4">
        </div>
        </div>
      </div>
    </div>  
</div>
@endsection
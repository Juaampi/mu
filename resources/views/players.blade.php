@extends('layouts.app')
@section('content')
@php 
use App\Character;
@endphp
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
    <div id="player" class="page-content" style="margin-top: 60px;width:100%;">
        <div class="container" style="width:100%">
          <h2>Personaje</h2>
          <hr>          
          @if(Auth::user()->characters()->get()->isEmpty())
            <div class="row">
                <div class="alert alert-danger">
                    Usted no cuenta con ningún personaje. Ingrese al juego y cree uno para ver estas opciones.
                </div>
            </div>  
            @else
                   
          <div class="row">              
            @php $character = Character::find($name) @endphp                            
            <div class="col-md-4">
                <div class="panel">
                <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                    {{$character->Name}}
                </div>
                <div class="panel-body" style="text-align: center">                    
                    <img src="img/class/{{$character->Class}}.png">
                    <hr>
              <p style="margin: 0px;"><strong>Nivel: </strong>  {{$character->cLevel}}<span></p>
              <p style="margin: 0px;"><strong>Master Level: </strong> {{$character->masterskill->MasterLevel}}</p>
              <p style="margin: 0px;"><strong>Clan: </strong> @if($character->guildmember){{$character->guildmember->G_Name }} @else ninguno @endif
              @if($character->guildmember)             
                @if($character->guildmember->G_Status == '128')
                    <img src="img/master.png" style="height: 15px;" title="MASTER">
               @endif
               @if($character->guildmember->G_Status == '64')
                    <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                @endif
                @if($character->guildmember->G_Status == '32')
                    <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                @endif
                @if($character->guildmember->G_Status == '0')
                <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                @endif                
            @endif
            </p>
            <p style="margin: 0px;"><strong>Patente: </strong>  
                @php $character->cLevel = $character->cLevel + $character->masterskill->MasterLevel; @endphp
                @if($character->cLevel >= 1 && $character->cLevel <= 50)                        
                    <span>Novato</span>
                @endif  
                @if($character->cLevel >= 51 && $character->cLevel <= 100)                        
                    <span>Aprendiz</span>
                @endif
                @if($character->cLevel >= 101 && $character->cLevel <= 150)                        
                    <span>Mensajero</span>
                @endif
                @if($character->cLevel >= 151 && $character->cLevel <= 200)                        
                    <span>Cazador</span>
                @endif
                @if($character->cLevel >= 201 && $character->cLevel <= 250)                        
                    <span>Asesino</span>
                @endif
                @if($character->cLevel >= 251 && $character->cLevel <= 300)                        
                    <span>Arquero</span>
                @endif
                @if($character->cLevel >= 301 && $character->cLevel <= 350)                        
                    <span>Lancero</span>
                @endif 
                @if($character->cLevel >= 351 && $character->cLevel <= 370)                        
                    <span>Caballero</span>
                @endif         
                @if($character->cLevel >= 371 && $character->cLevel <= 390)
                    <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                    <span>Soldado</span>
                @endif
                @if($character->cLevel >= 391 && $character->cLevel <= 400)
                    <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                    <span>Guerrero</span>
                @endif
                @if($character->cLevel >= 401 && $character->cLevel <= 410)
                    <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                    <span>Gladiador</span>
                @endif
                @if($character->cLevel >= 411 && $character->cLevel <= 420)
                    <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                    <span>General</span>
                @endif
                @if($character->cLevel >= 421 && $character->cLevel <= 425)
                    <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                    <span>Supremo</span>
                @endif
            </p>
            </div>
            <div class="panel-footer">                
                <p>
                    <form action="{{route('showChangeNameForm')}}" method="POST">
                             {{ csrf_field() }}          
                        <input type="hidden" name="name" value="{{$character->Name}}">
                        <input type="hidden" name="memb___id" value="{{Auth::user()->memb___id}}">
                        <input type="submit" style="color:gray; font-weight: bold;border: none; text-decoration: none;" value="Cambiar nombre"><span style="float: right;"><img src="img/coins.png" height="15px"> 300</span>                         
                    </form>
            </div>
            </div>
            </div>   
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                        Estadísticas de eventos
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>Evento</th>
                                <th>Puntos</th>
                            </thead>
                            <tbody>
                                <tr>
                                <td>
                                    Blood Castle
                                </td>
                                <td>
                                    <strong>@if(!$blood->isEmpty()){{$blood[0]->Score}}@else Sin puntos @endif</strong>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    Chaos Castle
                                </td>
                                <td>
                                    <strong>@if(!$chaos->isEmpty()){{$chaos[0]->Score}}@else Sin puntos @endif</strong>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                     Devil Square
                                </td>
                                <td>
                                <strong>@if(!$devil->isEmpty()){{$devil[0]->Score}}@else Sin puntos @endif</strong>
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                        Illusion Temple
                                    </td>              
                                    <td>
                                        <strong>@if(!$illusion->isEmpty()){{$illusion[0]->Score}}@else Sin puntos @endif</strong>
                                    </td>                      
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                    <div class="panel-footer">
                        Actualizado ahora mismo
                    </div>
                </div>
            </div>
                    <div class="col-md-4">
                        <div class="panel">
                        <div class="panel-heading" style="background: #31353d;color: #b5b5b5;font-weight: bold;">
                            Estadísticas personales
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Duelos Ganados:
                                        </td>
                                        <td>
                                            <strong>@if(!$duel->isEmpty()){{$duel[0]->WinScore}}@else Sin puntos @endif </strong>
                                        </td>
                                    </tr><tr>
                                        <td>
                                            Duelos Perdidos:
                                        </td>
                                        <td>             
                                            <strong> @if(!$duel->isEmpty()){{$duel[0]->LoseScore}}@else Sin puntos @endif  </strong>
                                        </td>
                                    </tr><tr>
                                        <td>
                                            Asesinatos:
                                        </td>
                                        <td>
                                            <strong>{{$character->Kills}}</strong>
                                        </td>
                                    </tr><tr>
                                        <td>
                                            Muertes:
                                        </td>     
                                        <td>
                                           <strong> {{$character->Deads}}</strong>
                                        </td>                                   
                                    </tr>
                                </tbody>
                            </table>                                                
                        </div>                        
                        <div class="panel-footer">
                            Actualizado ahora mismo
                        </div>
                    </div>
                    </div>
                    
            </div>      

                  
          </div>
          @endif
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
});
  </script>

@endsection
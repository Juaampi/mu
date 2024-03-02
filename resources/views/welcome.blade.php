@extends('layouts.app')



@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('success'))
<script>swal("Bienvenido!", "Te haz registrado exitosamente. Ahora puedes ingresar al juego con ésta cuenta.! Gracias por confiar en nosotros.", "success");</script>
@endif

<style>
    #btn-information{     
    cursor: pointer;    
    }
    #eternals-modals{     
    cursor: pointer;    
    }
    #leyendas-modals{     
    cursor: pointer;    
    }
    #aniquiladors-modals{     
    cursor: pointer;    
    }
    #duelistas-modals{     
    cursor: pointer;    
    }
     .swiper-container {
        width: 580px;
        height: 330px;
        border-radius: 3px;
        }
    .swiper-pagination{
    height: 60px;
    line-height: 60px;
    bottom: 0 !important;
    background: #000000db;
    border-top: 1px solid #237aff;
    text-align: left;
    padding-left: 40px;
    }
    .swiper-pagination-bullet{
        background: #cacaca;
        border-radius: 0%;
    }
    .swiper-pagination-bullet-active{
        background: #237aff;
        border-radius: 0%;
    }
    .btn-news:hover{
              -webkit-transition: width 2s ease-out;
-moz-transition: width 2s ease-out;
-ms-transition: width 2s ease-out;
-o-transition: width 2s ease-out;
transition: width 2s ease-out;
    }
    </style>

<div class="container-fluid" style="background-image: url('img/trailer.gif'); height: 100vh;">
<div class="container text-center" style="margin-top: 60vh;">
    <div class="row">        
       <div class="col-md-12" style="font-family:'Bowlby One SC', cursive;color:#237aff;font-size:60px;text-shadow: 2px 2px 2px black">
           UNDERMU <img src="img/logo.png" style="height: 100px"> <span>SEASON 6<p style="font-size: 40px;">Temporada 2</p></span>
     </div>      
    </div>
    
 </div>

 <div class="container text-center" style="background: black; width: 15%; border-radius: 10px;">                                     
    <p style="font-size: 22px;margin-bottom:0px;color: #ffffff;font-weight: 600;text-shadow: 1px 1px 1px grey;">ONLINE: <span style="color: rgb(48 151 209);">{{$onlines}}</span></p>                                                                                                                    
</div>
</div>


<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6">
            <div class="swiper-container" style="height: 324px;width: 100% !important; overflow: hidden;">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach($news as $newslider)
                        <div class="swiper-slide"><img src="img-news/{{$newslider->img}}" style="height: 100%;width: 100%"/>
                            <div> <h2 style="margin-top: -175px;padding:30px;color: white;text-shadow: #2f2d2d 1px 1px 1px;font-weight: bold;">{{$newslider->title}} 
                                <form action="/news" method="GET">
                                    <input type="hidden" value="{{$newslider->id}}" name="newid">
                                    <input type="submit" class="btn btn-primary" value="Más información">
                                </form></h2></div>
                            
                        </div>
                    @endforeach                                        
                </div>    
                <div class="swiper-pagination"></div>
         
            </div>
        </div>
        <div class="col-md-3" style="margin-left: 10px;" >
            <div class="panel" style="border-radius:2px;background: url(img/block2.jpg);margin-bottom: 0px;height: 330px;background-repeat: no-repeat;background-size: auto;">
                
                    
                
                <div class="panel-body">
                    <h4 style="margin-top:200px;color: white;font-weight: 600;text-shadow: 1px 1px 1px #0e0e0e;text-align:center;"> <strong>¿Todavía no creaste tu cuenta?</strong> Crela ya y jugá, gratis! Play2Win <a class="btn btn-primary btn-sm" href="/register">Registrarme</a></h4>
                                     
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin-left:-15px;">
            <div class="panel" style="background: url(img/block1.jpg);margin-bottom: 0px;height: 330px;background-repeat: no-repeat;background-size: auto;">                                                
                <div class="panel-body">
                    <h4 style="margin-top:200px;color: white;font-weight: 600;text-shadow: 1px 1px 1px #0e0e0e;text-align:center;"> <strong>Eventeá y aparecé en el salón de la fama de MuOnline Server <a class="btn btn-danger btn-sm" href="/ranking">Visitar Ranking</a></h4>                 
                </div>
            </div>
        </div>
    </div>
     <div class="row" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="panel" style="background: #e0e0e0">                
                <div class="panel-body">
                    <div class="row  mt-5">
                        <h3 style="font-family:'Bowlby One SC', cursive;color:#237aff;font-size:60px;text-shadow: 2px 2px 2px black" class="text-center"><strong>SALÓN DE LA FAMA</strong></h3>
                    </div>     
                               
                    <div class="panel" style="text-align: center;">
                        <div class="panel-heading" style="font-family:'Bowlby One SC', cursive;color:#237aff;font-size: 35px;text-shadow: 2px 2px 2px black">..::Eternals::..</div>
                        <div class="panel-body" style="margin-top: -10px;">
                        <p style="font-size: 12px;margin-bottom: 0px;">                                        
                            @php $eternals[0]->cLevel = $eternals[0]->cLevel + $eternals[0]->MasterLevel; @endphp                                        
                            <img src="img/class/{{$eternals[0]->Class}}.png" @if($eternals[0]->ConnectStat == 0) style="height: 90px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 90px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                        </p>                                        
                        <strong><a id="eternals-modals" data-toggle="modal" data-target="#eternals-modal" style="color:#636b6f">{{$eternals[0]->Name}}</a> 
                            @if($eternals[0]->AccountLevel == 1)
                            <span style="color: #ffffff;font-size: 12px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
                            @endif
                            @foreach($guild as $g)
                            @if($g->Name == $eternals[0]->Name)
                               @if($g->G_Status == '128')
                                    <img src="img/master.png" style="height: 15px;" title="MASTER">
                               @endif
                               @if($g->G_Status == '64')
                                    <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                @endif
                                @if($g->G_Status == '32')
                                    <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                @endif
                            @endif                        
                        @endforeach
                        </strong></div></div>

                                    <div id="eternals-modal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                      
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Información de <strong>{{$eternals[0]->Name}}</strong></h4>
                                            </div>
                                            @foreach($accs as $acc)
                                                @if($acc->memb___id == $eternals[0]->AccountID)                                                
                                                <div class="modal-body" style="background: #f5f5f5">        
                                                    <div class="card">                                                        
                                                        <div class="card-body text-center">
                                                        <img class="card-img-top" style="text-align: center; border-radius: 90px;" height="150px" width="150px" @if($acc->img) src="img-perfil/{{$acc->img}}" @else src="img-perfil/avatar.jpg" @endif alt="{{$acc->memb_name}}">
                                                        <h5 class="card-title" style="text-align: center">Nombre de Usuario <strong>{{$acc->memb_name}}</strong></h5>
                                                        <h5 class="card-title" style="text-align: center">Personaje <strong>{{$eternals[0]->Name}}</strong> <img src="img/class/{{$eternals[0]->Class}}.png" @if($eternals[0]->ConnectStat == 0) style="height: 30px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 30px;border: 2px solid #30ef00; border-radius: 40px;margin-top: -300px; margin-left: 56px;" @endif>                                                    </h5> 
                                                        <h5 class="card-title" style="text-align: center">Level <span style="color:rgb(8, 126, 236); font-size: 12px;">(Master Levels)</span> <strong>{{$eternals[0]->cLevel}}</strong> <span style="color:rgb(8, 126, 236)">({{$eternals[0]->MasterLevel}})</span></h5>                                                        
                                                        <h5 class="card-title" style="text-align: center">Guild: 
                                                            <?php $band = 0; ?>
                                                            @foreach($guilds as $gui)                                                            
                                                            @if($gui->Name == $eternals[0]->Name)
                                                               <strong> {{$gui->G_Name}} </strong> @foreach($guilds as $gui)
                                                                @if($gui->Name == $eternals[0]->Name)
                                                                   @if($gui->G_Status == '128')
                                                                        <img src="img/master.png" style="height: 15px;" title="MASTER">
                                                                   @endif
                                                                   @if($gui->G_Status == '64')
                                                                        <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                                                    @endif
                                                                    @if($gui->G_Status == '32')
                                                                        <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                                                    @endif
                                                                @endif                        
                                                            @endforeach                                                               
                                                                <?php $band = 1; ?>

                                                            @endif                                                         
                                                            @endforeach
                                                            @if($band == 0)
                                                                <strong>Sin Guild</strong>
                                                            @endif
                                                        </h5>      
                                                        <h5 class="card-title" style="text-align: center">Estadisticas de duelo: 
                                                        @foreach($duelista as $duel)
                                                            @if($duel->Name == $eternals[0]->Name)
                                                                <span alt="Ganados" style="color: green">{{$duel->WinScore}}</span> / <span alt="Perdidos" style="color: red"> {{$duel->LoseScore}}</span>
                                                            @endif
                                                        @endforeach
                                                        
                                                        </h5>                                                   
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                          </div>
                                      
                                        </div>
                                      </div>
                                
                            
                        
                    <div class ="row">
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading text-center">                                 
                                    <h5 style="margin: 0px;"><strong>..::Leyenda::..</strong></h5>
                                </div>
                                <div class="panel-body text-center" style="padding: 0px;">                                     
                                    <p style="font-size: 12px;margin-bottom: 0px;">                                        
                                        @php $leyenda[0]->cLevel = $leyenda[0]->cLevel + $leyenda[0]->MasterLevel; @endphp                                        
                                        <img src="img/class/{{$leyenda[0]->Class}}.png" @if($leyenda[0]->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                                    </p>                                        
                                    <strong><a id="leyendas-modals" data-toggle="modal" data-target="#leyenda-modal" style="color:#636b6f">{{$leyenda[0]->Name}}</a>
                                        @if($leyenda[0]->AccountLevel == 1)
                                        <span style="color: #ffffff;font-size: 12px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
                                        @endif
                                        @foreach($guild as $g)
                                        @if($g->Name == $leyenda[0]->Name)
                                           @if($g->G_Status == '128')
                                                <img src="img/master.png" style="height: 15px;" title="MASTER">
                                           @endif
                                           @if($g->G_Status == '64')
                                                <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                            @endif
                                            @if($g->G_Status == '32')
                                                <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                            @endif
                                        @endif                        
                                    @endforeach
                                    
                                    <div id="leyenda-modal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                      
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Información de <strong>{{$leyenda[0]->Name}}</strong></h4>
                                            </div>
                                            @foreach($accs as $acc)
                                                @if($acc->memb___id == $leyenda[0]->AccountID)                                                
                                                <div class="modal-body" style="background: #f5f5f5">        
                                                    <div class="card">                                                        
                                                        <div class="card-body text-center">
                                                        <img class="card-img-top" style="text-align: center; border-radius: 90px;" height="150px" width="150px" @if($acc->img) src="img-perfil/{{$acc->img}}" @else src="img-perfil/avatar.jpg" @endif alt="{{$acc->memb_name}}">
                                                        <h5 class="card-title" style="text-align: center">Nombre de Usuario <strong>{{$acc->memb_name}}</strong></h5>
                                                        <h5 class="card-title" style="text-align: center">Personaje <strong>{{$leyenda[0]->Name}}</strong> <img src="img/class/{{$leyenda[0]->Class}}.png" @if($leyenda[0]->ConnectStat == 0) style="height: 30px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 30px;border: 2px solid #30ef00; border-radius: 40px;margin-top: -300px; margin-left: 56px;" @endif>                                                    </h5> 
                                                        <h5 class="card-title" style="text-align: center">Level <span style="color:rgb(8, 126, 236); font-size: 12px;">(Master Levels)</span> <strong>{{$leyenda[0]->cLevel}}</strong> <span style="color:rgb(8, 126, 236)">({{$leyenda[0]->MasterLevel}})</span></h5>                                                        
                                                        <h5 class="card-title" style="text-align: center">Guild: 
                                                            <?php $band = 0; ?>
                                                            @foreach($guilds as $gui)                                                            
                                                            @if($gui->Name == $leyenda[0]->Name)
                                                               <strong> {{$gui->G_Name}} </strong> @foreach($guilds as $gui)
                                                                @if($gui->Name == $leyenda[0]->Name)
                                                                   @if($gui->G_Status == '128')
                                                                        <img src="img/master.png" style="height: 15px;" title="MASTER">
                                                                   @endif
                                                                   @if($gui->G_Status == '64')
                                                                        <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                                                    @endif
                                                                    @if($gui->G_Status == '32')
                                                                        <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                                                    @endif
                                                                @endif                        
                                                            @endforeach                                                               
                                                                <?php $band = 1; ?>

                                                            @endif                                                         
                                                            @endforeach
                                                            @if($band == 0)
                                                                <strong>Sin Guild</strong>
                                                            @endif
                                                        </h5>      
                                                        <h5 class="card-title" style="text-align: center">Estadisticas de duelo: 
                                                        @foreach($duelista as $duel)
                                                            @if($duel->Name == $leyenda[0]->Name)
                                                                <span alt="Ganados" style="color: green">{{$duel->WinScore}}</span> / <span alt="Perdidos" style="color: red"> {{$duel->LoseScore}}</span>
                                                            @endif
                                                        @endforeach
                                                        
                                                        </h5>                                                   
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                          </div>
                                      
                                        </div>
                                      </div>

                                    </strong>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading text-center">                                                                                              
                                    <h5 style="margin: 0px;"><strong>..::Aniquilador::..</strong></h5>            
                                </div>                                
                                <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                    <p style="font-size: 12px;margin-bottom: 0px;">                                        
                                        <img src="img/class/{{$aniquilador[0]->Class}}.png" @if($aniquilador[0]->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                                    </p>                                        
                                    <strong><a id="aniquiladors-modals" data-toggle="modal" data-target="#aniquilador-modal" style="color:#636b6f">{{$aniquilador[0]->Name}}</a>
                                        @if($aniquilador[0]->AccountLevel == 1)
                                        <span style="color: #ffffff;font-size: 12px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
                                        @endif
                                        @foreach($guild as $g)
                                        @if($g->Name == $aniquilador[0]->Name)
                                           @if($g->G_Status == '128')
                                                <img src="img/master.png" style="height: 15px;" title="MASTER">
                                           @endif
                                           @if($g->G_Status == '64')
                                                <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                            @endif
                                            @if($g->G_Status == '32')
                                                <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                            @endif
                                        @endif                        
                                    @endforeach

                                    <div id="aniquilador-modal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                      
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Información de <strong>{{$aniquilador[0]->Name}}</strong></h4>
                                            </div>
                                            @foreach($accs as $acc)
                                                @if($acc->memb___id == $aniquilador[0]->AccountID)                                                
                                                <div class="modal-body" style="background: #f5f5f5">        
                                                    <div class="card">                                                        
                                                        <div class="card-body text-center">
                                                        <img class="card-img-top" style="text-align: center; border-radius: 90px;" height="150px" width="150px" @if($acc->img) src="img-perfil/{{$acc->img}}" @else src="img-perfil/avatar.jpg" @endif alt="{{$acc->memb_name}}">
                                                        <h5 class="card-title" style="text-align: center">Nombre de Usuario <strong>{{$acc->memb_name}}</strong></h5>
                                                        <h5 class="card-title" style="text-align: center">Personaje <strong>{{$aniquilador[0]->Name}}</strong> <img src="img/class/{{$aniquilador[0]->Class}}.png" @if($aniquilador[0]->ConnectStat == 0) style="height: 30px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 30px;border: 2px solid #30ef00; border-radius: 40px;margin-top: -300px; margin-left: 56px;" @endif>                                                    </h5> 
                                                        <h5 class="card-title" style="text-align: center">Level <span style="color:rgb(8, 126, 236); font-size: 12px;">(Master Levels)</span> <strong>{{$aniquilador[0]->cLevel}}</strong> <span style="color:rgb(8, 126, 236)">({{$aniquilador[0]->MasterLevel}})</span></h5>                                                        
                                                        <h5 class="card-title" style="text-align: center">Guild: 
                                                            <?php $band = 0; ?>
                                                            @foreach($guilds as $gui)                                                            
                                                            @if($gui->Name == $aniquilador[0]->Name)
                                                               <strong> {{$gui->G_Name}} </strong> @foreach($guilds as $gui)
                                                                @if($gui->Name == $aniquilador[0]->Name)
                                                                   @if($gui->G_Status == '128')
                                                                        <img src="img/master.png" style="height: 15px;" title="MASTER">
                                                                   @endif
                                                                   @if($gui->G_Status == '64')
                                                                        <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                                                    @endif
                                                                    @if($gui->G_Status == '32')
                                                                        <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                                                    @endif
                                                                @endif                        
                                                            @endforeach                                                               
                                                                <?php $band = 1; ?>

                                                            @endif                                                         
                                                            @endforeach
                                                            @if($band == 0)
                                                                <strong>Sin Guild</strong>
                                                            @endif
                                                        </h5>      
                                                        <h5 class="card-title" style="text-align: center">Estadisticas de duelo: 
                                                        @foreach($duelista as $duel)
                                                            @if($duel->Name == $aniquilador[0]->Name)
                                                                <span alt="Ganados" style="color: green">{{$duel->WinScore}}</span> / <span alt="Perdidos" style="color: red"> {{$duel->LoseScore}}</span>
                                                            @endif
                                                        @endforeach
                                                        
                                                        </h5>                                                   
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                          </div>
                                      
                                        </div>
                                      </div>
                                    
                                    </strong>
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading text-center">                                    
                                    <h5 style="margin: 0px;"><strong>..::Duelista::..</strong></h5>                                                                       
                                </div>
                                <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                    <p style="font-size: 12px;margin-bottom: 0px;">                                                                                
                                        <img src="img/class/{{$duelista[0]->Class}}.png" @if($duelista[0]->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                                    </p>                                        
                                    <strong><a id="duelistas-modals" data-toggle="modal" data-target="#duelista-modal" style="color:#636b6f">{{$duelista[0]->Name}}</a>
                                        @if($duelista[0]->AccountLevel == 1)
                                        <span style="color: #ffffff;font-size: 12px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
                                        @endif
                                        @foreach($guild as $g)
                                        @if($g->Name == $duelista[0]->Name)
                                           @if($g->G_Status == '128')
                                                <img src="img/master.png" style="height: 15px;" title="MASTER">
                                           @endif
                                           @if($g->G_Status == '64')
                                                <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                            @endif
                                            @if($g->G_Status == '32')
                                                <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                            @endif
                                        @endif                        
                                    @endforeach

                                    <div id="duelista-modal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                      
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Información de <strong>{{$duelista[0]->Name}}</strong></h4>
                                            </div>
                                            @foreach($accs as $acc)
                                                @if($acc->memb___id == $duelista[0]->AccountID)                                                
                                                <div class="modal-body" style="background: #f5f5f5">        
                                                    <div class="card">                                                        
                                                        <div class="card-body text-center">
                                                        <img class="card-img-top" style="text-align: center; border-radius: 90px;" height="150px" width="150px" @if($acc->img) src="img-perfil/{{$acc->img}}" @else src="img-perfil/avatar.jpg" @endif alt="{{$acc->memb_name}}">
                                                        <h5 class="card-title" style="text-align: center">Nombre de Usuario <strong>{{$acc->memb_name}}</strong></h5>
                                                        <h5 class="card-title" style="text-align: center">Personaje <strong>{{$duelista[0]->Name}}</strong> <img src="img/class/{{$duelista[0]->Class}}.png" @if($duelista[0]->ConnectStat == 0) style="height: 30px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 30px;border: 2px solid #30ef00; border-radius: 40px;margin-top: -300px; margin-left: 56px;" @endif>                                                    </h5> 
                                                        <h5 class="card-title" style="text-align: center">Level <span style="color:rgb(8, 126, 236); font-size: 12px;">(Master Levels)</span> <strong>{{$duelista[0]->cLevel}}</strong> <span style="color:rgb(8, 126, 236)">({{$duelista[0]->MasterLevel}})</span></h5>                                                        
                                                        <h5 class="card-title" style="text-align: center">Guild: 
                                                            <?php $band = 0; ?>
                                                            @foreach($guilds as $gui)                                                            
                                                            @if($gui->Name == $duelista[0]->Name)
                                                               <strong> {{$gui->G_Name}} </strong> @foreach($guilds as $gui)
                                                                @if($gui->Name == $duelista[0]->Name)
                                                                   @if($gui->G_Status == '128')
                                                                        <img src="img/master.png" style="height: 15px;" title="MASTER">
                                                                   @endif
                                                                   @if($gui->G_Status == '64')
                                                                        <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                                                    @endif
                                                                    @if($gui->G_Status == '32')
                                                                        <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                                                    @endif
                                                                @endif                        
                                                            @endforeach                                                               
                                                                <?php $band = 1; ?>

                                                            @endif                                                         
                                                            @endforeach
                                                            @if($band == 0)
                                                                <strong>Sin Guild</strong>
                                                            @endif
                                                        </h5>      
                                                        <h5 class="card-title" style="text-align: center">Estadisticas de duelo: 
                                                        @foreach($duelista as $duel)
                                                            @if($duel->Name == $duelista[0]->Name)
                                                                <span alt="Ganados" style="color: green">{{$duel->WinScore}}</span> / <span alt="Perdidos" style="color: red"> {{$duel->LoseScore}}</span>
                                                            @endif
                                                        @endforeach
                                                        
                                                        </h5>                                                   
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                          </div>
                                      
                                        </div>
                                      </div>
                                    
                                    </strong>
                                </div>
                            </div>                            
                        </div>
                        
                    </div>    
                    <p class="text-center">¿Cómo funciona? <a data-toggle="modal" data-target="#best-modal" class="menu-button">Click aquí </a></p>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-12"><h3 style="text-align: center;font-family:'Bowlby One SC', cursive;color:#237aff;font-size:60px;text-shadow: 2px 2px 2px black">Novedades</h3></div>
                    @if($news)
                        @foreach($news->chunk(2) as $news)
                        <div class="row">
                            @foreach($news as $new)
                    <div class="col-md-6">
                        <div class="panel">
                            <img style="border-radius:2px;" height="200px" width="100%" src="img-news/{{$new->img}}" />
                            <div class="panel-body">
                                @if($new->category == 'Eventos')
                                    <span class="label label-success">Eventos</span>
                                @endif
                                @if($new->category == 'Novedades')
                                    <span class="label label-info">Novedades</span>
                                @endif
                                @if($new->category == 'Actualizacion')
                                    <span class="label label-primary">Actualización</span>
                                @endif
                                @if($new->category == 'Importante')
                                <span class="label label-danger">Importante</span>
                            @endif
                                
                                
                                <h4><strong>{{$new->title}}</strong></h4>
                                <h6><i class="fa fa-clock-o" aria-hidden="true"></i> {{$new->created_at}}</h6>
                                <p>{{$new->subtitle}}</p>
                            </div>
                            <div class="panel-footer">
                                <form action="/news" method="GET">
                                    <input type="hidden" value="{{$new->id}}" name="newid">
                                    <input type="submit" class="btn btn-primary" value="Más información">
                                </form>
                            </div>
                        </div>
                    </div>                    
                    @endforeach
                    
                        </div>@endforeach
                   
                   @endif
                </div>     
            </div>
            </div>
        </div>
    
        
        <div class="col-md-4">
            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                    <span style="font-family:'Bowlby One SC', cursive;color:#237aff;font-size:20px;">DUEÑOS DEL CASTILLO</span>
                </div>
                <div class="panel-body">
                    <div class="row " >                                                        
                        <div class="col-md-12 text-center" style="margin-top: 10px;">
                            {{--<img style="background: gray;margin-bottom: 10px;" src="https://muonlinepvp.net/api/guildmark.php?data={{$guild->G_Mark}}&size=100" /> --}}
                            <hr style="margin: 1px;">
                        {{-- <p style="margin-bottom: 0px;"><span style="color:#272727">Clan:</span> {{ $guild[0]->OWNER_GUILD}} </p>    --}}
                            <hr style="margin: 1px;">
                            
                                @foreach($guild as $g)
                                    @if($g->G_Status == '128')
                                    @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp
                                        <p style="margin-bottom: 0px;"><span style="color: #272727">Master:</span> 
                                            @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp                                           
                                        {{$g->Name}}  </p>                 
                                    @endif
                                @endforeach
                            <hr style="margin: 1px;">
                                @foreach($guild as $g)
                                    @if($g->G_Status == '64')                                    
                                    <p style="margin-bottom: 0px;"><span style="color: #272727">Asistente:</span> 
                                        @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp                                        
                                        {{$g->Name}} </p>                 
                                    @endif
                                @endforeach
                            
                            @foreach($guild as $g)
                                @if($g->G_Status == '32')                                        
                            <hr style="margin: 1px;">
                                <p  style="margin-bottom: 0px;"><span style="color: #272727;">Battle M.:</span> 
                                    @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp                                    
                                {{$g->Name}} </p>
                            @endif
                        @endforeach
                        <hr style="margin: 1px;">
                            
                        </div>
                    </div>
                 
                </div>
                <div class="panel-footer" style="text-align: center">
                    Próxima batalla: -- -- -- (Aún sin fecha).
                </div>
            </div>
            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                   <span style="font-family:'Bowlby One SC', cursive;color:#237aff;font-size:20px;">TOP PLAYERS LEVELS</span> <img src="img/levels.png" style="height: 30px">
                </div>             
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead class="thead">
                            <th>#</th>
                            <th>Class</th>
                            <th>Name</th>
                            <th>Level <span style="font-size: 10px;color: #85b3f9;">ML</span></th>                            
                        </thead>
                        @php $count = 1 @endphp
                        @foreach($chars as $char)
                        @php $char->cLevel = $char->cLevel + $char->MasterLevel;                         
                        @endphp
                        <tr>                       
                        <td>
                            <?php if($count == 1){ $count++; ?>
                            <img style="height: 30px; margin-top: 5px;" src="img/primero.png">
                            <?php }else{ ?>
                                {{$count++}}
                                <?php } ?>
                                                         
                                                                        
                        </td>
                        <td>
                            <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 35px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 35px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                        </td>
                        <td>
                                                
                            {{$char->Name}}
                            @foreach($guilds as $g)
                            @if($g->Name == $char->Name)
                               @if($g->G_Status == '128')
                                    <img src="img/master.png" style="height: 15px;" title="MASTER">
                               @endif
                               @if($g->G_Status == '64')
                                    <img src="img/asistente.png" style="height: 15px;" title="ASISTENTE">
                                @endif
                                @if($g->G_Status == '32')
                                    <img src="img/bm.png" style="height: 15px;" title="BATTLE MASTER">
                                @endif
                            @endif                        
                        @endforeach

                        </td>
                        <td>
                            @php $char->cLevel = $char->cLevel - $char->MasterLevel; @endphp
                            {{$char->cLevel}} <span style="font-size: 10px;color: #85b3f9;">{{$char->MasterLevel}}</span>
                            @if($char->AccountLevel == 1)
                            <span style="color: #ffffff;font-size: 12px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
                            @endif
                        </td>                       
                        </tr>
                        <tr>   
                        @endforeach                                              
                    </table>                    
                </div>
                <div class="panel-footer">
                    Actualizado ahora mismo
                </div>
            </div>

            
        </div>
    </div>
</div>


    

@endsection

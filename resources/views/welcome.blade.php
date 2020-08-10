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

<div class="container-fluid" style="background-image: url('img/fondo.jpg')">
<div class="container text-center" style="margin-top: 380px;">
    <div class="row">        
       <div class="col-md-12" style="font-family:'Bowlby One SC', cursive;color:#237aff;font-size:60px;text-shadow: 2px 2px 2px black">
           MuOnline Server 
     </div>      
    </div>
    
 </div>

 <div class="container" style="margin-top: 30px;margin-bottom:10px;">
     <div class="col-md-4 btn-download"  >
         <a href="#">
         <div class="row" style="background: #000000b5; border-radius: 3px; border: 2px solid #00000066; width: 108%">
             <div class="col-md-4">
                 <img src="img/btn-download.gif" height="120px">                    
             </div>
             <div class="col-md-8">
                 <h1 style="font-size: 16px;margin-bottom: 0px;margin-top: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Download</h1>
                 <p style="font-size: 12px; margin-bottom:0px;margin-top: 10px;margin-left: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Mu Online Server: 523Mb</p>
                 <p style="font-size: 12px; margin-left: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Servers: <span style="color: red">MEGA</span> - Mediafire</p>
             </div>
         </div>
     </a>
     </div>


     <div class="col-md-4" >           
         <div class="row" style="background: #000000b5; border-radius: 3px; border: 2px solid #00000066; width: 108%">
             <div class="col-md-4">
                 <img src="img/information.gif" height="120px">                    
             </div>
             <div class="col-md-8">
                 <p style="font-size: 16px;margin-bottom: 0px;margin-top: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Server Information</p>
                 <p style="font-size: 12px;margin-bottom:0px;margin-left: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Status: <span style="color: rgb(20, 214, 20);">Online</span></p>
                 <p style="font-size: 12px;margin-bottom:0px;margin-left: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Experiencie: <span style="color: rgb(209, 179, 10)">10x (Recesive by Lvl)</span></p>
                 <p style="font-size: 12px;margin-left: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Drop: <span style="color: rgb(10, 90, 209)">30%</span></p>
             </div>
         </div>        
     </div>

     <div class="col-md-4 ">         
         <div class="row" style="background: #000000b5; border-radius: 3px; border: 2px solid #00000066; width: 108%">
             <div class="col-md-4">
                 <img src="img/online.gif" height="120px">                    
             </div>
             <div class="col-md-8">                    
                 <p style="font-size: 16px;margin-bottom: 0px;margin-top: 20px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">MuOnline Server</p>
                 <p style="font-size: 12px;margin-bottom:0px;margin-top: 10px;color: #b7b7b7;font-weight: 600;text-shadow: 1px 1px 1px grey;">Online: <span style="color: rgb(48 151 209);">100</span></p>                                        
                 <div class="progress" style="height: 3px;width: 70%;text-align: center;" >
                     <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
             </div>
         </div>     
     </div>


 </div>
</div>


<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6">
            <div class="swiper-container" style="height: 324px;">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide"><img src="img/slider1.png" style="height: 100%;width: 100%"/></div>
                    <div class="swiper-slide"><img src="img/slider1.png" style="height: 100%;width: 100%"/></div>
                    <div class="swiper-slide"><img src="img/slider1.png" style="height: 100%;width: 100%"/></div>                    
                </div>    
                <div class="swiper-pagination"></div>
         
            </div>
        </div>
        <div class="col-md-3" style="margin-left: 10px;" >
            <div class="panel" style="border-radius:2px;background: url(img/block2.jpg);margin-bottom: 0px;height: 330px;background-repeat: no-repeat;background-size: auto;">
                
                    
                
                <div class="panel-body">
                    <h4 style="margin-top:200px;color: white;font-weight: 600;text-shadow: 1px 1px 1px #0e0e0e;text-align:center;"> <strong>¿Todavía no creaste tu cuenta?</strong> Creá ya tu de MuOnline Server <a class="btn btn-primary btn-sm" href="/register">Registrarme</a></h4>
                                     
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin-left:-15px;">
            <div class="panel" style="background: url(img/block1.jpg);margin-bottom: 0px;height: 330px;background-repeat: no-repeat;background-size: auto;">                                                
                <div class="panel-body">
                    <h4 style="margin-top:200px;color: white;font-weight: 600;text-shadow: 1px 1px 1px #0e0e0e;text-align:center;"> <strong>Eventeá y aparecé en el salón de la fama de MuOnline Server <a class="btn btn-danger btn-sm" href="/register">Visitar de la fama</a></h4>                 
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="panel" style="background: #e0e0e0">                
                <div class="panel-body">
                    <div class="row">
                        <h3 class="text-center"><strong>Los mejores del servidor</strong></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading text-center">
                                    <img height="100" title="Leyenda" src="img/notice2.png">                                                                      
                                    <h5 style="margin: 0px;"><strong>..::Leyenda::..</strong></h5>
                                </div>
                                <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                    <p style="font-size: 12px;">
                                        <img src="img/class/{{$leyenda[0]->Class}}.png" style="height: 25px;">
                                        @php $leyenda[0]->cLevel = $leyenda[0]->cLevel + $leyenda[0]->MasterLevel; @endphp                 
                                        @if($leyenda[0]->cLevel >= 371 && $leyenda[0]->cLevel <= 390)
                                            <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                        @endif
                                        @if($leyenda[0]->cLevel >= 391 && $leyenda[0]->cLevel <= 400)
                                            <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                                        @endif
                                        @if($leyenda[0]->cLevel >= 401 && $leyenda[0]->cLevel <= 410)
                                            <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                        @endif
                                        @if($leyenda[0]->cLevel >= 411 && $leyenda[0]->cLevel <= 420)
                                            <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                        @endif
                                        @if($leyenda[0]->cLevel >= 421 && $leyenda[0]->cLevel <= 425)
                                            <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                        @endif
                                    <strong><a href="#" style="color:#636b6f">{{$leyenda[0]->Name}}</a></strong></p>                                        
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading text-center">                                                          
                                    <img height="100" title="Aniquilador" src="img/aniquilador.png">
                                    <h5 style="margin: 0px;"><strong>..::Aniquilador::..</strong></h5>            
                                </div>                                
                                <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                    <p style="font-size: 12px;">      
                                    <img src="img/class/{{$aniquilador[0]->Class}}.png" style="height: 25px;">
                                    @php $aniquilador[0]->cLevel = $aniquilador[0]->cLevel + $aniquilador[0]->MasterLevel; @endphp                 
                                    @if($aniquilador[0]->cLevel >= 371 && $aniquilador[0]->cLevel <= 390)
                                <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                @endif
                                @if($aniquilador[0]->cLevel >= 391 && $aniquilador[0]->cLevel <= 400)
                                <img src="img/1.png" title="GUERRERO" style="width: 10px"> 
                                @endif
                                @if($aniquilador[0]->cLevel >= 401 && $aniquilador[0]->cLevel <= 410)
                                    <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                @endif
                                @if($aniquilador[0]->cLevel >= 411 && $aniquilador[0]->cLevel <= 420)
                                    <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                @endif
                                @if($aniquilador[0]->cLevel >= 421 && $aniquilador[0]->cLevel <= 425)
                                    <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                @endif
                            <strong>{{$aniquilador[0]->Name}}</strong></p>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading text-center">
                                    <img height="100" title="Millonario" src="img/millonario.png">        
                                    <h5 style="margin: 0px;"><strong>..::Millonario::..</strong></h5>                               
                                </div>
                                <div class="panel-body text-center" style="padding: 0px;">                                       
                                    <p style="font-size: 12px;">    
                                   <img src="img/class/{{$millonario[0]->Class}}.png" style="height: 25px;">
                                @php $millonario[0]->cLevel = $millonario[0]->cLevel + $millonario[0]->MasterLevel; @endphp             
                                @if($millonario[0]->cLevel >= 371 && $millonario[0]->cLevel <= 390)
                                    <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                @endif
                                @if($millonario[0]->cLevel >= 391 && $millonario[0]->cLevel <= 400)
                                    <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                                @endif
                                @if($millonario[0]->cLevel >= 401 && $millonario[0]->cLevel <= 410)
                                    <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                @endif
                                @if($millonario[0]->cLevel >= 411 && $millonario[0]->cLevel <= 420)
                                    <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                @endif
                                @if($millonario[0]->cLevel >= 421 && $millonario[0]->cLevel <= 425)
                                    <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                @endif
                            <strong>{{$millonario[0]->Name}}</strong></p>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading text-center">
                                    <img height="100" title="Duelista" src="img/duelista.png">    
                                    <h5 style="margin: 0px;"><strong>..::Duelista::..</strong></h5>                                                                       
                                </div>
                                <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                    <p style="font-size: 12px;">   
                                    <img src="img/class/{{$duelista[0]->Class}}.png" style="height: 25px;">
                                    @php $duelista[0]->cLevel = $duelista[0]->cLevel + $duelista[0]->MasterLevel; @endphp       
                                    @if($duelista[0]->cLevel >= 371 && $duelista[0]->cLevel <= 390)
                                        <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                    @endif
                                    @if($duelista[0]->cLevel >= 391 && $duelista[0]->cLevel <= 400)
                                        <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                                    @endif
                                    @if($duelista[0]->cLevel >= 401 && $duelista[0]->cLevel <= 410)
                                        <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                    @endif
                                    @if($duelista[0]->cLevel >= 411 && $duelista[0]->cLevel <= 420)
                                        <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                    @endif
                                    @if($duelista[0]->cLevel >= 421 && $duelista[0]->cLevel <= 425)
                                        <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                    @endif
                                    <strong>{{$duelista[0]->Name}}</strong></p>
                                </div>
                            </div>                            
                        </div>
                        <p class="text-center">¿Cómo funciona? <a href="#">Click aquí </a></p>
                    </div>    
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-6">
                        <div class="panel">
                            <img style="border-radius:2px;" width="100%" src="img/class/wallp.jpg" />
                            <div class="panel-body">
                                <h4><strong>Conocé los nuevos eventos</strong></h4>
                                <h6><i class="fa fa-clock-o" aria-hidden="true"></i> 02/08/2020</h6>
                                <p>Ingresá e informate sobre los nuevos eventos que tiene MuOnline Server para vos</p>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <img style="border-radius:2px;" width="100%" src="img/notice1.png" />
                            <div class="panel-body">
                                <h4><strong>Conocé los nuevos eventos</strong></h4>
                                <h6><i class="fa fa-clock-o" aria-hidden="true"></i> 02/08/2020</h6>
                                <p>Ingresá e informate sobre los nuevos eventos que tiene MuOnline Server para vos</p>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: -200px;">
                        <div class="panel">
                            <img style="border-radius:2px;" width="100%" src="img/notice2.png" />
                            <div class="panel-body">
                                <h4><strong>Conocé los nuevos eventos</strong></h4>
                                <h6><i class="fa fa-clock-o" aria-hidden="true"></i> 02/08/2020</h6>
                                <p>Ingresá e informate sobre los nuevos eventos que tiene MuOnline Server para vos</p>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <img style="border-radius:2px;" width="100%" src="img/notice3.png" />
                            <div class="panel-body">
                                <h4><strong>Conocé los nuevos eventos</strong></h4>
                                <h6><i class="fa fa-clock-o" aria-hidden="true"></i> 02/08/2020</h6>
                                <p>Ingresá e informate sobre los nuevos eventos que tiene MuOnline Server para vos</p>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                    Castle Siegue
                </div>
                <div class="panel-body">
                    <div class="row " >                                                        
                        <div class="col-md-12 text-center" style="margin-top: 10px;">
                           <img style="background: gray;margin-bottom: 10px;" src="https://muonlinepvp.net/api/guildmark.php?data={{$guild[0]->G_Mark}}&size=100" />
                            <hr style="margin: 1px;">
                            <p style="margin-bottom: 0px;"><span style="color:#272727">Clan:</span> {{$guild[0]->OWNER_GUILD}} </p>   
                            <hr style="margin: 1px;">
                            
                                @foreach($guild as $g)
                                    @if($g->G_Status == '128')
                                    @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp
                                        <p style="margin-bottom: 0px;"><span style="color: #272727">Master:</span> 
                                    @if($g->cLevel >= 371 && $g->cLevel <= 390)
                                        <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                    @endif
                                    @if($g->cLevel >= 391 && $g->cLevel <= 400)
                                        <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                                    @endif
                                    @if($g->cLevel >= 401 && $g->cLevel <= 410)
                                        <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                    @endif
                                    @if($g->cLevel >= 411 && $g->cLevel <= 420)
                                        <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                    @endif
                                    @if($g->cLevel >= 421 && $g->cLevel <= 425)
                                        <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                    @endif
                                        {{$g->Name}}  </p>                 
                                    @endif
                                @endforeach
                            <hr style="margin: 1px;">
                                @foreach($guild as $g)
                                    @if($g->G_Status == '64')
                                    @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp
                                    <p style="margin-bottom: 0px;"><span style="color: #272727">Asistente:</span> 
                                        @if($g->cLevel >= 371 && $g->cLevel <= 390)
                                        <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                    @endif
                                    @if($g->cLevel >= 391 && $g->cLevel <= 400)
                                        <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                                    @endif
                                    @if($g->cLevel >= 401 && $g->cLevel <= 410)
                                        <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                    @endif
                                    @if($g->cLevel >= 411 && $g->cLevel <= 420)
                                        <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                    @endif
                                    @if($g->cLevel >= 421 && $g->cLevel <= 425)
                                        <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                    @endif
                                    {{$g->Name}} </p>                 
                                    @endif
                                @endforeach
                            
                            @foreach($guild as $g)
                                @if($g->G_Status == '32')
                                        @php $g->cLevel = $g->cLevel + $g->MasterLevel; @endphp
                            <hr style="margin: 1px;">
                                <p  style="margin-bottom: 0px;"><span style="color: #272727;">Battle M.:</span> 
                                @if($g->cLevel >= 371 && $g->cLevel <= 390)
                                    <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                                @endif
                                @if($g->cLevel >= 391 && $g->cLevel <= 400)
                                    <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                                @endif
                                @if($g->cLevel >= 401 && $g->cLevel <= 410)
                                    <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                                @endif
                                @if($g->cLevel >= 411 && $g->cLevel <= 420)
                                    <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                                @endif
                                @if($g->cLevel >= 421 && $g->cLevel <= 425)
                                    <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                                @endif
                                {{$g->Name}} </p>
                            @endif
                        @endforeach
                        <hr style="margin: 1px;">
                            
                        </div>
                    </div>
                 
                </div>
            </div>
            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                   TOP PLAYERS LEVELS <img src="img/levels.png" style="height: 30px">
                </div>             
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead class="thead">
                            <th>#</th>
                            <th>Class</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Master Lvl</th>
                        </thead>
                        @php $count = 1 @endphp
                        @foreach($chars as $char)
                        @php $char->cLevel = $char->cLevel + $char->MasterLevel; @endphp
                        <tr>                       
                        <td>
                            {{$count++}}
                        </td>
                        <td>
                            <img src="img/img-download.png" style="height: 25px;">
                        </td>
                        <td>
                        @if($char->cLevel >= 371 && $char->cLevel <= 390)
                            <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                        @endif
                        @if($char->cLevel >= 391 && $char->cLevel <= 400)
                            <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                        @endif
                        @if($char->cLevel >= 401 && $char->cLevel <= 410)
                            <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                        @endif
                        @if($char->cLevel >= 411 && $char->cLevel <= 420)
                            <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                        @endif
                        @if($char->cLevel >= 421 && $char->cLevel <= 425)
                            <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                        @endif
                            {{$char->Name}}
                        </td>
                        <td>
                            @php $char->cLevel = $char->cLevel - $char->MasterLevel; @endphp
                            {{$char->cLevel}}
                        </td>
                        <td style="text-align:center;">
                            {{$char->MasterLevel}}
                        </td>
                        </tr>
                        <tr>   
                        @endforeach                                              
                    </table>
                </div>
            </div>


            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                   SERIAL KILLERS <img src="img/killers.png" style="height: 30px">
                </div>             
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead class="thead">
                            <td>#</td>
                            <td>Class</td>
                            <td>Name</td>
                            <td>Level</td>
                        </thead>
                        @php $count = 1 @endphp
                        @foreach($killers as $killer)
                        @php $killer->cLevel = $killer->cLevel + $killer->MasterLevel; @endphp                              
                        <tr>                       
                        <td>
                            {{$count++}}
                        </td>
                        <td>
                            <img src="img/img-download.png" style="height: 25px;">
                        </td>
                        <td>
                            @if($killer->cLevel >= 371 && $killer->cLevel <= 390)
                            <img src="img/1.png" title="SOLDADO" style="width: 10px"> 
                        @endif
                        @if($killer->cLevel >= 391 && $killer->cLevel <= 400)
                            <img src="img/2.png" title="GUERRERO" style="width: 10px"> 
                        @endif
                        @if($killer->cLevel >= 401 && $killer->cLevel <= 410)
                            <img src="img/3.png" title="GLADIADOR" style="width: 8px"> 
                        @endif
                        @if($killer->cLevel >= 411 && $killer->cLevel <= 420)
                            <img src="img/4.png" title="GENERAL" style="width: 10px"> 
                        @endif
                        @if($killer->cLevel >= 421 && $killer->cLevel <= 425)
                            <img src="img/5.png" title="SUPREMO" style="width: 10px"> 
                        @endif
                            {{$killer->Name}}
                        </td>
                        <td>
                            {{$killer->Kills}}
                        </td>
                        </tr>
                        <tr>   
                        @endforeach                                              
                    </table>
                </div>
            </div>

            
        </div>
    </div>
</div>


    

@endsection

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
    .swiper-container2 {
        width: 580px;
        height: 330px;
        border-radius: 3px;
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
           UNDERMU <img src="img/logo.png" style="height: 100px"> <span>SEASON 6<p style="font-size: 40px;">SPRINT 2</p>                                                                       
        </span>
     </div>      
    </div>
    
 </div>

 <div class="container text-center" style="background: black; width: 15%; border-radius: 10px;">                                         
    <p style="font-size: 22px;margin-bottom:0px;color: #ffffff;font-weight: 600;text-shadow: 1px 1px 1px grey;"><span style="color: Green">ONLINE</span> <span style="color: rgb(48 151 209);">{{ $onlines }}</span></p>                                                                                                                    
</div>
</div>

<div class="container" style="margin-top: 20px;">
    <script src= "https://player.twitch.tv/js/embed/v1.js"></script>
<div id="<player div ID>"></div>
<script type="text/javascript">
  var options = {
    width: 1100,
    height: 500,
    channel: "undermuslow",  
    // only needed if your site is also embedded on embed.example.com and othersite.example.com
    parent: ["undermuslow.com"]
  };
  var player = new Twitch.Player("<player div ID>", options);
  player.setVolume(0.5);
</script>
</div>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-8">
            <div class="swiper-container" style="height: 60vh;width: 100% !important; overflow: hidden;">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach($news as $newslider)
                        <div class="swiper-slide"><img src="img-news/{{$newslider->img}}" style="height: 100%;width: 100%"/>
                            <div> <h2 style="margin-top: -175px;padding:30px;color: white;text-shadow: #2f2d2d 1px 1px 1px;font-weight: bold;">{{$newslider->title}} 
                                <form action="/news" method="GET">
                                    <input type="hidden" value="{{$newslider->id}}" name="newid">
                                    <input type="submit" class="btn btn-primary" value="Read more">
                                </form></h2></div>
                            
                        </div>
                    @endforeach                                        
                </div>    
                <div class="swiper-pagination"></div>
         
            </div>
        </div>
      
        <div class="col-md-4">
          
            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                    <span style="text-transform: uppercase;font-size: 14px;font-weight: 700;padding: 8px 0 8px 15px;border-left: 3px solid #2575dc;color: #424242;margin-bottom: 15px;">CASTLE SIEGE</span>
                </div>
                <div class="panel-body">
                    <div class="row " >                                                        
                        <div class="col-md-12 text-center" style="margin-top: 10px;">
                            {{--<img style="background: gray;margin-bottom: 10px;" src="https://muonlinepvp.net/api/guildmark.php?data={{$guild->G_Mark}}&size=100" /> --}}
                            <img src="https://www.muonlinepvp.net/api/guildmark.php?data=BBBBBBBBBBBBBBBBBBBBBBBB3366663333666633BBBBBBBBBBBBBBBBBBBBBBBB&amp;size=40" width="40" height="40" class="">
                            <hr style="margin: 1px;">
                        <p style="margin-bottom: 0px;"><span style="color:#272727">Clan:</span> UNDERMU </p>    
                            <hr style="margin: 1px;">
                                                          
                                        <p style="margin-bottom: 0px;"><span style="color: #272727">Master:</span>  HOFFMANN  </p>                                               
                                        <hr style="margin: 1px;">
                                        <p style="margin-bottom: 0px;"><span style="color: #272727">Asistente:</span> WACHUKEIK </p>
                                                                                             
                        <hr style="margin: 1px;">
                            
                        </div>
                    </div>
                 
                </div>
                <div class="panel-footer" style="text-align: center">
                    Next Siege: -- -- -- (Next to the date).
                </div>
            </div>

            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                    <span style="text-transform: uppercase;font-size: 14px;font-weight: 700;padding: 8px 0 8px 15px;border-left: 3px solid #2575dc;color: #424242;margin-bottom: 15px;">UnderMu Staff</span>
                </div>
                <div class="panel-body text-center">                  
                      <p>      <img src="img/class/0.png" style="height: 35px;border: 2px solid #30ef00; border-radius: 40px;">
                       
                           <strong>WACHUKEIK</strong>     </p>
                           <img src="img/class/16.png" style="height: 35px;border: 2px solid #30ef00; border-radius: 40px;">
                       
                           <strong>HOFFMANN</strong>                                     
                      
                </div>
                <div class="panel-footer" style="text-align: center">
                   
                </div>
            </div>
            
        </div>
    </div>

    
     <div class="row" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="panel" style="background: #e0e0e0">                
                <div class="panel-body">                    
                    <div class="row  mt-5" style="padding: 10px;">
                        <div class="panel">
                            <div class="panel-heading" style="background: #efefef;" >
                            <span style="text-transform: uppercase;font-size: 14px;font-weight: 700;padding: 8px 0 8px 15px;border-left: 3px solid #2575dc;color: #424242;margin-bottom: 15px;">LEGENDARY PLAYERS - SPRINT 1</span>
                            </div>
                            <div class="panel-body">
                                <div class="swiper-container2" style="height: 20vh;width: 100% !important; overflow: hidden;">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">                                      
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>                                                                                    
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/49.png" title="Dark Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 style="color: black;" class="poppins-black"><strong>Xyto <img src="img/master.png" style="height: 15px;" alt="Master"></strong></h4>
                                                                <strong><h6>400 <span style="font-size: 10px;color: #85b3f9;">ML100</span></h6>                                                                  </strong>
                                                                
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/espada.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> KILLER</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>       
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>                                                                                    
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/65.png" title="Lord Emperor" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 style="color: black;" class="poppins-black"><strong>KratosDL <img src="img/master.png" style="height: 15px;" alt="Master"> </strong></h4>
                                                                <strong><h6>400 <span style="font-size: 10px;color: #85b3f9;">ML100</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/legend.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> LEGENDARY</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>                                                                                    
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/85.png" title="Dimension Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 style="color: black;" class="poppins-black"><strong>Kolas <img src="img/master.png" style="height: 15px;" alt="Master"> </strong></h4>
                                                                <strong><h6>400 <span style="font-size: 10px;color: #85b3f9;">ML100</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/horas.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> VICIUS</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>                                                                                    
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/98.png" title="First Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 style="color: black;" class="poppins-black"><strong>Titan <img src="img/master.png" style="height: 15px;" alt="Master"> </strong></h4>
                                                                <strong><h6>400 <span style="font-size: 10px;color: #85b3f9;">ML100</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img style=" height: 26px;" src="img/logo.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> UNDERMU</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>      
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>                                                                                    
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/34.png" title="High Elf" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 style="color: black;" class="poppins-black"><strong>Oriana <img src="img/asistente.png" style="height: 15px;" alt="Asistente"> </strong></h4>
                                                                <strong><h6>400 <span style="font-size: 10px;color: #85b3f9;">ML100</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/hero.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> HERO</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>       
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">    
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>                                                                                                                                   
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/18.png" alt="Blade Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 style="color: black;" class="poppins-black"><strong>PUMA <img src="img/bm.png" style="height: 15px;" alt="Battle Master"> </strong></h4>
                                                                <strong><h6>400 <span style="font-size: 10px;color: #85b3f9;">ML100</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/murder.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> MURDERER</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                              
                                            </div>             
                                    </div>    
                                    
                             
                                </div>



                        </div>
                    </div> 
                        </div>
                      

                    <div class="row  mt-5" style="padding: 10px;">
                         <div class="panel"  >
                            <div class="panel-heading" style="background: #efefef">
                                <span style="text-transform: uppercase;font-size: 14px;font-weight: 700;padding: 8px 0 8px 15px;border-left: 3px solid #2575dc;color: #424242;margin-bottom: 15px;"><strong>Hell of Fame - SPRINT 2</strong></span>
                            </div>
                            <div class="panel-body">
                                <div class="swiper-container2" style="height: 20vh;width: 100% !important; overflow: hidden;">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">       

                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                                                                                     
                                                    </div>                               
                                                    @php 
                                                    $killer = DB::table('Character')->join('RankingDuel', 'Character.Name', '=', 'RankingDuel.Name')->orderBy('WinScore', 'DESC')->get(); //Cuando esten los master levels ->join('MasterSkillTree', 'Character.Name', '=', 'MasterSkillTree.Name')
                                                    @endphp

                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/{{$killer[0]->Class}}.png" title="Dark Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5 style="color: black;" class="poppins-black"><strong>{{$killer[0]->Name}}
                                                                @foreach($guilds as $g)
                                                                    @if($g->Name == $killer[0]->Name)
                                                                    <img style="background: gray;height: 20px;" title="{{$g->G_Name}}" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=100" /> 
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
                                                            </strong></h5>
                                                                <strong><h6>{{$killer[0]->cLevel}} <span style="font-size: 10px;color: #85b3f9;">ML0</span></h6>                                                                  </strong>
                                                                
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/espada.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> KILLER</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                        @php 
                                                            $legendary = DB::table('Character')->orderBy('cLevel', 'desc')->where('CtlCode', '!=', '32')->get(); //para mater level ('RankingDuel', 'Character.Name', '=', 'RankingDuel.Name')->orderBy('WinScore', 'DESC')->get(); //Cuando esten los master levels ->join('MasterSkillTree', 'Character.Name', '=', 'MasterSkillTree.Name')
                                                        @endphp
                                                    </div>                                                                                    
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/{{ $legendary[0]->Class }}.png" title="Lord Emperor" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5 style="color: black;" class="poppins-black"><strong> {{ $legendary[0]->Name }}  
                                                                    @foreach($guilds as $g)
                                                                    @if($g->Name == $legendary[0]->Name)
                                                                    <img style="background: gray;height: 20px;" title="{{$g->G_Name}}" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=100" /> 
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
                                                                @endforeach </strong></h5>
                                                                <strong><h6>{{$legendary[0]->cLevel}} <span style="font-size: 10px;color: #85b3f9;">ML0</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/legend.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> LEGENDARY</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>         
                                                    @php 
                                                        $vicio = DB::table('Character')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'MEMB_INFO.memb___id', 'MEMB_STAT.memb___id')->where('CtlCode', '!=', '32')->orderBy('OnlineHours', 'desc')->orderBy('cLevel', 'desc')->get(); //para mater level ('RankingDuel', 'Character.Name', '=', 'RankingDuel.Name')->orderBy('WinScore', 'DESC')->get(); //Cuando esten los master levels ->join('MasterSkillTree', 'Character.Name', '=', 'MasterSkillTree.Name')
                                                    @endphp                                                                           
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/{{$vicio[0]->Class}}.png" title="Dimension Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5 style="color: black;" class="poppins-black"><strong>{{$vicio[0]->Name}} 
                                                                    @foreach($guilds as $g)
                                                                    @if($g->Name == $vicio[0]->Name)
                                                                    <img style="background: gray;height: 20px;" title="{{$g->G_Name}}" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=100" /> 
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
                                                                @endforeach </strong></h5>
                                                                <strong><h6>{{$vicio[0]->cLevel}} <span style="font-size: 10px;color: #85b3f9;">ML0</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/horas.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> VICIUS</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>     
                                                    @php
                                                        $eternal = DB::table('Character')->orderBy('eternal', 'desc')->get();
                                                    @endphp

                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/{{ $eternal[0]->Class}}.png" title="First Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5 style="color: black;" class="poppins-black"><strong>{{$eternal[0]->Name}} 
                                                                    @foreach($guilds as $g)
                                                                    @if($g->Name == $eternal[0]->Name)
                                                                    <img style="background: gray;height: 20px;" title="{{$g->G_Name}}" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=100" /> 
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
                                                                @endforeach </strong></h5>
                                                                <strong><h6>{{$eternal[0]->cLevel}} <span style="font-size: 10px;color: #85b3f9;">ML0</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img style=" height: 26px;" src="img/logo.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> UNDERMU</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                            </div>                                                 
                                            <div class="swiper-slide">
                                                <div class="panel panel-personaje" style="background: #efefef;">    
                                                    <div class="panel-heading text-center">                                                                                              
                                                       
                                                    </div>         
                                                    @php 
                                                      $murderer = DB::table('Character')->join('RankingDuel', 'Character.Name', '=', 'RankingDuel.Name')->orderBy('PkCount', 'desc')->orderBy('WinScore', 'DESC')->get(); 
                                                    @endphp                                                                                                                          
                                                    <div class="panel-body text-center" style="padding: 0px;">                                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/class/{{$murderer[0]->Class}}.png" alt="Blade Master" style="margin-top: -20px;height: 100px;border: 2px solid #a2a2a273; border-radius: 40px;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5 style="color: black;" class="poppins-black"><strong>{{$murderer[0]->Name}} 
                                                                    @foreach($guilds as $g)
                                                                    @if($g->Name == $murderer[0]->Name)
                                                                    <img style="background: gray;height: 20px;" title="{{$g->G_Name}}" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=100" /> 
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
                                                                </strong></h5>
                                                                <strong><h6>{{$murderer[0]->cLevel}} <span style="font-size: 10px;color: #85b3f9;">ML0</span></h6>                                                                  </strong>
                                                            </div>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="panel-footer">
                                                        <img src="img/murder.png"> <span style="color: black;font-weight: 300 !important;" class="poppins-black"> MURDERER</span> <a style="float: right;" data-toggle="modal" data-target="#best-modal" class="menu-button">Info</a>
                                                    </div>
                                                </div>
                                              
                                            </div>     


                                    </div>    
                                </div>
                            </div>   
                            <div class="panel-footer">
                                <p class="text-center">¿How to work? <a data-toggle="modal" data-target="#best-modal" class="menu-button">Click here </a></p>
                            </div>
                    </div>     
                    </div>
                               
                   
                    
                <div class="row" style="margin-top: 30px;">
                    <div class="panel" style="padding: 10px;">
                    <div class="panel-heading" style="background: #efefef">
                        <span style="text-transform: uppercase;font-size: 14px;font-weight: 700;padding: 8px 0 8px 15px;border-left: 3px solid #2575dc;color: #424242;margin-bottom: 15px;">News</span>
                    </div>
                    <div class="panel-body">
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
                                    <input type="submit" class="btn btn-primary" value="Read more">
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
        </div></div>
    
        
        <div class="col-md-4">
           
            <div class="panel">   
                <div class="panel-heading" style="background: #efefef">
                   <span style="text-transform: uppercase;font-size: 14px;font-weight: 700;padding: 8px 0 8px 15px;border-left: 3px solid #2575dc;color: #424242;margin-bottom: 15px;">TOP PLAYERS LEVELS</span> <img src="img/levels.png" style="height: 30px">
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
                        <tr class="row-personaje">                       
                        <td>
                            <?php if($count == 1){ $count++; ?>
                            <img style="height: 30px; margin-top: 5px;" src="img/primero.png">
                            <?php }else{ ?>
                                {{$count++}}
                                <?php } ?>
                                                         
                                                                        
                        </td>
                        <td>
                            <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 50px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 50px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                        </td>
                        <td style="padding:  20px;padding-left: 0px;padding-right: 0px;">                                                
                        <a data-toggle="modal" style="color: black;cursor: pointer" data-target="#modal-pj{{$char->Name}}">{{$char->Name}}</a>
                            @foreach($guilds as $g)
                            @if($g->Name == $char->Name)
                            <img style="background: gray;height: 20px;" title="{{$g->G_Name}}" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=100" /> 
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
                        <td style="padding: 20px;padding-right: 0px;">
                            @php $char->cLevel = $char->cLevel - $char->MasterLevel; @endphp
                            {{$char->cLevel}} <span style="font-size: 12px;color: #85b3f9;font-weight: bold;">{{$char->MasterLevel}}</span>
                            @if($char->AccountLevel > 0)
                            <span style="color: #ffffff;font-size: 12px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
                            @endif
                        </td>                       
                        </tr>                        


                        <div id="modal-pj{{$char->Name}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                                                                                      
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Información de <strong>{{$char->Name}}</strong></h4>
                                                                  </div>
                                                                  @foreach($accs as $acc)
                                                                      @if($acc->memb___id == $char->AccountID)                                                
                                                                      <div class="modal-body" style="background: #f5f5f5">        
                                                                          <div class="card">                                                        
                                                                              <div class="card-body text-center">
                                                                              <img class="card-img-top" style="text-align: center; border-radius: 90px;" height="150px" width="150px" @if($acc->img) src="img-perfil/{{$acc->img}}" @else src="img-perfil/avatar.jpg" @endif alt="{{$acc->memb_name}}">
                                                                              <h5 class="card-title" style="text-align: center">Nombre de Usuario <strong>{{$acc->memb_name}}</strong></h5>
                                                                              <h5 class="card-title" style="text-align: center">Personaje <strong>{{$char->Name}}</strong> <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 30px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 30px;border: 2px solid #30ef00; border-radius: 40px;" @endif>                                                    </h5> 
                                                                              <h5 class="card-title" style="text-align: center">Level <span style="color:rgb(8, 126, 236); font-size: 12px;">(Master Levels)</span> <strong>{{$char->cLevel}}</strong> <span style="color:rgb(8, 126, 236)">({{$char->MasterLevel}})</span></h5>                                                        
                                                                              <h5 class="card-title" style="text-align: center">Guild: 
                                                                                  <?php $band = 0; ?>
                                                                                  @foreach($guilds as $gui)                                                            
                                                                                  @if($gui->Name == $char->Name)
                                                                                     <strong><a href="/guild?G_Name={{$gui->G_Name}}"> {{$gui->G_Name}} </a></strong> @foreach($guilds as $gui)
                                                                                      @if($gui->Name == $char->Name)
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
                                                                                  @if($duel->Name == $char->Name)
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

                        @endforeach                                              
                    </table>                    
                </div>
                <div class="panel-footer">
                    Updated now
                </div>
            </div>

            <div class="panel">
                <iframe src="https://discord.com/widget?id=980948897381875753&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>

            <div class="panel">
                <div class="panel-heading" style="background: #efefef">
                    LAST POST IN UNDERMU FORUM
                </div>
                <div class="panel-body">
                    @php 
                    $ultimos = DB::table('temas')->get();
                    @endphp                
                    @foreach($ultimos as $ultimo)
                    <p><a target="_blank" href="https://undermu/foro?id={{$ultimo->id}}">{{$ultimo->titulo}}</a> by {{$ultimo->user_id}} </p>
                    @endforeach
                </div>
            </div>

            
        </div>
    </div>
</div>


    <script>
        
//===
// VARIABLES
//===
const DATE_TARGET = new Date('03/23/2024 5:00 PM');
// DOM for render
const SPAN_DAYS = document.getElementById('days');
const SPAN_HOURS = document.getElementById('hours');
const SPAN_MINUTES = document.getElementById('minutes');
const SPAN_SECONDS = document.getElementById('seconds');
// Milliseconds for the calculations
const MILLISECONDS_OF_A_SECOND = 1000;
const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24

//===
// FUNCTIONS
//===

/**
 * Method that updates the countdown and the sample
 */
function updateCountdown() {
    // Calcs
    const NOW = new Date()
    const DURATION = DATE_TARGET - NOW;
    const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
    const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
    const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
    const REMAINING_SECONDS = Math.floor((DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);
    // Thanks Pablo Monteserín (https://pablomonteserin.com/cuenta-regresiva/)

    // Render
    SPAN_DAYS.textContent = REMAINING_DAYS;
    SPAN_HOURS.textContent = REMAINING_HOURS;
    SPAN_MINUTES.textContent = REMAINING_MINUTES;
    SPAN_SECONDS.textContent = REMAINING_SECONDS;
}

//===
// INIT
//===
updateCountdown();
// Refresh every second
setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);

</script>

@endsection

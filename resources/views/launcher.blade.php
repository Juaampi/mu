
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/dashboard.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    </head>
    <body>
<div class="row">
   <img src="img/qr.jpeg" style="position: absolute;
   height: 280;
   top: 90px;
   z-index: 999;
   margin-left: 420px;">
    <div class="col-md-6">        
            <div class="panel">
                <div class="panel-body" style="padding: 40px;">
                <div class="row">
                    <table class="table table-responsive">
                        <thead style="font-size: 17px;background: #85b3f9;color: white;width:100%">
                            <th style="text-align: center"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                            <th>Jugador</i></th>
                            <th>Level <span class="badge badge-primary" style="
                                background: white;
                                color: #85b3f9;
                                position: relative; top: -10px;
                            ">Master Level</span></th>                    
                            <th>Guild</th>                              
                        </thead>
                        @php $count = 1 @endphp
                        @foreach($chars as $char)                    
                        @php $char->cLevel = $char->cLevel + $char->MasterLevel; @endphp
                        <tr>                       
                        <td style="text-align: center">
                            @if($count == 1)
                            <img style="height: 25px; margin-top: 20px;" src="img/primero.png" />
                            @endif                  
                            @if($count > 1)
                            <p style="margin-top: 20px; font-size: 15px;text-align:center">{{$count}}</p>
                            @endif
                            @php $count++ @endphp
                        
                        </td>
                        <td>                    
                            <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                            <span style="font-weight: bold;">{{$char->Name}}</span>
                            @foreach($guild as $g)
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
                            <p style="margin-top: 15px;font-size: 16px;font-weight: bold;">{{$char->cLevel}} <span style="position: relative; top: -10px;font-size: 12px;font-weight: bold;color:#85b3f9;text-align:center">{{$char->MasterLevel}}</span></p>
                        </td>             
                        <td>
                            @php 
                                $haveGuild = 0;                        
                            @endphp
                        
                            @foreach($guild as $g)                    
                                @if($g->Name == $char->Name)                            
                                    @php $haveGuild = 1 @endphp
                                    <img style="background: gray;margin-bottom: 10px;" src="https://muonlinepvp.net/api/guildmark.php?data={{$g->G_Mark}}&size=50" />                                                    
                                    <span style="font-weight: bold; font-size: 12px">{{$g->G_Name}} </span>                            
                                @endif
                            @endforeach
                            @if($haveGuild == 0)
                            <img style="background: gray;margin-bottom: 10px;height: 50px;width:50px;">                                                    
                            <span  style="font-weight: bold; font-size: 12px">Sin Guild</span>
                            @endif
                        </td>
                                    
                        </tr>
                        
                        @endforeach      
                    </table>
                </div></div>
                <div class="panel-footer">
                    <p class="text-center"><strong>Actualizado:</strong> Ahora mismo </p>
                </div>
            </div>   
    </div>     
    
    </body>
</html>
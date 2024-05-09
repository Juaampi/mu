@extends('layouts.app')

@section('content')

<div class="container-fluid" style="background-image: linear-gradient(
    rgba(0, 0, 0, 78%),
    rgba(0, 0, 0, 78%)
  ),url('img/ranking.jpg')" >

<div class="container">
<div class="row" style="margin-top: 150px;">
    <div class="col-md-12" style="text-align: center">
        <img src="img/logo.png" style="height: 100px">
        <p style="color:white;font-size: 40px;font-family:'Bowlby One SC', cursive;">RANKING <span style="color:#147bac;font-weight: bold;">UNDERMU</span></p>
    </div>
</div>
</div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="panel">
        <div class="panel-heading" style="background: #e8e8e8">
            The UNDERMU ranking is a system created to choose the best players on the server. <a data-toggle="modal" data-target="#info-eternal" class="menu-button">¿Cómo Funciona?</a>
        </div>
        <div class="panel-body" style="padding: 40px;">        
        <div class="row">
            <table class="table table-responsive">
                <thead style="font-size: 17px;background: #85b3f9;color: white;width:100%">
                    <th style="text-align: center"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                    <th>Jugador</i></th>
                    <th>Guild</th>
                    <th>Pts UNDERMU</th>
                    <th>Asesinatos</th>
                    <th>BC</th>                    
                    <th>DS</th>                    
                    <th>CC</th>                    
                    <th>Level <span style="font-size: 12px;color: rgb(0, 157, 255);">ML</span></th>                                        
                    <th>País</th> 
                    <th>Patente</th>                    
                </thead>
                @php $count = 1; 
                    $score = 0; 
                @endphp
                @foreach($chars as $char)
                    @if($char->eternal > 0)                  
                @php $score = 0; $char->cLevel = $char->cLevel + $char->MasterLevel; @endphp
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
                <td> 
                  <p style="margin-top: 15px;font-size: 16px;"> <span style="background: #85b3f9;color: white;padding: 5px;border-radius: 5px;">{{$char->eternal}}</span></p>
                </td>
                <td> 
                    <p style="margin-top: 15px;font-size: 16px;color:rgb(36, 113, 36);">{{$char->PkCount}}</p>
                </td>  
                <td>                      
                    @foreach($blood as $bc)
                        @if($char->Name == $bc->Name)      
                            <p style="margin-top: 15px;font-size: 16px;font-weight: bold;">
                                @php 
                                    if ($bc->Score < 1000000) {
                                        // Anything less than a million
                                        $format = number_format($bc->Score / 1000, 0) . 'k';
                                    } else if ($number < 1000000000) {
                                        // Anything less than a billion
                                        $format = number_format($bc->Score / 1000000, 0) . 'M';
                                    } else {
                                        // At least a billion
                                        $format = number_format($bc->Score / 1000000000, 0) . 'B';
                                    }
                                
                                @endphp
                                {{$format}}      
                              </p> 
                        @endif
                    @endforeach
                </td>
                <td>                      
                    @foreach($devil as $d)
                        @if($char->Name == $d->Name)      
                            <p style="margin-top: 15px;font-size: 16px;font-weight: bold;"> 
                                @php 
                                    if ($d->Score < 1000000) {
                                        // Anything less than a million
                                        $format = number_format($d->Score / 1000, 0) . 'k';
                                    } else if ($number < 1000000000) {
                                        // Anything less than a billion
                                        $format = number_format($d->Score / 1000000, 0) . 'M';
                                    } else {
                                        // At least a billion
                                        $format = number_format($d->Score / 1000000000, 0) . 'B';
                                    }
                                
                                @endphp
                                {{$format}}    
                            </p>                            
                        @endif
                    @endforeach
                </td>
                <td>                      
                    @foreach($chaos as $c)
                        @if($char->Name == $c->Name)                                                              
                            <p style="margin-top: 15px;font-size: 16px;font-weight: bold;">                                                                 
                                @php 
                                    if ($c->Score < 1000000) {
                                        // Anything less than a million
                                        $format = number_format($c->Score / 1000, 0) . 'k';
                                    } else if ($number < 1000000000) {
                                        // Anything less than a billion
                                        $format = number_format($c->Score / 1000000, 0) . 'M';
                                    } else {
                                        // At least a billion
                                        $format = number_format($c->Score / 1000000000, 0) . 'B';
                                    }
                                
                                @endphp
                                {{$format}}    </p> 
                        @endif
                    @endforeach
                </td>

                <td>
                    @php $char->cLevel = $char->cLevel - $char->MasterLevel; @endphp
                    <p style="margin-top: 15px;font-size: 16px;font-weight: bold;">{{$char->cLevel}} <span style="font-size: 10px;color: rgb(0, 157, 255);">{{$char->MasterLevel}}</span></p>
                </td>               
               
              
                <td>
                    <img style="height: 20px;margin-top: 20px;" src="img/flags/{{$char->country}}.gif" />
                </td>
                    <td>   <p> 
                        @php $char->cLevel = $char->cLevel + $char->MasterLevel; @endphp
                        @if($char->cLevel >= 1 && $char->cLevel <= 50)
                            <img src="img-rank/Rank01.png" title="NOVATO" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 51 && $char->cLevel <= 100)
                            <img src="img-rank/Rank02.png" title="APRENDIS" style="height: 50px"> 
                        @endif      
                        @if($char->cLevel >= 101 && $char->cLevel <= 150)
                            <img src="img-rank/Rank03.png" title="MENSAJERO" style="height: 50px"> 
                        @endif  
                        @if($char->cLevel >= 151 && $char->cLevel <= 200)
                            <img src="img-rank/Rank04.png" title="CAZADOR" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 201 && $char->cLevel <= 250)
                            <img src="img-rank/Rank05.png" title="ASESINO" style="height: 50px"> 
                        @endif   
                        @if($char->cLevel >= 251 && $char->cLevel <= 300)
                            <img src="img-rank/Rank06.png" title="ARQUERO" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 301 && $char->cLevel <= 350)
                            <img src="img-rank/Rank07.png" title="LANCERO" style="height: 50px"> 
                        @endif              
                        @if($char->cLevel >= 351 && $char->cLevel <= 370)
                            <img src="img-rank/Rank08.png" title="CABALLERO" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 371 && $char->cLevel <= 390)
                            <img src="img-rank/Rank09.png" title="SOLDADO" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 391 && $char->cLevel <= 400)
                            <img src="img-rank/Rank10.png" title="GUERRERO" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 401 && $char->cLevel <= 410)
                            <img src="img-rank/Rank11.png" title="GLADIADOR" style="height: 50px"> 
                        @endif
                        @if($char->cLevel >= 411 && $char->cLevel <= 420)
                            <img src="img-rank/Rank12.png" title="GENERAL" style="width: 10px"> 
                        @endif
                        @if($char->cLevel >= 421 && $char->cLevel <= 425)
                            <img src="img-rank/Rank13.png" title="SUPREMO" style="height: 50px"> 
                        @endif

                    </p></td>
                </tr>
                  @endif
                @endforeach      
            </table>
        </div></div>
        <div class="panel-footer">
            <p class="text-center"><strong>Actualizado:</strong> Ahora mismo </p>
        </div>
    </div>
</div>



@endsection
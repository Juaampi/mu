@extends('layouts.app')

@section('content')

<div class="container-fluid"  style="background-image: linear-gradient(
    rgba(0, 0, 0, 78%),
    rgba(0, 0, 0, 78%)
  ),url('img/rankgeneral.jpg')" >

<div class="container">
    <div class="row" style="margin-top: 150px;">
        <div class="col-md-12" style="text-align: center">
            <img src="img/general.png" style="height: 100px">
            <p style="color:white;font-size: 40px;font-family:'Bowlby One SC', cursive;">RANKING <span style="color:#edaf35;font-weight: bold;">GENERAL</span></p>
        </div>
    </div>
</div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="panel">
        <div class="panel-body" style="padding: 40px;">
        <div class="row">
            <table class="table table-responsive">
                <thead style="font-size: 17px;background: #85b3f9;color: white;width:100%">
                    <th style="text-align: center"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                    <th>Jugador</i></th>
                    <th>Level</th>
                    <th style="text-align: center">M. Level</th>
                    <th>Guild</th>
                    <th>País</th> 
                    <th>Patente</th>                    
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
                    <p style="margin-top: 15px;font-size: 16px;font-weight: bold;">{{$char->cLevel}}</p>
                </td>
                <td style="text-align:center;">
                    <p style="margin-top: 15px;font-size: 16px;font-weight: bold;color:#26b726;text-align:center">{{$char->MasterLevel}}</p>
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
                  
                @endforeach      
            </table>
        </div></div>
        <div class="panel-footer">
            <p class="text-center"><strong>Actualizado:</strong> Ahora mismo </p>
        </div>
    </div>
</div>



@endsection
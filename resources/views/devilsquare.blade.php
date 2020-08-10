@extends('layouts.app')

@section('content')

<div class="container-fluid" style="background-image: url('img/duelos.jpg')" >

    <div class="container">
        <div class="row" style="margin-top: 300px;">
            <div class="col-md-6">
                <h3 style="color:white;font-weight:bold;">Ranking del Devil Square</h3>
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
                    <th>Guild</th>
                    <th style="text-align: center">Puntos</th>                    
                    <th style="text-align: center">País</th>                    
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
                    <div class="col-md-2" style="margin-left: -10px;">
                        <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                    </div>
                    <div class="col-md-6">
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
                    <br>                  
                    <span style="font-size: 12px;"><strong>Level: {{$char->cLevel}} <span style="color: #4b84da">M. Level: {{$char->MasterLevel}}</span></strong></span>
                    </div>
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
                    <td style="text-align: center">
                        <p style="margin-top: 15px;font-size: 16px;font-weight: bold;">{{$char->Score}}</p>
                    </td>                    
                                                                
                        <td style="text-align: center">
                            <img style="height: 20px;margin-top: 20px;" src="img/flags/{{$char->country}}.gif" />
                        </td>                    
                </tr>
                @endforeach
            </table>
        </div>
        </div> 
        <div class="panel-footer">
            <p class="text-center"><strong>Actualizado:</strong> Ahora mismo </p>
        </div>       
    </div>
</div>
@endsection
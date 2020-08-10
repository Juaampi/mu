@extends('layouts.app')

@section('content')

<div class="container-fluid" style="background-image: url('img/duelos.jpg')" >

    <div class="container">
        <div class="row" style="margin-top: 300px;">
            <div class="col-md-6">
                <h3 style="color:white;font-weight:bold;">Ranking de Clanes</h3>
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
                    <th>Guild</i></th>                    
                    <th>Master <img src="img/master.png" height="20px"></th>
                    <th>Asistente <img src="img/asistente.png" height="20px"></th> 
                    <th>Battle Master <img src="img/bm.png" height="20px"></th>                                        
                    <th style="text-align: center">Score</th>
                </thead>    
                @php $count = 1 @endphp
                @foreach($guilds as $guild)                                  
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
                    <td style="width: 120px">
                        <img style="background: gray;margin-bottom: 10px;" src="https://muonlinepvp.net/api/guildmark.php?data={{$guild->G_Mark}}&size=50" />                                                    
                        <span style="font-weight: bold; font-size: 12px">{{$guild->G_Name}} </span>                            
                    </td>
                    <td>
                        @foreach($chars as $char)
                            @if($guild->G_Master == $char->Name)
                            <div class="col-md-2" style="margin-left: -10px;">
                                <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                            </div>
                            <div class="col-md-8" style="margin-left: 26px;margin-top: 5px;">
                                <span style="font-weight: bold;">{{$char->Name}}</span>                        
                                <br>                  
                                <span style="font-size: 12px;"><strong>Lvl: {{$char->cLevel}} <span style="color: #4b84da">M. Lvl: {{$char->MasterLevel}}</span></strong></span>
                            </div>
                            @endif
                        @endforeach
                    </td>
                    <td>                        
                            @foreach($chars as $char)
                                @if($guild->G_Name == $char->G_Name)
                                    @if($char->G_Status == '64')
                                    <div class="col-md-2" style="margin-left: -10px;">
                                        <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                                    </div>
                                    <div class="col-md-8" style="margin-left: 26px;margin-top: 5px;">
                                        <span style="font-weight: bold;">{{$char->Name}}</span>                        
                                        <br>                  
                                        <span style="font-size: 12px;"><strong>Lvl: {{$char->cLevel}} <span style="color: #4b84da">M. Lvl: {{$char->MasterLevel}}</span></strong></span>
                                    </div>
                                    @endif
                                @endif
                            @endforeach                        
                    </td>
                    <td>      
                        <div class="row">                  
                        @foreach($chars as $char)
                            @if($guild->G_Name == $char->G_Name)
                                @if($char->G_Status == '32')
                                
                                    <div class="col-md-2" style="margin-left: -10px;">
                                        <img src="img/class/{{$char->Class}}.png" @if($char->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                                    </div>
                                    <div class="col-md-4" style="margin-right: -5px;">
                                        <span style="font-weight: bold;">{{$char->Name}}</span>                        
                                        <br>                  
                                        <span style="font-size: 12px;"><strong>Lvl: {{$char->cLevel}} <span style="color: #4b84da">M. Lvl: {{$char->MasterLevel}}2</span></strong></span>
                                    </div>
                                @endif
                            @endif
                        @endforeach 
                        </div>                       
                    </td>
                    <td>
                        <span class="badge badge-secondary" style="margin-top: 15px;font-size: 16px;font-weight: bold;text-align:center">{{$char->cLevel}}</span>
                    </td>             
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
</div>
    
@endsection
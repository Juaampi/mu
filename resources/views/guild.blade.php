@extends('layouts.app')

@section('content')

<div class="container-fluid"  style="background-image: linear-gradient(
    rgba(0, 0, 0, 78%),
    rgba(0, 0, 0, 78%)
  ),url('img/rankgeneral.jpg')" >

<div class="container">
    <div class="row" style="margin-top: 150px;">
        <div class="col-md-12" style="text-align: center">
            <img style="background: gray;margin-bottom: 10px;" src="https://muonlinepvp.net/api/guildmark.php?data={{$guild->G_Mark}}&size=50" />                                                    
            <p style="color:white;font-size: 40px;font-family:'Bowlby One SC', cursive;">{{$guild->G_Name}} </p>
        </div>
    </div>
</div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="panel">
        <div class="panel-heading">
            <p class="buscador">   
                <label>Buscador de PJ's</label>             
                <input id="buscador" class="form-control" type="input" value="" placeholder="Ingrese el nombre del personaje a buscar">
            </p>
        </div>
        <div class="panel-body" style="padding: 40px;">
        <div class="row">
            <table class="table table-responsive">
                <thead style="font-size: 17px;background: #85b3f9;color: white;width:100%">
                    <th style="text-align: center"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                    <th>Jugador</i></th>
                    <th>Level</th>
                    <th style="text-align: center">M. Level</th>                 
                    <th>País</th>                               
                </thead>
                @php $count = 1 @endphp
                @foreach($chars as $char)                    
                @php $char->cLevel = $char->cLevel + $char->MasterLevel; @endphp
                <tr class="item">                       
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
                    <span style="font-weight: bold;" class="nombres">{{$char->Name}}</span>
                    @foreach($guilds as $g)
                        @if($g->Name == $char->Name)
                           @if($g->G_Status == '128')                           
                                <img src="img/master.png" style="height: 30px;" title="MASTER">
                           @endif
                           @if($g->G_Status == '64')
                                <img src="img/asistente.png" style="height: 30px;" title="ASISTENTE">
                            @endif
                            @if($g->G_Status == '32')
                                <img src="img/bm.png" style="height: 30px;" title="BATTLE MASTER">
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
                    <img style="height: 20px;margin-top: 20px;" src="img/flags/{{$char->country}}.gif" />
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

<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
            $('#buscador').keyup(function(){
            var nombres = $('.nombres');
            var buscando = $(this).val();
            var item='';
                for( var i = 0; i < nombres.length; i++ ){
                    item = $(nombres[i]).html().toLowerCase();
                    for(var x = 0; x < item.length; x++ ){
                        if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                            $(nombres[i]).parents('.item').show(); 
                        }else{
                            $(nombres[i]).parents('.item').hide();
                        }
                    }
                }
            });
});
</script>
@endsection
@extends('layouts.app')

@section('content')

@php use App\Respuesta; @endphp


<div style="background: #171717">
  <img src="img/forum-head.jpg" style="width: 100%">

<div class="row">
  <div class="container">
  <p style="margin-top: -80px;font-family:'Bowlby One SC', cursive;color:white;font-size:25px;">Foro personalizado de UnderMu Slow</p>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="container-fluid">
    <div class="col-md-9">
      <div class="row">
        <div class="panel">
          <div class="panel-heading" style="color: #bab8b8;background: #282727;">
            <h3><strong>{{$categoria[0]->nombre}}</strong></h3>
            @if(Auth::user())
            <a href="/agregar?id={{$categoria[0]->id}}" class="btn btn-primary">Agregar tema</a>
            @endif
          </div>          
          <div class="panel-body" style="background: #1f1e1e">
            <p class="buscador">   
              <label>Buscador de temas</label>             
              <input id="buscador" class="form-control" type="input" value="" placeholder="Ingrese el nombre del tema">
          </p>

          @php $pineado = DB::table('temas')->join('MEMB_INFO', 'MEMB_INFO.memb___id', '=', 'temas.id_usuario')->where('id', '=', 74)->first(); @endphp
          
          <div class="row item" style="border: 1px #282727 solid; padding: 10px; background: black">
            <div class="col-md-8">
            <a style="color: #c7c7c7" href="/tema?id={{$pineado->id}}" style="color: #b6b2b2">
              <h4 style="margin-bottom: 0px;">
                <span class="badge badge-danger">Pinned</span>@if($pineado->img)<img height="30px" width="30px" style="border-radius: 90px; margin-right: 10px;" src="img-perfil/{{$pineado->img}}">@else <img height="30px" style="border-radius: 90px;margin-right: 10px;w" width="30px" src="img-perfil/avatar.jpg">@endif
              <span  class="nombres">{{$pineado->titulo}}</span></h4></a>
               @php $temita2 = DB::table('temas')->where('id', '=', $pineado->id)->first(); @endphp
               <?php $time_elapsed2 = timeAgo($temita2->created_at); ?> 
               <small style="color: #c7c7c7"> By <strong>{{$pineado->memb_name}}</strong> <span style="font-style: italic">{{$time_elapsed2}}</span></small>              
            </div>           
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-3">
                  @php $resp2 = DB::table('respuestas')->where('id_tema','=', $pineado->id)->orderBy('created_at', 'desc')->first();@endphp 
                  @if($resp2)
                    @php $user2 = DB::table('MEMB_INFO')->where('memb___id', '=', $resp2->id_usuario)->first(); @endphp
                      <p>@if($user2->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$user2->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                      </div>
                      <div class="col-md-9">                                                                                
                      <?php $time_elipsed3 = timeAgo($resp2->created_at); ?> 
                      response by <span style="color: white;font-size: 12px;">{{$user2->memb_name}}</span>
                      <br><small>at {{$time_elipsed3}}</small>
                  @else
                  <small style="font-style: italic">No response</small>
                  @endif
                </div>
              </div>              
            </div>
          </div>

            @foreach($categoria_datos as $tema)
            @php             
            $respuestas = Respuesta::where('id_tema', '=', $tema->id)->count();
            @endphp
            <div class="row item" style="border: 1px #282727 solid; padding: 10px; background: black">
              <div class="col-md-6">
              <a style="color: #c7c7c7" href="/tema?id={{$tema->id}}" style="color: #b6b2b2">
                <h4 style="margin-bottom: 0px;">
                @if($tema->img)<img height="30px" width="30px" style="border-radius: 90px; margin-right: 10px;" src="img-perfil/{{$tema->img}}">@else <img height="30px" style="border-radius: 90px;margin-right: 10px;w" width="30px" src="img-perfil/avatar.jpg">@endif
                <span  class="nombres">{{$tema->titulo}}</span></h4></a>
                 @php $temita = DB::table('temas')->where('id', '=', $tema->id)->first(); @endphp
                 <?php $time_elapsed = timeAgo($temita->created_at); ?> 
                 <small style="color: #c7c7c7"> By <strong>{{$tema->memb_name}}</strong> <span style="font-style: italic">{{$time_elapsed}}</span></small>              
              </div>
              <div class="col-md-2">
                <p style="color: #c7c7c7">Reply's: <strong>{{$respuestas}}</strong></p>
                <p style="color: #c7c7c7">Thank's: <strong>
                  @php $likes = DB::table('likes')->where('id_tema', '=', $tema->id)->count(); @endphp
                  {{$likes}} </strong></p>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-3">
                    @php $resp = DB::table('respuestas')->where('id_tema','=', $tema->id)->orderBy('created_at', 'desc')->first();@endphp 
                    @if($resp)
                      @php $user = DB::table('MEMB_INFO')->where('memb___id', '=', $resp->id_usuario)->first(); @endphp
                        <p>@if($user->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$user->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                        </div>
                        <div class="col-md-9">                                                                                
                        <?php $time_elipsed = timeAgo($resp->created_at); ?> 
                        response by <span style="color: white;font-size: 12px;">{{$user->memb_name}}</span>
                        <br><small>at {{$time_elipsed}}</small>
                    @else
                    <small style="font-style: italic">No response</small>
                    @endif
                  </div>
                </div>              
              </div>
            </div>
            @endforeach
           
    </div>
  </div>
  
</div>
</div>

<div class="col-md-3">
  <div class="panel">
    <div class="panel-heading" style="background: #efefef">
        LAST POST'S
    </div>
    <div class="panel-body" style="background: #1f1e1e;">
      @php 
      $ultimos = DB::table('temas')->join('MEMB_INFO', 'temas.id_usuario', '=', 'MEMB_INFO.memb___id')->orderBy('temas.created_at', 'desc')->take(10)->get();
      @endphp                
      @foreach($ultimos as $ultimo)		
      <div class="row">            
        <div class="col-md-2">
          <p>@if($ultimo->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$ultimo->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
          </div>
        <div class="col-md-10">           			                
            <p><a href="https://undermu.com/tema?id={{$ultimo->id}}">{{$ultimo->titulo}}</a> 
              <br>by {{$ultimo->memb_name}} on @php $categoria = DB::table('categorias')->where('id', '=', $ultimo->id_categoria)->first(); @endphp <strong>{{$categoria->nombre}}</strong>
        <br>
        <?php                   
        $ultimoTema = DB::table('temas')->where('id', '=', $ultimo->id)->first();
        //$date = date('d/m/Y', strtotime(str_replace('-','/', $ultimoTema->created_at)));
     $hoy = date('d-m-Y');										
     $ayer = date('d-m-Y', strtotime($hoy. ' - 1 day'));
     
     $inicioSemana = date('monday this week');				
     $finSemana = date('sunday this week');					

     // La fecha que quieres comparar
     $fecha = date('d-m-Y', strtotime($ultimoTema->created_at)); // Cambia a la fecha que quieras evaluar
        $date = date('d-m-Y', strtotime($ultimoTema->created_at));
        $FirstDay = date("d-m-Y", strtotime('sunday last week'));  
       $LastDay = date("d-m-Y", strtotime('sunday this week')); 

     $ahora = date('d-m-Y H:i:s');
     $inicioRango = date('d-m-Y H:i:s', strtotime($ultimoTema->created_at));
     $finRango = date('d-m-Y H:i:s', strtotime('+1 hour')); 
     $hours = date('d-m-Y H:i:s') - date('d-m-Y H:i:s', strtotime($ultimoTema->created_at));


       if(date('d-m-Y H:i:s') - date('d-m-Y H:i:s', strtotime($ultimoTema->created_at)) > 3599){
         echo $hours;
         $date = 'LAST HOUR';
       }
       else if($date == date('d-m-Y')) {
         $date = 'Today ' . date('H:i', strtotime($ultimoTema->created_at));
       } 
       else if($date == $ayer) {		
         $date = 'Yesterday';
       }							
        else if($fecha >= $inicioSemana && $fecha <= $finSemana) {

         $date = 'This Week';
       }						

       $time_elapsed = timeAgo($ultimoTema->created_at);
                   
        ?>
       @if($date == 'Today ' . date('H:i', strtotime($ultimoTema->created_at)))
             <span style="font-size: 13px;color: #f39c1a;padding: 4px;">{{$time_elapsed}}</span>
        @elseif($date == 'Yesterday')
             <span style="font-size: 13px;color: #999999;padding: 4px;">{{$time_elapsed}}</span>
        @elseif($date == 'This week')
             <span style="font-size: 13px;color: #999999;padding: 4px;">{{$time_elapsed}}</span>
       @elseif($date != 'This week' && $date != 'Today ' . date('H:i', strtotime($ultimoTema->created_at)) && $date != 'Yesterday')
         <span style="font-size: 13px;color: #999999;padding: 4px;">{{$time_elapsed}}</span>
       @endif					
      </p>

            <hr style="margin: 1px;">
                  
        </div>

    </div>
    @endforeach  
    </div>
</div>


<div class="panel">
  <div class="panel-heading" style="background: #efefef">
      LAST REPLY'S
  </div>
  <div class="panel-body" style="background: #1f1e1e;">
      @php 
      $respuestas = DB::table('respuestas')->join('MEMB_INFO', 'respuestas.id_usuario', '=', 'MEMB_INFO.memb___id')->orderBy('respuestas.created_at', 'desc')->take(10)->get();
      
      @endphp                
      @foreach($respuestas as $ultimo)	
      <div class="row">            
        <div class="col-md-2">
          <p>@if($ultimo->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$ultimo->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
          </div>
        <div class="col-md-10">    
          @php
            $tema = DB::table('temas')->join('MEMB_INFO', 'temas.id_usuario', '=', 'MEMB_INFO.memb___id')->where('id', '=', $ultimo->id_tema)->first();
          @endphp				                
          <p> Reply by {{$ultimo->memb_name}}
          <br>ON POST <a href="https://undermu.com/tema?id={{$tema->id}}">{{$tema->titulo}}</a>  
          <br>
          
          <?php 
           $ultimaRestp = DB::table('respuestas')->where('id', '=', $ultimo->id)->first();
           //$date = date('d/m/Y', strtotime(str_replace('-','/', $ultimoTema->created_at)));
        $hoy2 = date('d-m-Y');															
        $inicioSemana2 = date('d-m-Y monday this week');				
        $finSemana2 = date('d-m-Y sunday this week');	
        $ayer2 = date('d-m-Y', strtotime($hoy2. ' - 1 day'));					

        // La fecha que quieres comparar
        $fecha2 = date('d-m-Y', strtotime($ultimaRestp->created_at)); // Cambia a la fecha que quieras evaluar
           $date2 = date('d-m-Y', strtotime($ultimaRestp->created_at));
           $FirstDay2 = date("d-m-Y", strtotime('sunday last week'));  
          $LastDay2 = date("d-m-Y", strtotime('sunday this week')); 
          if($date2 == date('d-m-Y')) {
            $date2 = 'Today ' . date('H:i', strtotime($ultimaRestp->created_at));
          } 
          else if($date2 == $ayer2) {							
            $date2 = 'Yesterday ';
          }							
           else if($fecha2 >= $inicioSemana2 && $fecha2 <= $finSemana2) {
  
            $date2 = 'This week ';
          }						

          $time_elapsed = timeAgo($ultimaRestp->created_at);
                      
           ?>
          @if($date2 == 'Today ' . date('H:i', strtotime($ultimaRestp->created_at)))
                <span style="font-size: 13px;color: #f39c1a;padding: 4px;">{{$time_elapsed}}</span>
           @elseif($date2 == 'Yesterday')
                <span style="font-size: 13px;color: #999999;padding: 4px;">{{$time_elapsed}}</span>
           @elseif($date2 == 'This week')
                <span style="font-size: 13px;color: #999999;padding: 4px;">{{$time_elapsed}}</span>
          @elseif($date2 != 'This week' && $date != 'Today ' . date('H:i', strtotime($ultimaRestp->created_at)) && $date != 'Yesterday')
            <span style="font-size: 13px;color: #999999;padding: 4px;">{{$time_elapsed}}</span>
          @endif				
        
        </p>        
          <hr style="margin: 1px;">
        </div>
      </div>
      @endforeach
  </div>
</div>


</div>
  </div>
</div>
<?php 
function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hours ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}
?>


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
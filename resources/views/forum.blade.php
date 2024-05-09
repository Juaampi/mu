@extends('layouts.app')

@section('content')

@php use App\Tema; 
use App\User;
@endphp



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
            <h3><strong>General</strong></h3>
          </div>          
          <div class="panel-body" style="background: #1f1e1e">
            <div class="row" style="border: 1px #282727 solid; padding: 10px; background: #1f1e1e">
              <div class="col-md-8">
              <a href="/categoria?id=1" style="color: #b6b2b2"><h4><i class="fa fa-info"></i> Noticias / News</h4></a>
              <small>Aquí encontrarás las últimas novedades sobre UnderMu Slow-Hard Temporada 2</small>
            </div>
            @php $temasEnCategoria1 = Tema::where('id_categoria', '=', 1)->count(); 
            $ultimoTemaEnCategoria1 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 1)->first();
            if($ultimoTemaEnCategoria1 != null){
                $usuarioDelUltimoTemaCat1 = User::where('memb___id', '=', $ultimoTemaEnCategoria1->id_usuario)->first(); 
            }
            
            
            @endphp
            @if($temasEnCategoria1 != null && $ultimoTemaEnCategoria1 != null && $usuarioDelUltimoTemaCat1 != null)
            <div class="col-md-1">             
            <p style="text-align: center"><strong>{{$temasEnCategoria1}}</strong> <br>
            post's</p>              
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat1->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat1->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria1->id}}" style="text-overflow: ellipsis;white-space: nowrap;">{{substr($ultimoTemaEnCategoria1->titulo,0,20)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat1->memb_name}}</span> {{date_format($ultimoTemaEnCategoria1->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
            </div>

            <div class="row" style="border: 1px #282727 solid; padding: 10px; background: #1f1e1e">
              <div class="col-md-8">
              <a href="/categoria?id=6" style="color: #b6b2b2"><h4><i class="fa fa-address-card"></i> Presentaciones</h4></a>
              <small>Si te consideras un jugador importante, no dudes en presentarte ante la comunidad. (Recibiras 100WC)</small>
            </div>
            @php $temasEnCategoria6 = Tema::where('id_categoria', '=', 6)->count(); 
            $ultimoTemaEnCategoria6 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 6)->first();
            if($ultimoTemaEnCategoria6 != null){
                $usuarioDelUltimoTemaCat6 = User::where('memb___id', '=', $ultimoTemaEnCategoria6->id_usuario)->first(); 
            }
            
            
            @endphp
            @if($temasEnCategoria6 != null && $ultimoTemaEnCategoria6 != null && $usuarioDelUltimoTemaCat6 != null)
            <div class="col-md-1">             
              <p style="text-align: center"><strong>{{$temasEnCategoria6}}</strong> <br>
                post's</p>  
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat6->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat6->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria6->id}}">{{substr($ultimoTemaEnCategoria6->titulo,0,20)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat6->memb_name}}</span> {{date_format($ultimoTemaEnCategoria6->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
            </div>



            <div class="row" style="border: 1px #282727 solid; padding: 10px; background: #1f1e1e">
              <div class="col-md-8">
              <a href="/categoria?id=2" style="color: #b6b2b2"><h4><i class="fa fa-calendar"></i> Eventos / Events</h4></a>
              <small>Aquí encontrarás todas las guías a los eventos de UnderMu</small>
              </div>
              @php $temasEnCategoria2 = Tema::where('id_categoria', '=', 2)->count(); 
              $ultimoTemaEnCategoria2 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 2)->first();
              if($ultimoTemaEnCategoria2 != null){
                $usuarioDelUltimoTemaCat2 = User::where('memb___id', '=', $ultimoTemaEnCategoria2->id_usuario)->first(); 
            }
             
              @endphp
              @if($temasEnCategoria2 != null && $ultimoTemaEnCategoria2 != null && $usuarioDelUltimoTemaCat2 != null)
              <div class="col-md-1">             
                <p style="text-align: center"><strong>{{$temasEnCategoria2}}</strong> <br>
                  post's</p>           
              </div>
             
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-3">
                  <p>@if($usuarioDelUltimoTemaCat2->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat2->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                  </div>
                  <div class="col-md-9">
                    <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria2->id}}">{{substr($ultimoTemaEnCategoria2->titulo,0,25)}}</a></span>
                    <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat2->memb_name}}</span> {{date_format($ultimoTemaEnCategoria2->created_at,"d/m/Y") }}</small>
                  </div>
                </div>              
              </div>
              @endif
            </div>          
          </div>
            
        </div>
    </div>
    <div class="row">
      <div class="panel">
        <div class="panel-heading" style="color: #bab8b8;background: #282727;">
          <h3><strong>Para el usuario</strong></h3>
        </div>
        <div class="panel-body" style="background: #1f1e1e">                 
          <div class="row" style="border: 1px #282727 solid; padding: 10px; background: #1f1e1e">
            <div class="col-md-8">
              <a href="/categoria?id=3" style="color: #b6b2b2"><h4><i class="fa fa-ticket"></i> Soporte / Support</h4></a>
              <small>Aquí te daremos soporte 24/7 sobre la jugabilidad de la temporada 2</small>
            </div>
            @php $temasEnCategoria3 = Tema::where('id_categoria', '=', 3)->count(); 
            $ultimoTemaEnCategoria3 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 3)->first();
            if($ultimoTemaEnCategoria3 != null){
                $usuarioDelUltimoTemaCat3 = User::where('memb___id', '=', $ultimoTemaEnCategoria3->id_usuario)->first(); 
            }
            
            @endphp
            @if($temasEnCategoria3 != null && $ultimoTemaEnCategoria3 != null && $usuarioDelUltimoTemaCat3 != null)
            <div class="col-md-1">             
              <p style="text-align: center"><strong>{{$temasEnCategoria3}}</strong> <br>
                post's</p>              
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat3->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat3->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria3->id}}">{{substr($ultimoTemaEnCategoria3->titulo,0,25)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat3->memb_name}}</span> {{date_format($ultimoTemaEnCategoria3->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
          </div>
          <div class="row" style="border: 1px #282727 solid; padding: 10px;">
            <div class="col-md-8">              
              <a href="/categoria?id=4" style="color: #b6b2b2"><h4><i class="fa fa-wrench"></i> Reporte de errores / Report bug</h4></a>
              <small>Aquí podrás reportar los bugs que encuentres para que podamos corregirlos. </small>              
            </div>
            @php $temasEnCategoria4 = Tema::where('id_categoria', '=', 4)->count(); 
            $ultimoTemaEnCategoria4 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 4)->first();
            if($ultimoTemaEnCategoria4 != null){
                $usuarioDelUltimoTemaCat4 = User::where('memb___id', '=', $ultimoTemaEnCategoria4->id_usuario)->first(); 
            }
            
            @endphp
            @if($temasEnCategoria4 != null && $ultimoTemaEnCategoria4 != null && $usuarioDelUltimoTemaCat4 != null)
            <div class="col-md-1">             
              <p style="text-align: center"><strong>{{$temasEnCategoria4}}</strong> <br>
                post's</p>            
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat4->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat4->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria4->id}}">{{substr($ultimoTemaEnCategoria4->titulo,0,25)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat4->memb_name}}</span> {{date_format($ultimoTemaEnCategoria4->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
            
          </div>
          <div class="row" style="border: 1px #282727 solid; padding: 10px;">
            <div class="col-md-8">
              <a href="/categoria?id=5" style="color: #b6b2b2"><h4><i class="fa fa-star"></i> Denuncias / Complaints</h4></a>
              <small>Aquí podrás denunciar injusticias que luego evaluaremos con el staff. </small>
            </div>
            @php $temasEnCategoria5 = Tema::where('id_categoria', '=', 5)->count(); 
            $ultimoTemaEnCategoria5 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 5)->first();
            if($ultimoTemaEnCategoria5 != null){
                $usuarioDelUltimoTemaCat5 = User::where('memb___id', '=', $ultimoTemaEnCategoria5->id_usuario)->first(); 
            }
            
            @endphp
            @if($temasEnCategoria5 != null && $ultimoTemaEnCategoria5 != null && $usuarioDelUltimoTemaCat5 != null)
            <div class="col-md-1">             
              <p style="text-align: center"><strong>{{$temasEnCategoria5}}</strong> <br>
                post's</p>  
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat5->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat5->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria5->id}}">{{substr($ultimoTemaEnCategoria5->titulo,0,25)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat5->memb_name}}</span> {{date_format($ultimoTemaEnCategoria5->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
          </div>



         

          <div class="row" style="border: 1px #282727 solid; padding: 10px;">
            <div class="col-md-8">
              <a href="/categoria?id=7" style="color: #b6b2b2"><h4><i class="fa fa-folder"></i> Guías / Guides</h4></a> {{--  fa-film --}}
              <small>Categoría en la que se compartirán guías en general del servidor. </small>
            </div>
            @php $temasEnCategoria7 = Tema::where('id_categoria', '=', 7)->count(); 
            $ultimoTemaEnCategoria7 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 7)->first();
            if($ultimoTemaEnCategoria7 != null){
                $usuarioDelUltimoTemaCat7 = User::where('memb___id', '=', $ultimoTemaEnCategoria7->id_usuario)->first(); 
            }
            
            @endphp
            @if($temasEnCategoria7 != null && $ultimoTemaEnCategoria7 != null && $usuarioDelUltimoTemaCat7 != null)
            <div class="col-md-1">             
              <p style="text-align: center"><strong>{{$temasEnCategoria7}}</strong> <br>
                post's</p>         
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat7->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat7->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria7->id}}">{{substr($ultimoTemaEnCategoria7->titulo,0,25)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat7->memb_name}}</span> {{date_format($ultimoTemaEnCategoria7->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
          </div>


          <div class="row" style="border: 1px #282727 solid; padding: 10px;">
            <div class="col-md-8">
              <a href="/categoria?id=8" style="color: #b6b2b2"><h4><i class="fa fa-film"></i> Multimedia</h4></a> {{--  fa-film --}}
              <small>Espacio para compartir videos e imágenes del juego. </small>
            </div>
            @php $temasEnCategoria8 = Tema::where('id_categoria', '=', 8)->count(); 
            $ultimoTemaEnCategoria8 = Tema::orderBy('created_at', 'desc')->where('id_categoria', '=', 8)->first();
            if($ultimoTemaEnCategoria8 != null){
                $usuarioDelUltimoTemaCat8 = User::where('memb___id', '=', $usuarioDelUltimoTemaCat8->id_usuario)->first(); 
            }
            
            @endphp
            @if($temasEnCategoria8 != null && $ultimoTemaEnCategoria8 != null && $usuarioDelUltimoTemaCat8 != null)
            <div class="col-md-1">             
              <p style="text-align: center"><strong>{{$temasEnCategoria8}}</strong> <br>
                post's</p>  
            </div>
           
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-3">
                <p>@if($usuarioDelUltimoTemaCat8->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$usuarioDelUltimoTemaCat8->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                </div>
                <div class="col-md-9">
                  <span style="color: white;font-size: 10px;"><a href="https://undermu.com/tema?id={{$ultimoTemaEnCategoria8->id}}">{{substr($ultimoTemaEnCategoria8->titulo,0,25)}}</a></span>
                  <br><small>By <span style="color: white">{{ $usuarioDelUltimoTemaCat8->memb_name}}</span> {{date_format($ultimoTemaEnCategoria8->created_at,"d/m/Y") }}</small>
                </div>
              </div>              
            </div>
            @endif
          </div>



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
                <p style="color: white;"><a href="https://undermu.com/tema?id={{$ultimo->id}}">{{$ultimo->titulo}}</a> 
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
              <p style="color: white;"> Reply by <strong>{{$ultimo->memb_name}}</strong>
              <br>on <a href="https://undermu.com/tema?id={{$tema->id}}">{{$tema->titulo}}</a> 
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

@endsection
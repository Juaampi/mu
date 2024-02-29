@extends('layouts.app')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('success'))
<script>swal("Perfecto!", "Haz actualizado tu imagen de perfil correctamente!", "success");</script>
@endif

<div class="container">
<div class="row" style="margin-top: 120px;">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-heading" style="background: #85b3f9; color:white;">
                <h4>{{$new->title}}</h4>
            </div>
            <div class="panel-body">
                <img src="img-news/{{$new->img}}" style="width: 100%;margin-bottom: 30px;">                
                {!! html_entity_decode($new->body) !!}
            </div>
            <div class="panel-footer">
                <p>Publicada: {{$new->created_at}}</p>
            </div>
        </div>

            <div class="panel">
                <div class="panel-body" style="background: whitesmoke">


             
                @if(!empty($coments))
                <h6 style="margin-top: 20px; font-size: 17px;margin-bottom: 20px;">Opiniones de usuarios</h6>
                @if(!auth::user())
                <p class="alert alert-info">Para comentar debes iniciar sesión como un usuario.</p>
                <p>Si tenés cuenta <a class="mt-2" href="/login" style="color: #3483fa;font-size: 14px;text-decoration: none;font-weight: 600">Ingresá</a>. Si todavía no tenés cuenta <a class="mt-2" href="/register" style="color: #c51928;font-size: 14px;text-decoration: none;font-weight: 600">Registrate</a>.</p>
    
                @endif
                @foreach($coments as $coment)
                @if($new->id == $coment->id_notice)  
                <div class="container" style="width: 100%;border-radius: 3px;padding: 20px;width: 100%;border-radius: 3px;padding: 20px;
                background: #e4e4e4;
                padding: 12px;
                border-radius: 4px;
            ">
                <div class="row">                                            
                        <div class="col-md-2" style="text-align: center">
                            @foreach($users as $guest)       
                                @if($coment->memb___id == $guest->memb___id)                                                   
                                <img class="img-fluid" style="height: 35px; border-radius: 35px" @if($guest->img) src="img-perfil/{{$guest->img}}" @else src="img-perfil/avatar.jpg" @endif alt="{{$guest->memb_name}}.jpg">
                                <h6 style="margin-top: 8px;font-size: 14px; font-weight: 600">{{$guest->memb_name}}  </h6>                             
                                @endif                               
                            @endforeach   
                           
                        </div>                                     
                        
                <div class="col-md-9" style="background: white;
                border-radius: 4px;@if($coment->positivo == 0)border-left: 2px solid #f36868 @else border-left: 2px solid #5dd65d @endif">                                                    
                    <h6 style="font-size: 15px;" class="text-muted"> {{$coment->comment}}</h6>
                    @if($coment->positivo == 1)
                    <span style="padding-bottom: 10px;"><span style="color: #5dd65d"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span></span>
                    @else
                    <span style="padding-bottom: 10px;"><span style="color: #f36868"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span></span>
                    @endif 
                    <span style="font-size: 12px; margin-bottom: -5px;margin-left: 5px;float: right;padding-bottom: 10px;" class="text-muted">@php echo date("d/m/Y",strtotime($coment->created_at))@endphp</span>
                </div>
                        
            
                </div>
                </div>
                <hr style="margin-bottom: 5px;margin-top: 5px;">
                @endif
                @endforeach
                @endif
                @if(Auth::user())            
                <div id="comentario">
                    <form action="{{route('comentadd')}}" method="GET" enctype="multipart/form-data">
                        <h6 style="margin-top: 20px; font-size: 17px;margin-bottom: 20px;">Comentá y puntuá</h6>
                    @if(session()->has('response'))
                    <div class="alert alert-success text-center">El comentario fue publicado correctamente.</div>
                    @endif
                    @if(session()->has('noresponse'))
                    <div class="alert alert-danger text-center">Ocurrió un error, por favor intenta nuevamente.</div>
                    @endif
                    <input type="hidden" name="id_notice" value="{{ $new->id }}">
                    <input type="hidden" name="memb___id" value="{{Auth::user()->memb___id }}">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-4">
                            <select name="positive" class="form-control mb-2">                        
                                <option value="1">Positivo</option>
                                <option value="false">Negativo</option>                        
                            </select>
                        </div>
                        <div class="col-md-6">
                            Indica si el comentario es positivo <i class="fa fa-thumbs-up" aria-hidden="true"></i> o negativo <i class="fa fa-thumbs-down" aria-hidden="true"></i>                            
                        </div>
                    </div>
                    <textarea style="margin-bottom: 20px;" name="coment" class="form-control mb-2" placeholder="Danos una opinión de la noticia, sea buena o mala."></textarea>
                    @php $bandera = 0; @endphp
                    
                    @foreach($coments as $coment)
                    @if($new->id == $coment->id_notice)  
                        @if($coment->memb___id == Auth::user()->memb___id)
                            @php $bandera = 1; @endphp
                        @endif
                        @endif
                    @endforeach
                        @if($bandera == 1)
                        <input disabled value="No puedes puntuar 2 veces!" type="submit"  class="btn btn-info">
                        @else
                        <input value="Enviar puntuación" type="submit"  class="btn btn-info">
                        @endif
                    </form>
                </div>
                @endif
                
            </div>    


        </div>
    </div>

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading" style="background: #85b3f9; color:white;">
                <h4>Todas las noticias</h4>
            </div>
            <div class="panel-body" style="width: 100%">
                <ul style="margin-left: 0px;padding-left: 0px;">
                @foreach($news as $newa)                       
                    <li style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                        <form method="GET"  class="news-btn"  action="/news"> 
                           <input type="hidden" value="{{$newa->id}}" name="newid">             
                           <i class="fa fa-star"></i><input type="submit" style="text-decoration: none; border: none; background:none;" value="{{$newa->subtitle}}">
                        </form>
                    </li>                
                @endforeach
            </ul>                    
            </div>            
        </div>
      

        </div>
    </div>
</div>
</div>
@endsection
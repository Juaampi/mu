@extends('layouts.app')

@section('content')

<script src="https://cdn.tiny.cloud/1/d8yvngezg453q9x9019n4iydfdz0vnawbbuhaek5l3qqbvdb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session()->has('successLike'))
<script>swal("Thank you!", "Your likes is success", "success");</script>
@endif

@if(session()->has('success'))
<script>swal("Perfect!", "Your REPLY is on the POST.", "success");</script>
@endif
@if(session()->has('error'))
<script>swal("Error!", "Reply is empty", "error");</script>
@endif

@php use App\Respuesta; @endphp
@php use App\Tema; @endphp
@php use App\User; @endphp
@php use App\Character; @endphp


<div style="background: #171717">
  <img src="img/forum-head.jpg" style="width: 100%">

<div class="row">
  <div class="container">
  <p style="margin-top: -80px;font-family:'Bowlby One SC', cursive;color:white;font-size:25px;">Foro personalizado de UnderMu Slow</p>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="container-fluid" style="color: white;">
    <div class="col-md-3">
      <div class="panel">
        <div class="panel-body text-center" style="background: #282727">
          @if($usuario->img)<img height="100px" width="100px" style="border-radius: 90px;" src="img-perfil/{{$usuario->img}}">@else <img height="100px" style="border-radius: 90px;" width="100px" src="img-perfil/avatar.jpg">@endif
          <p style="color: white;margin-top: 5px;"><strong>{{$usuario->memb_name}}</strong> @if($usuario->AccountLevel != 0)
            <span style="color: #ffffff;font-size: 11px;background: #ffd600;padding: 4px;font-weight: bold;border-radius: 3px;margin-left: 3px;">VIP</span>
            @endif </p>
            @php $temasCount = Tema::where('id_usuario', '=', $usuario->memb___id)->count();  
            $respuestas = Respuesta::where('id_tema', '=', $tema->id)->get();                
            @endphp
            @if($isadmin)
              <p style="color: red;
              font-weight: bold;">Admin</p>
            @endif
            @if($isgm)
              <p style="background: rgb(195, 195, 195);
              color: black;
              font-weight: bold;">Game Master</p>
            @endif          
            @php 

            $temas= Tema::where('id_usuario', '=', $usuario->memb___id)->get();
            $likesUser = 0;
            foreach($temas as $tema2){              
                $likesCount = DB::table('likes')->where('id_tema', '=', $tema2->id)->count();
                $likesUser = $likesUser + $likesCount; 
            }            
                      
          @endphp
          <p style="margin-bottom: 0px;">Country: <img src="img/flags/{{$usuario->country}}.gif"> </p> 
          <p > <span style="font-size: 14px;font-family: math;margin-right: 10px;padding: 3px; color: black;background: white; border-radius: 2px;" title="POST's"><i class="fa fa-comment"></i> {{$temasCount}} </span><span style="padding: 3px; color: white;background: #2c8c69; border-radius: 2px;font-size: 14px;font-family: math;" title="Thank's"><i class="fa fa-plus-circle"></i> {{$likesUser}}</span> </p>                                


          <span style="vertical-align: middle;color: #ffffff;background: #666666;padding: 10px;border-radius: 3px;font-size: 13px;">
            @if($likesUser <= 5)
              Bull Fighter <span style="background: #919191;padding: 3px;border-radius: 2px">{{$likesUser}}/5</span>
            @elseif($likesUser > 5 && $likesUser <= 15)  
              Elite Bull Fighter <span style="background: #919191;padding: 3px;border-radius: 2px">{{$likesUser}}/15</span>
            @elseif($likesUser > 15 && $likesUser <= 25)  
              Poison Bull Fighter <span style="background: #919191;padding: 3px;border-radius: 2px">{{$likesUser}}/25</span>
            @elseif($likesUser > 25 && $likesUser <= 35)  
              Skeleton <span style="background: #919191;padding: 3px;border-radius: 2px">{{$likesUser}}/35</span>
            @elseif($likesUser > 35 && $likesUser <= 50)  
            Skeleton Archer <span style="background: #919191;padding: 3px;border-radius: 2px">{{$likesUser}}/50</span>
            @elseif($likesUser > 50 && $likesUser <= 70)  
            Chief Skeleton Warrior <span style="background: #919191;padding: 3px;border-radius: 2px">{{$likesUser}}/70</span>
          @endif

          </span>


          @php 
            $personaje = Character::join('MasterSkillTree', 'Character.Name', '=', 'MasterSkillTree.Name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('AccountID', '=', $tema->id_usuario)->orderBy('MasterLevel', 'desc')->orderBy('cLevel', 'desc')->first();                
          @endphp
          <hr>
          <p style="margin-bottom: 0px;"> <img src="img/class/{{$personaje->Class}}.png" @if($personaje->ConnectStat == 0) style="height: 35px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 35px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
             {{$personaje->Name}}</p>
            
          </p>
        </div>
      </div>

    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="panel">
          <div class="panel-heading" style="color: #bab8b8;background: #282727;">
            <h3><strong>{{$tema->titulo}}</strong>
             
              @if(Auth::user())
              @if($tema->id_usuario == Auth::user()->memb___id)
              <small> 
                <a style="float: right;" href="/editartemaredirect?id={{$tema->id}}" >editar tema </a></small></h3>
              @endif
              @endif
          </div>          
          <div class="panel-body" style="background: #1f1e1e">
            {!! html_entity_decode($tema->contenido) !!}
            
            @if($tema->id_categoria == 6)
                @php 
                  $personaje = Character::join('MasterSkillTree', 'Character.Name', '=', 'MasterSkillTree.Name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('AccountID', '=', $tema->id_usuario)->orderBy('MasterLevel', 'desc')->orderBy('cLevel', 'desc')->first();                
                @endphp
                <div class="row">
                  <div class="col-md-offset-4 col-md-4">
                                    
                      <div class="panel">
                        <div class="panel-heading" style="color: black">
                          Personaje Principal 
                        </div>
                        <div class="panel-body text-center" style="background: #282727">
                          <img src="img/class/{{$personaje->Class}}.png" @if($personaje->ConnectStat == 0) style="height: 60px;border: 2px solid #a2a2a273; border-radius: 40px;" @else style="height: 60px;border: 2px solid #30ef00; border-radius: 40px;" @endif>
                          <p style="color: white;margin-top: 5px;"><strong>{{$personaje->Name}}</strong>                             
                           <p style="color: white;margin-top: 5px;"><strong>Level {{$personaje->cLevel}}</strong>
                           <p style="color: white;margin-top: 5px;"><strong>Master Level @if($personaje->MasterLevel){{$personaje->MasterLevel}}@else 0 @endif</strong>                             </p>
                        
                        </div>
                      </div>                                                    
                  </div>
                </div>                
                
            @endif
         </div>
         <div class="panel-footer" style="background: #171717">
          <div class="row">
          @php 
            $likes = DB::table('likes')->where('id_tema', '=', $tema->id)->count();
            $likes2 = DB::table('likes')->where('id_tema', '=', $tema->id)->get();
          @endphp
          @if($likes > 0) 
                <p><span style="margin-top: 10px;
                background: #85b3f9;
                width: 100px;
                font-size: 17px;
                border-radius: 2px;
                margin-left: 10px;
                padding: 10px;
                margin-bottom: 10px;"><strong>{{$likes}}</strong> Like @if($likes > 1)'s @endif</span> 
                  @foreach($likes2 as $like)
                    @php $userslike = DB::table('memb_info')->where('memb___id', '=', $like->id_usuario)->first(); @endphp                      
                     {{$userslike->memb_name}},                                       
                  @endforeach
                </p>

          @else
                <p style="margin-left: 10px;">Dont have any like.</p>
          @endif
          @if(Auth::user())
          @if($tema->id_usuario != Auth::user()->memb___id) 
          @php $likesAuth = DB::table('likes')->where('id_tema', '=', $tema->id)->where('id_usuario', '=', Auth::user()->memb___id)->count(); @endphp

          @if($likesAuth == 0)
            <form action="{{route('like')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}             
              <input type="hidden" name="id_usuario" value="{{Auth::user()->memb___id}}">
              <input type="hidden" name="id_tema" value="{{$tema->id}}">
              <input type="submit" style="margin-left: 10px;
              margin-top: 10px;background:#85b3f9 " class="btn btn-info" value="I like this post">
            </form>
            @endif
            @endif
            @endif
        </div>
         </div>
      </div>
  
      </div>

          @foreach($respuestas as $respuesta)
          @php 
          $userRespuesta = User::where('memb___id', '=', $respuesta->id_usuario)->first();
          @endphp
          <div class="row">
            <div class="panel">
              <div class="panel-heading" style="color: #bab8b8;background: #282727;">            
                <small><strong>{{$respuesta->created_at}}</strong></small>
              </div>          
              <div class="panel-body" style="background: #1f1e1e">
                <div class="row">
                  <div class="col-md-2 text-center">

                    @if($userRespuesta->img)<img height="40px" width="40px" style="border-radius: 90px;" src="img-perfil/{{$userRespuesta->img}}">@else <img height="40px" style="border-radius: 90px;" width="40px" src="img-perfil/avatar.jpg">@endif
                    <p><strong>{{$userRespuesta->memb_name}}</strong></p>                    
                  </div>
                  <div class="col-md-9">
                    {!! html_entity_decode($respuesta->contenido) !!}
                  </div>
              
            </div>
          </div>

          </div>
          </div>
          @endforeach
          @if(Auth::user())
          <div class="row">
            
            <p>Añadir Respuesta</p>

            <form action="{{route('addrespuesta')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}             
              <input type="hidden" name="id_usuario" value="{{Auth::user()->memb___id}}">
              <input type="hidden" name="id_tema" value="{{$tema->id}}">
              <textarea type="text" class="form-control" name="contenido"></textarea>
              <input type="submit" class="btn btn-primary" value="Enviar respuesta">
              </form>
          </div>
          @endif

</div>
  </div>
</div>



<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
  });
</script>


<link rel="stylesheet" href="https://mudream.online/_next/static/css/d8599bfc4de60f9d.css">

<div class="TabsBlock_tabs-wrapper__cdG0D TabsBlock_full-width__M_H9e"><div class="Flex_flex__CZxlW NativeScrollBar_scroll__C_0WP TabsBlock_tabs-list__jb14O NativeScrollBar_hidden__YDHpR Flex_a-center__RLlU_ Flex_j-row-nowrap__QRCmH"><div class="TabsBlock_tab__QEKCx TabsBlock_active__UbyrG"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Dark Wizard" src="/assets/class_images/avatars/dw.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Dark Wizard</span></div></span></div><div class="TabsBlock_tab__QEKCx"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Blade Knight" src="/assets/class_images/avatars/bk.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Blade Knight</span></div></span></div><div class="TabsBlock_tab__QEKCx"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Fairy Elf" src="/assets/class_images/avatars/elf.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Fairy Elf</span></div></span></div><div class="TabsBlock_tab__QEKCx"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Magic Gladiator" src="/assets/class_images/avatars/mg.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Magic Gladiator</span></div></span></div><div class="TabsBlock_tab__QEKCx"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Dark Lord" src="/assets/class_images/avatars/dl.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Dark Lord</span></div></span></div><div class="TabsBlock_tab__QEKCx"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Summoner" src="/assets/class_images/avatars/sum.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Summoner</span></div></span></div><div class="TabsBlock_tab__QEKCx"><span><div class="ClassAvatar_avatar__CSqxt"><img alt="Rage Fighter" src="/assets/class_images/avatars/rf.png" class="ClassAvatar_avatar-img__xOw40"><span class="ClassAvatar_name__UrNQQ">Rage Fighter</span></div></span></div></div><div class="TabsBlock_tab-content-block__vMc7e LandingNewBlocks_items-sets-block__cm2G9"><div class="Flex_flex__CZxlW LandingNewBlocks_sets-list-wrap__2Eiq6 Flex_a-center__RLlU_ Flex_j-center__HOvtq Flex_f-row-wrap__iUJ5x"><div class="Flex_flex__CZxlW LandingNewBlocks_set-block-wrap__owZyK Flex_inline__RLUAr Flex_a-center__RLlU_ Flex_j-center__HOvtq Flex_f-col-nowrap__T_dFO"><img src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/sets/dw/VenomMistset.gif" alt="Venom Mist" class="LandingNewBlocks_set-img__KU9YZ"><div class="Flex_flex__CZxlW Flex_inline__RLUAr Flex_large-gap__ndytp Flex_f-col-nowrap__T_dFO"><div class="Flex_flex__CZxlW Flex_a-center__RLlU_ Flex_j-center__HOvtq Flex_f-row-wrap__iUJ5x"><div class="LandingNewBlocks_set-item-block__9SnUW"><div class="Item_item__Y2fE9"><img alt="Venom Mist Helm" src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/items_seasons/6/7/30.webp" class="Item_simple-img__DTC6S"></div></div><div class="LandingNewBlocks_set-item-block__9SnUW"><div class="Item_item__Y2fE9"><img alt="Venom Mist Armor" src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/items_seasons/6/8/30.webp" class="Item_simple-img__DTC6S"></div></div><div class="LandingNewBlocks_set-item-block__9SnUW"><div class="Item_item__Y2fE9"><img alt="Venom Mist Pants" src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/items_seasons/6/9/30.webp" class="Item_simple-img__DTC6S"></div></div><div class="LandingNewBlocks_set-item-block__9SnUW"><div class="Item_item__Y2fE9"><img alt="Venom Mist Gloves" src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/items_seasons/6/10/30.webp" class="Item_simple-img__DTC6S"></div></div><div class="LandingNewBlocks_set-item-block__9SnUW"><div class="Item_item__Y2fE9"><img alt="Venom Mist Boots" src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/items_seasons/6/11/30.webp" class="Item_simple-img__DTC6S"></div></div><div class="LandingNewBlocks_set-item-block__9SnUW"><div class="Item_item__Y2fE9"><img alt="Grand Viper Staff" src="https://dreamassets.fra1.cdn.digitaloceanspaces.com/items_seasons/6/5/12.webp" class="Item_simple-img__DTC6S"></div></div></div></div></div></div></div></div>

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UnderMu Temporada 2</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
  .poppins-black {
  font-family: "Poppins", sans-serif;
  font-weight: 900;
  font-style: normal;
}
    </style>
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body >
  


<style>
.row-personaje {
    transition: transform 0.3s ease-in-out;
}

.row-personaje:hover {
    transform: scale(1.05);

  }

  .panel-personaje {
    transition: transform 0.3s ease-in-out;
}

.panel-personaje:hover {
    transform: scale(1.05);

  }
</style>

  <div class="row" style="position: fixed;
    bottom: 0%;
    left: 5%;
    z-index: 9999;
" >			
			<a target="_blank" href="https://chat.whatsapp.com/CpqIuFaQGBX2aN7cqQ3MRW" style="padding: 8px;border-radius: 70px;width: 65px;">
			<img src="img/wpp.png" style="height: 110px;">
			</a>
		</div>	
    <div id="app" style="background: #cccccc">
        <nav class="navbar navbar-default navbar-static-top fixed-top" style="margin-bottom: 0px;position: fixed;width: 100%;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->                    
                    <a class="navbar-brand" href="{{ url('/') }}" style="margin-top: -5px;font-family:'Bowlby One SC', cursive;color:#85b3f9;font-size:25px;">                      
                      <p> <img src="img/logo.png" style="height: 40px;"> UnderMu </p>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        
                          @php 
                              if(Auth::user()){
                                $sinver = DB::table('respuestavista')->where('id_usuario', '=', Auth::user()->memb___id)->where('visto' , '=', false)->get();
                              }else{
                                $sinver = DB::table('respuestavista')->where('id_usuario', '=', "alfredJhonson")->get();
                              }
                          @endphp
                        
                        <li>
                          @if($sinver->count() > 0)                              
                            <a data-toggle="modal" data-target="#notificaciones"><i class="fa fa-server" aria-hidden="true"></i> 
                          Forum 
                          <small><span class="badge badge-danger" style="background: red; border-radius: 2px;"> {{$sinver->count()}}</span></small>
                            </a>  
                                             

                          @else
                             <a href="/foro"><i class="fa fa-server" aria-hidden="true"></i> 
                          Forum      
                          </a>                         
                            @endif
                          </li>
                        <li><a href="/news"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a></li>
                        <li role="presentation" class="dropdown">  <a  data-toggle="modal" data-target="#myModal" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-id-card"></i> Rankings <span class="caret"></span></a>                           
                        </li> 
                        <li><a href="/information"><i class="fa fa-info" aria-hidden="true"></i> Info</a></li>                        
                        <li><a href="/rules"><i class="fa fa-book" aria-hidden="true"></i> Rules</a></li>                        
                        <li><a href="/downloads"><i class="fa fa-cloud-download" aria-hidden="true"></i> Downloads</a></li>                        
                        @if (Auth::guest())
                        <li><a href="{{ url('/register') }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Register</a></li>
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @if(Auth::user()->img)<img height="30px" width="30px" style="border-radius: 90px" src="img-perfil/{{Auth::user()->img}}">@else <img height="30px" style="border-radius: 90px" width="30px" src="img-perfil/avatar.jpg">@endif {{ Auth::user()->memb_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <li ><a href="/dashboard" style="padding: 10px;" ><i class="fa fa-cog" aria-hidden="true"></i> Dashboard </a></li>
                                <hr style="margin: 5px;">
                                    <li >
                                        <a style="padding: 10px;" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

      

                @yield('content')              
       
    @if($sinver)
                <div id="notificaciones" class="modal fade" role="dialog">
                            <div class="modal-dialog">                                                                                                      
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Notificaciones</strong></h4>
                                                                  </div>
                                  
                                
                                
                                <div class="modal-body">
                                  @foreach($sinver as $sin)                                    
                                    @php $temas = DB::table('temas')->where('id', '=', $sin->id_tema)->get(); 
                                    @endphp
                                    @foreach($temas as $tema) 
                                      <p>Te respondieron el tema <a href="/tema?id={{$tema->id}}">{{$tema->titulo}}</a>
                                    @endforeach
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                @endif


    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Qué ranking deseas ver?</h4>
      </div>
      <div class="modal-body" style="background: #f5f5f5">        
                                <p style="text-align: center; margin-top: 20px;margin-bottom: 20px; font-weight: bold;">Personajes</p>                         
                                <hr style="margin: 0px;">
                                <a href="/eternal" class="btn-rank" style="color: #378db5;padding:10px;display:block;">UNDERMU  <img src="img/logo.png" style="height: 30px; float:right;"></a>
                                <hr style="margin: 0px;">
                                <a href="/ranking" class="btn-rank" style="color: #484747;padding:10px;display:block;">General <img src="img/general.png" style="height: 35px; float:right;margin-right: -7px;margin-top: -8px;"> </a>
                                <hr style="margin: 0px;">
                                <a href="/duels" class="btn-rank" style="color: #484747;padding:10px;display:block;">Duelos <img src="img/duelo.png" style="height: 35px; float:right;margin-right: -8px;margin-top: -8px;"></a>
                                <hr style="margin: 0px;">
                                <a href="/guilds" class="btn-rank" style="color: #484747;padding:10px;display:block;">Guilds <img src="img/clan.png" style="height: 25px; float:right;margin-right: -2px"></a>
                                <hr style="margin: 0px;">                                
                                <p style="text-align: center;font-weight: bold;margin-top: 20px;margin-bottom: 20px;">Eventos</p>
                                <hr style="margin: 0px;">                                
                                <a href="/bloodcastle" class="btn-rank" style="color: #484747;padding:10px;display:block;">Blood Castle</a>
                                <hr style="margin: 0px;">
                                <a href="/devilsquare" class="btn-rank" style="color: #484747;padding:10px;display:block;">Devil Square</a>
                                <hr style="margin: 0px;">
                                <a href="/chaoscastle" class="btn-rank" style="color: #484747;padding:10px;display:block;">Chaos Castle</a>
                                <hr style="margin: 0px;">                                
                            </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<div id="best-modal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 600px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Cómo aparecer aquí?</h4>
      </div>
      <div class="modal-body" style="background: #f5f5f5">        
            <h4>KILLER <img src="img/espada.png"></h4>
            <p>To be the killer of UnderMu you must be the player with the highest number of Murders. (The sum of custom events, in-game events, duels, and common kills.)</p>
            <p>Para ser el aniquilador de UnderMu deberás ser el jugador con mayor cantidad de Asesinatos. (La suma entre eventos personalizados, eventos del juego, duelos y asesinatos comunes).</p>            
            <small style="color: #84b3ff">Daily updated</small>
            <hr>
            <h4>LEGENDARY <img src="img/legend.png"></h4>
            <p>To remain in the legend position, you must be the player with the most levels. (Sum between Levels and Master Levels).</p>
            <p>Para permanecer en el puesto de leyenda, debes ser el jugador con mas niveles. (Suma entre Levels y Master Levels). </p>
            
            <small style="color:#84b3ff">Daily updated</small>
            <hr>
            <h4>VICIUS <img src="img/horas.png"></h4>
            <p>He is the character with the most ONLINE hours accumulated in the game.</p>
            <p>Es el personaje que más horas ONLINE tenga acumuladas en el juego.</p>
            <small style="color:#84b3ff">Daily updated</small>
            <hr>
            <h4>UNDERMU  <img style=" height: 24px;" src="img/logo.png"></h4>
            <p>The UNDERMU ranking system is the result of a mathematical combination between different events, murders and/or some personal issues on the server.</p>
            <p>El sistema de rankings UNDERMU, es el resultante de una combinación matemática entre los distintos eventos, asesinatos y/o algunas cuestiones personales del servidor. </p>
            <small style="color:#84b3ff">Weekly updated</small>
            <hr>
            <h4>HERO <img src="img/hero.png"></h4>
            <p>The character with the most PK (Assassins) eliminated, since we consider it important that someone takes care of the assassins, in addition to the guards.</p>
            <p>El personaje con que más PK(Asesinos) eliminó, ya que consideramos importante, que alguien se encargue de los asesinos, además de los guardias.</p>            
            <small style="color:#84b3ff">Weekly updated</small>
            <h4>MURDERER  <img src="img/murder.png"></h4>
            <p>The character with the most duels won, only those with different IP/HardwareID are counted to ensure that they do not duel each other.</p>
            <p>El personaje con más duelos ganados, sólo se cuentan los que son con distinta IP/HardwareID para controlar que no se hagan duelos entre si mismos.</p>            
            <small style="color:#84b3ff">Weekly updated</small>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<div id="info-eternal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Qué es el ranking UNDERMU?</h4>
      </div>
      <div class="modal-body" style="background: #f5f5f5">     
        <p>The UNDERMU ranking system is the result of a mathematical combination of various events, killings, and/or some personal issues on the server.</p>
<p>The purpose of this system is to give more importance to characters who truly play and experience the server to the fullest. For our staff, the best player should be the one who plays the most, not the one who levels up the most.</p>
<p><strong>How do I appear in the ranking?</strong></p>
<p>To appear in the ranking, your UNDERMU Points must be positive. In case of having negative UNDERMU Points, you must strive to remain in the ranking.</p>
<p><strong>What do I gain by being in the ranking?</strong></p>
<p>In addition to having the prestige of being in the top 1 of this ranking, the top 10 characters who remain at the top of the ranking will receive weekly prizes and remain on the server's homepage.</p>
<p><strong>How are points calculated?</strong></p>
<p>The total UNDERMU points are the sum of all events, divided by 1000. Additionally, duel victories are multiplied by 100, and losses are multiplied by 1000 (the same applies to Team vs. Team). This means that if you win a duel, you gain 100 points, and if you lose, you lose 1000. The score will be displayed in your control panel for each character.</p>

<hr>


            <p>El sistema de rankings UNDERMU, es el resultante de una combinación matemática entre los distintos eventos, asesinatos y/o algunas cuestiones personales del servidor. </p>
            <p>Lo que se busca con éste sistema, es darle más importancia a los personajes que realmente juegan y experimentan el servidor al máximo, y para nuestro staff el mejor jugador debe ser el que más juega, y no, el que más levelea. </p>
            <p><strong>¿Cómo aparezco en el ranking?</strong></p>            
            <p>Para aparecer en el ranking, los Puntos UNDERMU deberán ser positivos. En el caso de tener Puntos UNDERMU negativos, deberán esforzarce para poder permanecer en ranking. </p>
            <p><strong>¿Qué gano con estar en el ranking?</strong></p>    
            <p>Además de tener el prestigio de que el top 1 de éste ranking, permanecerá en la portada del servidor, semanalmente se darán premios a los primeros 10 personajes que se mantengan en la sima del ranking</p>        
            <p><strong>¿Cómo es la suma de los puntos?</strong></p>
            <p>El total de los puntos UNDERMU es la suma de todos los eventos, dividido 1000. A su vez se le suman las victorias en duelos x100 y se le restan las derrotas x1000 (Lo mismo en el Team vs Team). Es decir, que si ganas un duelo sumas 100 puntos y si perdes restas 1000. El puntaje se encontrará en tu panel de control por cada personaje. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>




    <footer class="page-footer font-small blue pt-4" style="padding: 20px;">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2024 Copyright - 
  <a href="https://undermu.com/"> https://undermu.com</a>
</div>
<!-- Copyright -->

</footer>

</div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script>
    var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 5000,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
})



var mySwiper2 = new Swiper('.swiper-container2', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 10000,
  },
  slidesPerView: 3,
  spaceBetween: 8,
  // If we need pagination 
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

var mySwiper3 = new Swiper('.swiper-container3', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 10000,
  },
  slidesPerView: 2,
  spaceBetween: 8,
  // If we need pagination 
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

var mySwiper4 = new Swiper('.swiper-container4', {
  // Optional parameters
  direction: 'vertical',
  loop: true,
  autoplay: {
    delay: 10000,
  },
  slidesPerView: 2,  
  slidesPerColumnFill: 'row',
  // If we need pagination 
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});


    </script>
    
<!-- Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/65eb0b888d261e1b5f6a89ac/1hof2a3hr';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!-- End of Tawk.to Script-->

</body>
</html>

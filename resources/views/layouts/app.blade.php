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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body >
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
                      <p> <img src="img/logo.png" style="height: 40px;"> UnderMu Online </p>
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
                        <li><a href="/news"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Noticias</a></li>
                        <li role="presentation" class="dropdown">  <a  data-toggle="modal" data-target="#myModal" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-id-card"></i> Rankings <span class="caret"></span></a>                           
                        </li> 
                        <li><a href="/information"><i class="fa fa-info" aria-hidden="true"></i> Información</a></li>                        
                        <li><a href="/rules"><i class="fa fa-book" aria-hidden="true"></i> Reglamento</a></li>                        
                        <li><a href="/downloads"><i class="fa fa-cloud-download" aria-hidden="true"></i> Descargas</a></li>                        
                        @if (Auth::guest())
                        <li><a href="{{ url('/register') }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Registro</a></li>
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</a></li>                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @if(Auth::user()->img)<img height="30px" width="30px" style="border-radius: 90px" src="img-perfil/{{Auth::user()->img}}">@else <img height="30px" style="border-radius: 90px" width="30px" src="img-perfil/avatar.jpg">@endif {{ Auth::user()->memb_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <li ><a href="/dashboard" style="padding: 10px;" ><i class="fa fa-cog" aria-hidden="true"></i> Panel de control </a></li>
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
                                <a href="/eternal" class="btn-rank" style="color: #378db5;padding:10px;display:block;">Eternal  <img src="img/logo.png" style="height: 30px; float:right;"></a>
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
            <h4>Leyenda</h4>
            <p>Para permanecer en el puesto de leyenda, debes ser el jugador con mas niveles. (Suma entre Levels y Master Levels). </p>
            <small style="color: #84b3ff">Se actualiza a diario</small>
            <hr>
            <h4>Aniquilador</h4>
            <p>Para ser el aniquilador de UnderMu deberás ser el jugador con mayor cantidad de Asesinatos. (La suma entre eventos personalizados, eventos del juego, duelos y asesinatos comunes).</p>            
            <small style="color:#84b3ff">Se actualiza a diario</small>
            <hr>
            <h4>Millonario</h4>
            <p>El millonario del servidor es aquel personaje que tiene más zen en el inventario.</p>
            <small style="color:#84b3ff">Se actualiza a diario</small>
            <hr>
            <h4>Duelista</h4>
            <p>Es el que, cuando se sume victorias y derrotas, de el valor más alto. (Si el sistema de duelos da negativo y es el máximo resultado de todas maneras se mostrará el máximo, sea -2 o 3).</p>
            <small style="color:#84b3ff">Se actualiza a semanalmente</small>
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
        <h4 class="modal-title">¿Qué es el ranking eternal?</h4>
      </div>
      <div class="modal-body" style="background: #f5f5f5">        
            <p>El sistema de rankings eternal, es el resultante de una combinación matemática entre los distintos eventos, asesinatos y/o algunas cuestiones personales del servidor. </p>
            <p>Lo que se busca con éste sistema, es darle más importancia a los personajes que realmente juegan y experimentan el servidor al máximo, y para nuestro staff el mejor jugador debe ser el que más juega, y no, el que más levelea. </p>
            <p><strong>¿Cómo aparezco en el ranking?</strong></p>            
            <p>Para aparecer en el ranking, los Puntos Eternal deberán ser positivos. En el caso de tener Puntos Eternal negativos, deberán esforzarce para poder permanecer en ranking. </p>
            <p><strong>¿Qué gano con estar en el ranking?</strong></p>    
            <p>Además de tener el prestigio de que el top 1 de éste ranking, permanecerá en la portada del servidor, semanalmente se darán premios a los primeros 10 personajes que se mantengan en la sima del ranking</p>        
            <p><strong>¿Cómo es la suma de los puntos?</strong></p>
            <p>El total de los puntos eternal es la suma de todos los eventos, dividido 1000. A su vez se le suman las victorias en duelos x100 y se le restan las derrotas x1000 (Lo mismo en el Team vs Team). Es decir, que si ganas un duelo sumas 100 puntos y si perdes restas 1000. El puntaje se encontrará en tu panel de control por cada personaje. </p>
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
    </script>

</body>
</html>

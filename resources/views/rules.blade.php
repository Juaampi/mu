@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row" style="margin-top: 70px;">    
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading" style="background: #85b3f9">
                <h3 style="color: white; font-weight: bold">Reglamento del servidor <span class="label" style="background: #5885d6;font-size: 10px;">Fijada <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                </span></h3>
            </div>
            <div class="panel-body"> 
                <section>
                    <div class="container" style="width: 100%">
                      <div class="heading" style="text-align: center">
                        <i style="font-size: 40px;color: #85b3f9" class="fa fa-file-text-o" style="" aria-hidden="true"></i>
                        <h2>Términos &amp; Condiciones</h2>
                        <p><b>Mu Online Server</b> es un juego online gratuito, que tiene como objetivo brindar entretenimiento a sus jugadores. Por favor, respeta las reglas para que podamos llevar una comunidad organizada, transparente y segura.</p>
                      </div>
                    <blockquote class="blockquote" style="background: #f9f9f9;">
                        <p style="text-align:center"><i>“El desconocimiento de las reglas, no exime de culpas a nadie”</i></p>
                      </blockquote>
                      <p style="text-align:center">Todos los usuarios tienen los mismos derechos y obligaciones, y se les aplica a todos por igual. En el caso de infringir las normas, será sancionado según corresponda la gravedad y los antecedentes del jugador. A continuación se exponen, de manera detallada, las normas/condiciones que deberá leer, aceptar y respetar para permanecer en nuestra comunidad.</p>
                  
                      
                  <h3 class="m-b-20">Post</h3>
                  <ul>
                  <li><b>．</b>No se permite hacer spam. La sancion parte segun antecedentes de <b>(id, name pj, ip, etc.)</b> y la gravedad del spam realizado.</li>
                  <li><b>．</b>Se permite usar el <b>/post</b> para comercio, party, guild, war, consultas, etc.</li>
                  <li><b>．</b>Evitar el uso del post como chat de conversación.</li>
                  </ul>
                  <p></p><h5 class="text-danger">Penalización: Suspención temporal del <b>/post o chat</b>, y si fuera necesario, de los personajes relacionados.</h5>
                  <hr>
                      
                  <h3 class="m-b-20">Trampas</h3>
                  <ul>
                  <li><b>．</b>No se permite el uso de <b>cheats/hacks</b> de ningún tipo <b>NI NINGUN TIPO DE MACROS</b>. La sancion es necesario video incriminatorio y parte segun antecedentes de (id, name pj, ip, etc.) y la gravedad del hack y/o etc, usado.</li>
                  <li><b>．</b>No está permitido abusar de bugs/errores del juego. La sancion parte segun antecedentes de <b>(id, name pj, ip, etc.)</b> y la gravedad del mismo.</li>
                  <li><b>．</b>En caso de saber sobre algún hack, cheat, bug o dup deberá reportar información al staff.</li>
                  
                  </ul>
                  <p></p><h5 class="text-danger">Penalización: Suspención permanente de la PC y/o cuenta, y si fuera necesario, de las PC y/o cuentas relacionadas.</h5>
                      
                  <hr>
                  <h3 class="m-b-20">Guilds</h3>
                  <ul>
                  <li><b>．</b>No se permiten las guilds mulas (Ejemplo: utilizar otra guild mula o fake, para conseguir score facil). La sancion parte segun antecedentes de <b>(id, name pj, ip, etc.)</b> y la gravedad del caso realizado.</li>
                  <li><b>．</b>Toda guild inactiva será eliminada.</li>
                  <li><b>．</b>Se permite una sola alianza por guild.</li>
                  <li><b>．</b>Se requiere de nivel 200 para crear un guild.</li>
                  <li><b>．</b>No se pueden crear guilds con nombres iguales o parecidos al del staff.</li>
                  <li><b>．</b>Se permiten un máximo de 20 miembros por guild sin importar la raza del master.</li>
                  </ul>
                  <p></p><h5 class="text-danger">Penalización: Supresión de la guild, y si fuera necesario, suspensión temporal o permantente de las cuentas relacionadas.</h5>
                      
                  <hr>
                  <h3 class="m-b-20">Donaciones</h3>
                  <ul>
                  <li><b>．</b>Jugar en MU Online PvP es totalmente GRATIS. Jamás te cobraremos por descargar el juego, ni por registrar una cuenta, ni por jugar. La adquisición de WCoins a través de donaciones es a absoluta elección de cada uno de los jugadores. Al realizar una donación NO le estás COMPRANDO a MU Online Server , NI MU Online Server te está VENDIENDO. TAMPOCO ESTÁS PAGANDO por un servicio. ÉSTAS APORTANDO DE MANERA VOLUNTARIA Y LIBRE al mantenimiento de una comunidad (MU Online Server) por los siguientes años.</li>
                  <li><b>．</b>Los valores abonados son en calidad de donación para el mantenimiento de los servidores, gastos de alojamiento, foro, modulos webs, herramientas de desarrollo, sistemas de seguridad, compra y costos mensuales de licencias. Bajo ninguna circunstancia serán ni podrán ser reembolsados.</li>
                  <li><b>．</b> No se repondrán (bajo ningúna circunstancia) los ítems obtenidos mediante donaciones que se hayan vendido en las tiendas del servidor, perdidos a la hora de resetear, en desconexiones o sustraídos de la cuenta por terceros. El cuidado de éstos items, junto con la cuenta en su totalidad, es pura responsabilidad de cada jugador.</li>                  
                  <li><b>．</b> Cada jugador es responsable del uso de sus WCoins. MU Online Server no se hará responsable de una mala elección/edición de items a la hora de realizar una compra en la Webshop, obtención de membresías, cambio de nombre de personaje, compra en Tiendas Personales, etc.</li>
                  <li><b>．</b> Las WCoins no son transferibles ni pueden ser repartidas entre dos o más cuentas. Tampoco pueden transferirse de un servidor a otro.</li>
                  <li><b>．</b> La demora de entrega de WCoins puede ser de hasta 24hs (hábiles), dependiendo siempre del medio de pago que se utilice. Nunca hagas un reclamo antes de las 24 horas (hábiles). Sé paciente y respeta los tiempos establecidos.</li>
                  <li><b>．</b> Las PROMOCIONES son siempre a modo sorpresa, y se anuncian en la web. Tienen una fecha de lanzamiento y una fecha de vencimiento. Solo gozarán del bonus promocional aquellas donaciones que hayan sido acreditadas (figuren como "cobradas") dentro del periodo de duración de la promoción, sin excepciones.</li>
                  <li><b>．</b> Realizar una donación no te dá lugar a infringir nuestras normas o pedir tratos especiales respecto a los demás jugadores.</li>
                  <li><b>．</b> El jugador deberá conocer la utilidad de las monedas del juego (WCoins). En ningún caso el STAFF realizará conversiones ni reintegros por una mala elección a la hora de realizar una donación por cualquiera de ellas.</li>
                  <li><b>．</b> MU Online Server pone a disposición del usuario la posibilidad de realizar donaciones utilizando plataformas de pagos de terceros (empresas tales como CuentaDigital, PayU, PayPal, MercadoPago, etc). MU Online Server JAMÁS recibirá dinero de forma directa. El dinero de las donaciones NO lo recibirá MU Online Server, sino las plataformas antes mencionadas. El control de cobros y pagos NO los maneja MU Online Server, sino las plataformas antes mencionadas. MU Online Server no podrá ser responsable ante una eventual falla en cualquiera de éstas plataformas.</li>
                  <li><b>．</b> Las donaciones se generan a través de plataformas de pago, las cuales gestionan las pasarelas de pago. Toda información ingresada en cada una de esas pasarelas, no es información que será almacenada en MU Online Server bajo ninguna circustancia. Por tal motivo, MU Online Server no podrá ser responsable ante un mal uso de esos datos ingresados en sistemas externos.</li>
                  <li><b>．</b> Al efectuar tus donaciones estás aceptando todos éstos puntos en los Términos y Condiciones. </li>
                  </ul>
                  <p></p><h5 class="text-danger">Penalización: Suspención permanente de la PC, cuenta, personaje, IP y si fuera necesario, de las personas relacionadas.</h5>
                      
                  <hr>
                  <h3 class="m-b-20">Atribuciones</h3>
                  <ul>
                  <li><b>．</b>No exigirá privilegios al staff.</li>
                  <li><b>．</b>No engañará a otros usuarios haciéndose pasar por amigo, familiar, pariente o conocido del staff.</li>
                  <li><b>．</b>No se hará pasar por Game Master, ni Administrador.</li>
                  <li><b>．</b>Podrá organizar eventos y/o premios propios de usted pero el staff no responde por malos entendidos.</li>
                  </ul>
                  <p></p><h5 class="text-danger">Penalización: Suspención permanente o temporal de la cuenta, y si fuera necesario, de las cuentas relacionadas.</h5>
                      
                  <hr>
                  <h3 class="m-b-20">Insultos</h3>
                  <ul>
                  <li><b>．</b>En este servidor no se banea a los jugadores por insultar.</li>
                  <li><b>．</b>El staff prefiere invertir tiempo en mejoras, arreglos para el juego que en estar baneando gente por insultos.</li>
                  <li><b>．</b>Cualquier insulto enviado por <b>/post</b> será penalizado con <b>/banpost o /banchat</b> dependiendo de los antecedentes del infractor.</li>
                  </ul>
                  <p></p><h5 class="text-danger">Penalización: Advertencia o suspención temporal del post o chat, y si fuera necesario, de los personajes relacionados.</h5>
                      
                  <hr>
                  <h3 class="m-b-20">Recuperación</h3>
                  <ul>
                  <li><b>．</b>Usará su propio email para registrarse, y este será el único modo de reconocerlo como dueño de una cuenta.</li>
                  <li><b>．</b>Use un email totalmente real y al que tenga acceso.</li>
                  <li><b>．</b>Si perdiera su email no podrá cambiar ni recuperar su clave o PIN.</li>
                  <li><b>．</b>Será su responsabilidad mantener los datos de sus cuentas en secreto.</li>
                  </ul>
                  <p></p><h5 class="text-danger">El staff no recupera ni modifica datos de las cuentas de forma manual a excepción de comprobar ser dueño con acceso completo.</h5>
                      
                  <hr>
                  <h3 class="m-b-20">Seguridad</h3>
                  <ul>
                  <li><b>．</b>No deberá compartir su PIN con absolutamente nadie.</li>
                  <li><b>．</b>Sin el PIN nadie podrá robar, borrar personajes, borrar clanes o salir de un clan, por más que preste su clave.</li>
                  <li><b>．</b>El PIN debe ser activado o desactivado solo por el dueño legítimo de la cuenta.</li>
                  <li><b>．</b>Si usted olvidó activar su PIN, prestó su cuenta y fue robado, el staff no responderá.</li>
                  </ul><br>
                  <h5 class="text-danger">RECUERDEN ALGO CLASICO Y MUY IMPORTANTE. </h5>
                  <h5 class="text-danger">NINGUN MIEMBRO DEL STAFF, NINGUNO, NADIE, NUNCA, JAMAS, precisa datos personales de tu cuenta, con nombre de personaje ya es suficiente para hacer TODO. </h5><br>                  
                  </section>
            </div>
            <div class="panel-footer">
                <p class="text-center"><strong>Actualizado:</strong> Ahora mismo </p>
            </div>    
        </div>
    </div>
</div>
</div>
@endsection
    
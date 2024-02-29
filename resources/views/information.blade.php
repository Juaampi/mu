@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row" style="margin-top: 70px;">    
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-heading" style="background: #85b3f9">
                <h3 style="color: white; font-weight: bold">Información del servidor <span class="label" style="background: #5885d6;font-size: 10px;">Fijada <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                </span></h3>
            </div>
            <div class="panel-body">                        
            
            <h5>La información de ésta sección es del servidor original. En la versión beta se harán algunas modificaciones con el fin de poder testear todos los eventos. <a href="#">Click aquí</a> para más información sobre la versión beta.</h5>
            <h6>Última actualización: <strong>26/02/2024</strong></h6>
            <div class="container-english" style="display:none;">
            <div class="list-group">                        
            <a id="btn-information" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Basic Information Server <span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                           
            <div class="container" id="information-container" style="display: none;padding: 15px;"><p style="margin-bottom: 0px;"><strong>Dynamic Exp [5-15x]</strong> - starts with very low exp and goes to higher exp as game progress.
            <p style="margin-top: 0px;"><small><strong>Note:</strong> Mobs on spots also gets higher as game progress.<br>
            <strong>Example:</strong> Low maps have 4 mobs on spots, high maps have 7-8 mobs on spots.</small></p>                    
            <p><strong>Master EXP: Dynamic 1-4x</strong> - with very low exp and goes to higher exp as game progress.</p>
            <p><strong>20% Drop</strong> - fully progressively configured</p>
            <p><strong>Gameplay:</strong> Non-Reset with 10 optional Resets.</p>
            <p><strong>Party Exp System</strong> (Alone = 100%, 2 Players = 97%, 3 Players = 94%, 4 Players = 103%, 5 Players = 106%, <br>Perfect Party = +3% exp).</p>
            <p><strong>All events working with nice rewards.</strong></p>
            <p><strong>Maximum 2 guilds in an alliance.</strong></p>                    
            <p><strong>Maximum 20 players in a guild for normal classes and maximum 25 players for DL-GM.</strong></p>
            <p><strong>Elf Soldier buff until level 200 (or higher with VIP).</strong></p>
            <p><strong>Maximum of 2 accounts on same IP/HWID.</strong></p>
            <p><strong>Shops for a low exp server.</strong></p>
            <p>Maximum of <strong>20 HP (Large)</strong> pots stack and <strong>30 Mana (Large)</strong> pots stack (for PvP and PvM experience).</p>
            <p><strong>Create Guild at level 150.</strong></p>
            <p><strong>Create DL, MG, RF at level 150 (or Level 1 with VIP).</strong></p>
            <p><strong>Reconnect system fully working.</strong></p>
            <p><strong>No Web-Shop, no Cash-Shop, only VIP System (without VIP Server) & Web-Credits for xShop(Cash Server).</p></strong>
            <p><strong>Helper from level 1.</p></strong>
        <p><strong>Party Exp Gap: 80 Levels.</strong></p>
            <p>Max Level to delete a Character: 200 (& 1 reset). To delete chars over level 200 or over 1 reset you need to contact us.</p>
            <p><strong>Max ADD on Items: 28.</strong></p>
        </div>
        
        <a id="btn-gameplay" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Game Play<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                           
        <div class="container" id="gameplay-container" style="display: none;padding: 15px;width: 100%">
        
            <h4><strong>Gameplay Info:</strong></h4>
            
            <p>MuServer Online is going to offer you a nice & unique experience with build-base, very interesting PvM and balanced PvP for all classes, that can satisfy any kind of player (passive, farmer, pvp-lover, afk-er, competitive, etc.).</p>
        
            <p>Once again, OldSquad is bringing another innovation into the MU Online scene, coming out with a brand new gameplay.</p>
            
            <p> PHOENIX concept was born from 'try-fail-learn' mistakes and also from your own feedbacks and needs.</p>
            <p>What's unique about PHOENIX? Well, EVERYONE will have a chance to compete, and the whole feeling of the server will please both low-exp/long-term lovers and also casuals/pvp-players that prefer to farm less and fight more, while having decent chances.</p>
            
            <p>Another innovation that can be found on Phoenix is the elimination of Energy Elves as we used to know them (a must-have-secondary-chars in order to progress/compete). That means, nobody will have to make a secondary EE now! This are the full changes related to them:</p>
            
            <p style="margin-bottom: 0px;">- Heal & SD Rec. skills are out of the game (you won't be able to find them anymore).</p>
            <p style="margin-bottom: 0px;">- Greater fortitude & Greater defense will only increase dmg/deff with 1 on Server1 (basically, useless).</p>
            <p style="margin-bottom: 0px;">- Ice Arrow now requires at least 300 energy in order to be used.</p>
            <p style="margin-bottom: 0px;">- Greater fortitude & Greater defense will have a decent power on Server20 (CS,Crywolf,LoT). But they are still nerfed to around 50% of their normal power from previous editions.</p>
            <p style="margin-bottom: 0px;">- All mobs/bosses will be adjusted in terms of damage & hp to match the new concept.</p>
            <p style="margin-bottom: 0px;">- Elves now have 3 different directions to build up:</p>
            <p style="margin-bottom: 0px;">1. Pure PvM build based on AGI+STR for max dps.</p>
            <p style="margin-bottom: 0px;">2. PvM-PvP build based on AGI+VIT.</p>
            <p> 3. PvM-Support build based on AGI+ENE with ice arrow as stun.</p>
            
            <p>There are 3 big gameplay "points" in PHOENIX, as it is a combination of Non-Reset server with a Max-Reset server:</p>
            
            <h4><strong>No-Reset Info:</strong></h4>
            
            <p>The first part of the server is the level 0-400 part. It is considered to be a semi-hard experience, a bit higher than the original NonReset, designed for everyone to be able to complete it in a decent amount of time in order to start competing (both casuals and hard-core players). The dynamic system plays it's role during this level 0-400, but in this server, instead of going up and down, it goes only from down to up (decrease -> increase) as game progress, in order to make it feel smooth at all the level stages (uniform progress instead of exponential progress).</p>
            
            <p>The Non-Reset part of the gameplay also includes 3 breaks (with some content being released with them). The breaks are from 260-280, 330-345 and 380-390.
            The breaks does have 25%/20%/15% from the usual exp of that level.
            The breaks needs 3 passers in order to be done (3 people to pass the level break). All 3 of them will be rewarded for the break-completion, and when the 3rd player finish the break, entire break-exp will be 70%/60%/50% from break exp, easier for the rest of players, until the next break completion, when the previous one will be removed.
            Example of break: If normal exp is, for example, 15.000 at level 259, when you enter break exp at 260, you will get only 25% of normal exp (which is 3.750 in this example).
            When first 3 players finish the break, the exp for the rest of server for that break will be 70%. That means the rest of players will get around 10.500 exp.</p>                                                                                                                    
            
            <p style="margin-bottom: 0px;">-Newbies EXP boost applied: Levels 1-99 now have a static exp that is the same rate as of level 100.</p>                                        
            
            <p><small>Note: It is now static at the rate of level 330 exp.</small></p>                                     
            
            <h4><strong>Some bonus Gameplay info:</strong></h4>
            
            <p>Quest 3 have low drops - it is hard - expect from few hours to few days to drop your items.</p>
            <p>ML can be done on any mobs over level 95 (default GMO).</p>
            <p>Resets cost starts from 300kk and goes up with 100kk each reset.</p>
            <p>Small wings are nerfed compared to what they show. Wings Level 1 are better than them.</p>
            <p>Swamp mobs are boosted in level compared to the rest of default mobs in order to offer the best ML exp from all maps.</p>
            <p>There is no reset stats on web! So be careful with how you add your points!</p>
            <p>You can only reset stats with reset fruits farmed ingame (from BoK+1, BoK+2, Old Box 1 & Old Box 2).</p>
            <p>A balanced Map System to make sure that each type of map (low,mid,high,very high) have all styles (gens,non-pvp,normal).</p>
            <p style="margin-bottom: 0px;"><strong>NON-PVP maps:</strong> Kalima1, Kalima2, Aida, Crywolf, Karutan2 and Kalima7 where you can only KS.</p>
            <p><small><strong>Note:</strong>NON-PVP maps have 100% exp and 25% drop.<br>
            <strong>Note:</strong> Crywolf is the only NON-PVP maps where Mercenaries can safely AFK.</small></p>
            <p>5 GENS maps: Atlans, Tarkan, Karutan1, Relics and Vulcanus.</p>
            <p>Gens Maps have +12% exp compared to non-gens maps.</p>
            <p>All other maps are 100% PVP, with free KS (no ban), free PK (no ban) that can also be improved with Mercenary Squad.</p>
            <p>PK clear is off, so if you want to PK you must also wait 20-60 minutes to clear and/or you must kill mobs.</p>
            <p>Swamp is a level 380+ map designed for Master Level, Medusa & Flame farm.</p>
            <p>Kalimas are populated!</p>
            <p>There is no ARENA (forget about leveling on the same place for 3 months, that's not how MU is supposed to be).</p>
            <p>Exp will be raised for lower levels anytime we consider (to encourage new players).</p>
             
            <p>This system will make the game more interesting and more skill/build-based (+long term) and also the entire balance of server (Economy, PvP, PvM,etc.) will be adjusted anytime.</p>
            <p>Also, the gap between top 30 characters and the rest of the server will be lower.</p>
            <p>Also, any person who wants to start after xx days from server start can recover easily (if he plays a lot).</p>
        </div>
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Reset System<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        <div class="container" id="resetsystem-container" style="display: none;padding: 15px;width: 100%">
        <h4><strong>Non-Reset System (Level 1-400):</strong></h4>
        
        <p>- Exp is Dynamic, but this time it's starting from very low and it goes up to higher values.</p>
        <p style="margin-bottom: 0px;">- The main objective of this move is to let you feel and progress through ALL MAPS.</p>
        <p style="margin-left: 20px;"><small><strong>Note:</strong> We've also reduced the number of mobs in maps, from lower numbers (4 mobs in spots) up to 7-8 mobs in spots.</small></p>
        <p>- On older system it was too easy to pass first levels and then too hard for the last ones.</p>
        <p style="margin-bottom: 0px;">- Now, thanks to the new system, it will be an uniform progression where the difficulty is decreasing as the game progresses.</p>
        <p style="margin-left: 20px;"><small>As a random example, instead of making 1 level in 2 minutes from level 60 to 61 and 1 level in 5 hours from level 390 to 391, you will make, for example, like 1 level in 6 minutes at 60 and 3.5 hours at 390.</small></p>
        <p>- Basically,  the exp difficulty is switched from higher levels to lower levels, and balanced at the intersection.</p>
        <p>- In this way you'll feel the game much better and everything that it can offer you at all the stages, not just passing blindly and then dying for some high levels.</p>
        <h5><strong>Exp System:</strong></h5>
        <p style="margin-left: 10px;color: #48d448; margin-bottom: 0px;"><strong>Level 1-259:</strong></p>
        <p style="margin-left: 20px;">- Experiencie is increased with 10% each 20 levels (20, 40, etc.), that means at level 40 you will get 10% more exp than at level 39, same for 60 and 59, etc. until 240 and 239 inclusive.</p>
        <p style="margin-left: 10px;color: #7ac27a;margin-bottom: 0px;"><strong>Level 260-280:</strong></p>
        <p style="margin-left: 20px;margin-bottom: 0px;">- This is the Break 1, between these levels the EXP will go down to 25% of the amount of EXP that you gained at 259.</p>
        <p style="margin-left: 30px;margin-bottom: 0px;">- When first 3 players pass the 260-280 break, the break exp (260-280) will get up to 70% until Break 2 is finished, then it will go back to normal exp (same exp like level 259 - 100%).</p>
        <p style="margin-left: 40px;margin-bottom: 0px;">- The rewards for the first 3 players to complete the Break 1 are:</p>
        <p style="margin-left: 40px;margin-bottom: 0px;">- 1 week of Dealer/Hunter VIP for 1st player.</p>
        <p style="margin-left: 40px;">- 1x BoK+4 item +L +2x options at choice for all 3 players, for their own class.</p>
        <p style="margin-left: 10px;color: #e72626; margin-bottom: 0px;"><strong>Level 281-299:</strong></p>
        <p style="margin-left: 20px;">- Exp rate is the same as the exp rate from level 259.
        <p style="margin-left: 10px;color: #df6464; margin-bottom: 0px;"><strong>Level 300-329:</strong></p>
        <p style="margin-left: 20px;">- Exp is increased with 15% each 15 levels (300 & 315), that means at level 300 you will get with 15% more exp than at level 299, same for 315 and 314.</p>
        <p style="margin-left: 10px;color: #e60a9c; margin-bottom: 0px;"><strong>Level 330-345:</strong></p>
        <p style="margin-left: 20px;margin-bottom: 0px;">- This is the Break 2, between these levels the EXP will go down to 20% of the amount of EXP that you previously gained at 329.</p>
        <p style="margin-left: 30px;">- When first 3 players pass the 330-345 break, the break exp (330-345) will get up to 60% until Break 3 is finished, then it will go back to normal exp (same exp like level 329 - 100%).</p>
        <p style="margin-left: 20px;margin-bottom: 0px;">- The rewards for first 3 players to complete the Break 2 are:</p>
        <p style="margin-left: 30px;margin-bottom: 0px;">- 1 week of Professional VIP (that is unlocked after 2nd break) for 1st player.</p>
        <p style="margin-left: 30px;">- 1x BoK+5 item +L +2x options at choice for all 3 players, for their own class.</p>
        <p style="margin-left: 10px;color: #a30a70; margin-bottom: 0px;"><strong>Level 346-359:</strong></p>
        <p style="margin-left: 20px;">- Exp rate is the same as the exp rate from level 329.</p>
        <p style="margin-left: 10px;color: #2065e4; margin-bottom: 0px;"><strong>Level 360-379:</strong>
        <p style="margin-left: 20px;">- Exp is increased with 15% compared to the Exp from level 359.</p>
        <p style="margin-left: 10px;color: #ece919; margin-bottom: 0px;"><strong>Level 380-390:</strong></p>
        <p style="margin-left: 20px;">- This is the Break 3, between these levels the EXP will go down to 15% of the amount of EXP that you gained at 379.</p>
        <p style="margin-left: 20px;">- When the first 3 players pass the 380-390 break, the break exp (380-390) will get up to 50% for 7-10 more days when it will go back to normal exp (same exp like level 379 - 100%).</p>
        <p style="margin-left: 20px;">- The rewards for first 3 players to complete the Break 3 are:</p>
        <p style="margin-left: 30px;">- 2 weeks of Professional VIP for 1st player.</p>
        <p style="margin-left: 30px;">- 1x Dark Elf/Nightmare weapon +L + 1x option at choice for all 3 players, for their own class.</p>
        <p style="margin-left: 10px;color: #f39c12; margin-bottom: 0px;"><strong>Level 391-399:</strong></p>
        <p style="margin-left: 20px;">- Exp rate is the same as the exp rate from level 379.</p>
        
        <h4><strong>Master Level System:</strong></h4>
        
        <p style="margin-left: 10px;">Master Exp is very low (2x) but it can be boosted if you choose to go for resets.</p>
        <p style="margin-left: 10px; margin-bottom: 0px;">You can make only a limited amount of ML on each stage of the game:</p>
        <p style="margin-left: 20px; margin-bottom: 0px;">- If you choose to stay without resets, you can achieve maximum 25 ML.</p>
        </div>
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Stars Drop System<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Events Info<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Spots Info<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Drops Info<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Chaos Machine Info<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        <a id="btn-resetsystem" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Custom Feature MuOnine<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
        
        </div>
            </div>
                <div class="container-spn">
                    <div class="list-group">                        
                    <a id="btn-information-spn" class="list-group-item" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Información básica del servidor <span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                           
                    <div class="container" id="information-container-spn" style="width: 100%;display: none;padding: 15px;">
                        @foreach($infos as $info)
                            {!! html_entity_decode($info->info) !!}
                        @endforeach
                    </div>                       
                    <a id="btn-events-spn" class="list-group-item menu-button" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Eventos<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
                    <div class="container" id="events-container-spn" style="width: 100%;display: none;padding: 15px;">
                        @foreach($infos as $info)
                            {!! html_entity_decode($info->events) !!}
                        @endforeach
                    </div>    
                       
                    <a id="btn-drops-spn" class="list-group-item menu-button"  style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Buscador de drops<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
                    <div class="container" id="drops-container-spn" style="width: 100%;display: none;padding: 15px;">
                        <div class="row" style="margin-bottom: 10px;">
                          
                                <div class="col-md-8">
                                    <input id="abuscar" class="form-control" placeholder="Ingrese el item que necesita encontrar">
                                </div>
                                <div class="col-md-2">
                                    <input id="buscarbtn" class="btn btn-primary" value="Buscar"/>                        
                                </div>
                        
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table id="tabla" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                  Monster
                                              </th>
                                            <th class="text-center">
                                                  Item
                                              </th>
                                              <th class="text-center">
                                                Drop rate
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         
                    </div>
                   
                    <a id="btn-extra-spn" class="list-group-item menu-button" style="text-decoration: none; color: black;"><p class="btn-news"> <span style="color: #237aff;font-weight: bold;">Custom UnderMu<span style="float: right;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></p></a>                                                           
                    <div class="container" id="extra-container-spn" style="width: 100%;display: none;padding: 15px;">
                        @foreach($infos as $info)
                            {!! html_entity_decode($info->extra) !!}
                        @endforeach
                    </div>
                    
                    </div>
                </div>
            </div>
    </div>
</div>
    <div class="col-md-4">
        <div class="panel" >
            <div class="panel-heading" style="background: #85b3f9">
                <h3 style="color: white; font-weight:bold;">Estadisticas</h3>
            </div>
            <div class="panel-body" style="padding: 20px;">
                <strong>Nombre: </strong> <span style="float: right;">UnderMu Server </span><br>
                <hr style="margin: 10px;">
                <strong>Version: </strong> <span style="float: right;">Season 6 Episodio 3</span><br>
                <hr style="margin: 10px;">
                <strong>Lvl Experiencia: </strong><span style="float: right;"> 10x</span><br>
                <hr style="margin: 10px;">
                <strong>M. Lvl Experiencia:</strong> <span style="float: right;"> 1x</span><br>
                <hr style="margin: 10px;">
                <strong>Drop: </strong> <span style="float: right;">30%</span><br>
                <hr style="margin: 10px;">
                <strong>Buffer NPC: </strong> <span style="float: right;">Lvl 200</span><br>
                <hr style="margin: 10px;">
                <strong>Cuentas: </strong> <span style="float: right;">{{$accs}}</span><br>
                <hr style="margin: 10px;">
                <strong>Personajes: </strong> <span style="float: right;">{{$chars}}</span><br>
                <hr style="margin: 10px;">
                <strong>Clanes: </strong> <span style="float: right;">{{$clanes}}</span><br>
                <hr style="margin: 10px;">
                <strong>Personajes Online: </strong><span style="float: right;"><span class="label label-success">{{$online}}</span><br>                
            </div>
            <div class="panel-footer">
                Información de la versión BETA <br>
                <a href="#">Más información.</a>
            </div>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
     $(document).ready(function(){       

        $('#buscarbtn').on('click', function(){           
            const json = {!! json_encode($merged) !!};            
            let seleccionados = [];            
            seleccionados.length = 0;
            $("#tabla").find("tr:gt(0)").remove();

            //para más eficiencia crea un nuevo fragmento
            let fragment = document.createDocumentFragment();
            //recuoera el valor del input y guardalo en una variable
            let elValor = $('#abuscar').val();
            //si hay un valor
            if (elValor.length > 0) {
            // busca en el json si el nombre incluye (o empieza por) el valor
            
                json.forEach(j => {
                    //if(j.nombre.startsWith(elValor))          
                    var valueLower = j.value.name.toUpperCase();      
                    if (valueLower.includes(elValor.toUpperCase())) {                    
                        seleccionados.push(j.value);
                    }
                });
               
                var clean = seleccionados.filter((arr, index, self) =>
                index === self.findIndex((t) => (t.name === arr.name && t.MonsterID === arr.MonsterID)))


                //para cada elemento selccionado
                clean.forEach(s => {
                //crea un nuevo elemento p
               var $row = $('<tr>'+
                        '<td>'+s.MonsterID+'</td>'+      
                        '<td>'+s.name+'</td>'+
                        '<td>'+s.rate+'</td>'+      
                        '</tr>');    
                $('table> tbody:last').append($row);

                });
            }
        
        });


        $('#btn-extra-spn').on('click', function(){ 
                if($('#extra-container-spn:visible').length == 0)
                {
                    $('#extra-container-spn').show('slow');
                }else{
                    $('#extra-container-spn').hide('slow');
                }
                
            });

        $('#btn-chaos-spn').on('click', function(){ 
                if($('#chaos-container-spn:visible').length == 0)
                {
                    $('#chaos-container-spn').show('slow');
                }else{
                    $('#chaos-container-spn').hide('slow');
                }
                
            });

        $('#btn-drops-spn').on('click', function(){ 
                if($('#drops-container-spn:visible').length == 0)
                {
                    $('#drops-container-spn').show('slow');
                }else{
                    $('#drops-container-spn').hide('slow');
                }
                
            });

        $('#btn-spots-spn').on('click', function(){ 
                if($('#spots-container-spn:visible').length == 0)
                {
                    $('#spots-container-spn').show('slow');
                }else{
                    $('#spots-container-spn').hide('slow');
                }
                
            });

            $('#btn-information-spn').on('click', function(){ 
                if($('#information-container-spn:visible').length == 0)
                {
                    $('#information-container-spn').show('slow');
                }else{
                    $('#information-container-spn').hide('slow');
                }
                
            });

            $('#btn-events-spn').on('click', function(){ 
                if($('#events-container-spn:visible').length == 0)
                {
                    $('#events-container-spn').show('slow');
                }else{
                    $('#events-container-spn').hide('slow');
                }
                
            });

            $('#btn-gameplay').on('click', function(){ 
                if($('#gameplay-container:visible').length == 0)
                {
                    $('#gameplay-container').show('slow');
                }else{
                    $('#gameplay-container').hide('slow');
                }
                
            });

            $('#btn-resetsystem').on('click', function(){ 
                if($('#resetsystem-container:visible').length == 0)
                {
                    $('#resetsystem-container').show('slow');
                }else{
                    $('#resetsystem-container').hide('slow');
                }
                
            });

     });
</script>


@endsection
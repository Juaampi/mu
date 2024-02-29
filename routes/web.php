<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Character;
use App\User;


Route::get('/', function () {
    $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->join('MuCastle_DATA', 'MuCastle_DATA.OWNER_GUILD', '=', 'GuildMember.G_Name')->get();    
    $chars = DB::table('Character')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(10)->get();    
    $killers = Character::limit(5)->orderBy('Kills', 'desc')->get();
    $leyenda = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(1)->get();    
    $aniquilador = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('Kills', 'desc')->get();
    $millonario = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('Money', 'desc')->get();
    $duelista = DB::table('Rankingduel')->join('Character', 'RankingDuel.Name', '=', 'Character.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('winscore', 'desc')->get();        
    $news = DB::table('news')->orderBy('created_at', 'desc')->get();
    $onlines = DB::table('memb_stat')->where('ConnectStat', '=', 1)->count();
    $guilds = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->get();
    $eternals = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('eternal', 'desc')->get();
    $accs = DB::table('MEMB_INFO')->get(); 
    return view('welcome', ['accs' => $accs, 'eternals' => $eternals, 'guilds' => $guilds, 'onlines' => $onlines, 'news' => $news, 'guild' => $guild, 'duelista' => $duelista, 'millonario' => $millonario, 'chars' => $chars, 'killers' => $killers, 'leyenda' => $leyenda, 'aniquilador' => $aniquilador]);
});

Route::get('/ranking', 'PlayerController@ranking');
Route::get('/eternal', 'PlayerController@eternal');
Route::get('/duels', 'PlayerController@duels');
Route::get('/guilds', 'PlayerController@guilds');
Route::get('/bloodcastle', 'PlayerController@bloodcastle');
Route::get('/chaoscastle', 'PlayerController@chaoscastle');
Route::get('/devilsquare', 'PlayerController@devilsquare');
Route::get('/information', 'PlayerController@information');
Route::get('/rules', 'PlayerController@rules');
Route::get('/downloads', 'PlayerController@downloads');
Route::post('/resetPassword', 'PlayerController@resetPassword')->name('resetPassword');
Route::get('/addnews', 'PlayerController@addnews');
Route::post('/addnew', 'NewController@publicar')->name('addnew');
Route::get('/news', 'NewController@news');
Route::get('/inventory', 'PlayerController@inventory');
Route::get('/itemlist', 'PlayerController@itemlist');
Route::get('/launcher', 'PlayerController@launcher');
Route::get('/paypal/pay', 'PaymentController@payWithPayPal')->name('paypal');
Route::get('/paypal/status', 'PaymentController@payPalStatus');


Auth::routes();

Route::post('/auth', 'Auth\LoginController@authenticate')->name('authenticate');
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'PlayerController@dashboard')->name('dashboard');
Route::get('/coins', 'PlayerController@coins')->name('coins');
Route::post('/players', 'PlayerController@players')->name('players');
Route::post('/changename', 'PlayerController@changename');
Route::post('/change', 'PlayerController@showChangeNameForm')->name('showChangeNameForm');
Route::post('/changeimage', 'PlayerController@changeimage')->name('changeimage');
Route::get('/configuration', 'PlayerController@configuration');
Route::post('/addinfo', 'InfoController@addinfo')->name('addinfo');
Route::get('/comentadd', 'NewController@comentadd')->name('comentadd');
Route::get('/success', 'HomeController@success');
Route::get('/failure', 'HomeController@failure');
Route::get('/pending', 'HomeController@pending');
Route::get('/success1', 'HomeController@success1');
Route::get('/failure1', 'HomeController@failure1');
Route::get('/pending1', 'HomeController@pending1');
Route::post('/mercadopago', 'PlayerController@mercadopago')->name('mercadopago');






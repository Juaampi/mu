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
    $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(5)->get();    
    $killers = Character::limit(5)->orderBy('Kills', 'desc')->get();
    $leyenda = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(1)->get();    
    $aniquilador = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->orderBy('Kills', 'desc')->get();
    $millonario = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->orderBy('Money', 'desc')->get();
    $duelista = DB::table('Rankingduel')->join('Character', 'RankingDuel.Name', '=', 'Character.name')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('winscore', 'desc')->get();        
    return view('welcome', ['guild' => $guild, 'duelista' => $duelista, 'millonario' => $millonario, 'chars' => $chars, 'killers' => $killers, 'leyenda' => $leyenda, 'aniquilador' => $aniquilador]);
});

Route::get('/ranking', 'PlayerController@ranking');
Route::get('/duels', 'PlayerController@duels');
Route::get('/guilds', 'PlayerController@guilds');
Route::get('/bloodcastle', 'PlayerController@bloodcastle');
Route::get('/chaoscastle', 'PlayerController@chaoscastle');
Route::get('/devilsquare', 'PlayerController@devilsquare');
Route::get('/information', 'PlayerController@information');
Route::get('/rules', 'PlayerController@rules');
Route::get('/downloads', 'PlayerController@downloads');
Route::post('/resetPassword', 'PlayerController@resetPassword')->name('resetPassword');

Auth::routes();

Route::post('/auth', 'Auth\LoginController@authenticate')->name('authenticate');

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'PlayerController@dashboard')->name('dashboard');
Route::post('/players', 'PlayerController@players')->name('players');
Route::post('/changename', 'PlayerController@changename');
Route::post('/change', 'PlayerController@showChangeNameForm')->name('showChangeNameForm');
Route::post('/changeimage', 'PlayerController@changeimage')->name('changeimage');

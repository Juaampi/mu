<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Character;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function username()
    {
        return 'memb___id';
    }   

    public function authenticate(Request $request)
    {                      
        $credentials = array(
        'memb___id'    => $request->username,
        'memb__pwd' => $request->password
        );        

        $user = User::where('memb___id', '=', $request->username)->where('memb__pwd', '=', $request->password)->first();      
       if($user){
           Auth::login($user);
           $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->join('MuCastle_DATA', 'MuCastle_DATA.OWNER_GUILD', '=', 'GuildMember.G_Name')->get();    
           $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(5)->get();    
           $killers = Character::limit(5)->orderBy('Kills', 'desc')->get();
           $leyenda = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(1)->get();    
           $aniquilador = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->orderBy('Kills', 'desc')->get();
           $millonario = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->orderBy('Money', 'desc')->get();
           $duelista = DB::table('Rankingduel')->join('Character', 'RankingDuel.Name', '=', 'Character.name')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->where('ctlcode','!=', '32')->orderBy('winscore', 'desc')->get();        
           return view('welcome', ['guild' => $guild, 'duelista' => $duelista, 'millonario' => $millonario, 'chars' => $chars, 'killers' => $killers, 'leyenda' => $leyenda, 'aniquilador' => $aniquilador]);
       }else{
           return view('auth.login')->with('error', 'Failed credencials, please try again');
       }
            
        
       
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
}

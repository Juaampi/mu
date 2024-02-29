<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Character;
use App\Shop;
use App\Preferencia;
use MercadoPago\Preference;
use MercadoPago;
use Auth;

MercadoPago\SDK::setAccessToken("TEST-997859865585449-062421-23b68fe2a8fb9a9647715b67c79ce110-216363986");

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->join('MuCastle_DATA', 'MuCastle_DATA.OWNER_GUILD', '=', 'GuildMember.G_Name')->get();    
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(5)->get();    
        $killers = Character::limit(5)->orderBy('Kills', 'desc')->get();
        $leyenda = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->take(1)->get();    
        $aniquilador = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->orderBy('Kills', 'desc')->get();
        $millonario = Character::limit(1)->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->orderBy('Money', 'desc')->get();
        $duelista = DB::table('Rankingduel')->join('Character', 'RankingDuel.Name', '=', 'Character.name')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('winscore', 'desc')->get();        
        $news = DB::table('news')->orderBy('created_at', 'desc')->get();
         $coments =  DB::table('comments')->orderBy('created_at', 'desc')->get();
         $onlines = DB::table('memb_stat')->where('ConnectStat', '=', 1)->count();
         $guilds = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->get();
         $eternals = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('eternal', 'desc')->get();         
         $accs = DB::table('MEMB_INFO')->get(); 
        return view('welcome', ['accs' => $accs, 'eternals' => $eternals, 'onlines' => $onlines, 'guilds' => $guilds, 'news' => $news, 'coments' => $coments, 'guild' => $guild, 'duelista' => $duelista, 'millonario' => $millonario, 'chars' => $chars, 'killers' => $killers, 'leyenda' => $leyenda, 'aniquilador' => $aniquilador]);
    }



    public function success(Request $request){

		if(isset($_GET['preference_id'])){	
            $preferencia = Preferencia::where('preference_id', '=', strval($_GET['preference_id']))->first();
            				            
			$accs = DB::table('CashShopData')->get(); 
                foreach($accs as $acc){					
                     if($acc->AccountID == Auth::user()->memb___id){					 					                        
					   $shop = Shop::find($acc->AccountID);                       
                       $total = $shop->WCoinC+$preferencia->wcoins;
					   $shop->WCoinC = $total;
					   $shop->save();  
                       $preferencia->estado = 2; 
                       $preferencia->save();                       
                    }															
				}    		  		                                                                                                                                                                                                                                                                                                                                                                                                                   		  																
            }
			session()->put('successMerc', 'true');			
			return redirect('/dashboard');
		}	
		
	public function failure(){
		session()->put('failure', 'true');		
		return view('dashboard');
	}

	public function pending(Request $request){		
		session()->put('failure', 'true');		
		return view('dashboard');
	}
    
    public function success1(Request $request){

		if(isset($_GET['preference_id'])){
			$id = array('id' => $_GET['preference_id']);			
			$preference = \MercadoPago\Preference::read($id);																	
			$accs = DB::table('CashShopData')->get(); 
                foreach($accs as $acc){					
                     if($acc->AccountID == $preference->payer->name){					 					                        
					   $shop = Shop::find($acc->AccountID);                       
                       $total = $shop->WCoinC+500;
					   $shop->WCoinC = $total;
					   $shop->save();                         
                    }															
				}    		  		                                                                                                                                                                                                                                                                                                                                                                                                                   		  																
            }
			session()->put('successMerc', 'true');			
			return redirect('/dashboard');
		}	
		
	public function failure1(){
		session()->put('failure', 'true');		
		return view('dashboard');
	}

	public function pending1(Request $request){		
		session()->put('failure', 'true');		
		return view('dashboard');
	}
    
  
}

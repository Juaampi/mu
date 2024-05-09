<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\News;
use App\Guild;
use App\GuildMembers; 
use App\Character; 
use App\Account; 
use App\Preferencia; 
use Auth;
use Illuminate\Support\Facades\Input;
class PlayerController extends Controller
{
    public function ranking(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('ResetCount', 'desc')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('ResetCount', 'desc')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        return view('rankings', ['chars' => $chars, 'guild' => $guild]);
    }

    public function eternal(){

        $charse = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        $blood = DB::table('Character')->join('RankingBloodCastle', 'Character.Name', '=', 'RankingBloodCastle.Name')->get();
        $chaos = DB::table('Character')->join('RankingChaosCastle', 'Character.Name', '=', 'RankingChaosCastle.Name')->get();
        $devil = DB::table('Character')->join('RankingDevilSquare', 'Character.Name', '=', 'RankingDevilSquare.Name')->get();
        $duelos = DB::table('Character')->join('RankingDuel', 'Character.Name', '=', 'RankingDuel.Name')->get();
        $ilusion = DB::table('Character')->join('RankingIllusionTemple', 'Character.Name', '=', 'RankingIllusionTemple.Name')->get();
        $santa = DB::table('Character')->join('EventSantaClaus', 'Character.Name', '=', 'EventSantaClaus.Name')->get();        
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();            
        
        foreach($charse as $char){
            
            $score = $char->cLevel + $char->MasterLevel;             
            foreach($blood as $b){
                if($b->Name == $char->Name)
                    $score = $score + ($b->Score / 1000);
            }  
            
            foreach($chaos as $c){
                if($c->Name == $char->Name)
                    $score = $score + ($c->Score / 1000);
            }


            foreach($devil as $d){
                if($d->Name == $char->Name)
                    $score = $score + ($d->Score / 1000);
            }    
            
            foreach($ilusion as $i){
                if($i->Name == $char->Name)
                    $score = $score + ($i->Score / 1000);
            }
            
            foreach($santa as $s){
                if($s->Name == $char->Name)
                    $score = $score + ($s->Score / 1000);
            }

            foreach($duelos as $d){
                if($d->Name == $char->Name){
                    $score = $score + ($d->WinScore * 100);
                    $score = $score - ($d->LoseScore * 1000);
                }
            }
           
            $affected = DB::table('Character')
              ->where('Name', $char->Name)
              ->update(['eternal' => intval($score)]);                     
        }

        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('Eternal','desc')->get();    
        $blood2 = DB::table('RankingBloodCastle')->get();
        return view('eternal', ['chars' => $chars, 'guild' => $guild, 'blood' => $blood2, 'chaos' => $chaos, 'devil' => $devil]);
    }

    public function duels(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->join('RankingDuel', 'Character.name', '=', 'RankingDuel.Name')->where('ctlcode','!=', '32')->orderBy('WinScore', 'desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        return view('duelos', ['chars' => $chars, 'guild' => $guild]);
    }
    
    public function guilds(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->get();    
        $guilds = DB::table('Guild')->orderBy('G_Score','desc')->get();            
        return view('guilds', ['chars' => $chars, 'guilds' => $guilds]);
    }

    public function bloodcastle(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->join('RankingBloodCastle', 'Character.name', '=', 'RankingBloodCastle.Name')->where('ctlcode','!=', '32')->orderBy('Score', 'desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        return view('bloodcastle', ['chars' => $chars, 'guild' => $guild]);
    }

    public function chaoscastle(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->join('RankingChaosCastle', 'Character.name', '=', 'RankingChaosCastle.Name')->where('ctlcode','!=', '32')->orderBy('Score', 'desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        return view('chaoscastle', ['chars' => $chars, 'guild' => $guild]);
    }

    public function devilsquare(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->join('RankingDevilSquare', 'Character.name', '=', 'RankingDevilSquare.Name')->where('ctlcode','!=', '32')->orderBy('Score', 'desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        return view('devilsquare', ['chars' => $chars, 'guild' => $guild]);
    }

    public function forum(){
        return view('vendor.forum.category.index');
    }

    public function information(){
        set_time_limit(0);
        ini_set('memory_limit','1000M');
        $chars = DB::table('Character')->count();
        $accs = DB::table('MEMB_INFO')->count();
        $online = DB::table('MEMB_STAT')->where('ConnectStat', '=', '1')->count();
        $clanes = DB::table('Guild')->count();
        $infos = DB::table('info')->orderBy('created_at', 'desc')->get();
        $origin = Input::get('origin');
        $destination = Input::get('destination');
        $json = file_get_contents('items.json');    
        $json_data = json_decode($json,true); 
        return view('information', ['infos' => $infos, 'chars' => $chars, 'accs' => $accs, 'online' => $online, 'clanes' => $clanes, 'merged' => $json_data]);
    }

    public function rules(){
        $chars = DB::table('Character')->count();
        $accs = DB::table('MEMB_INFO')->count();
        $online = DB::table('MEMB_STAT')->where('ConnectStat', '=', '1')->count();
        $clanes = DB::table('Guild')->count();
        return view('rules', ['chars' => $chars, 'accs' => $accs, 'online' => $online, 'clanes' => $clanes]);
    }

    public function mercadopago(Request $request){
        \MercadoPago\SDK::setAccessToken("APP_USR-7618076562004730-061013-cf854f320aa2e1acd4df53d67c5a7e49-439706810");
        $preference = new \MercadoPago\Preference();
        $payer = new \MercadoPago\Payer;
        $item1 = new \MercadoPago\Item;
        $item1->title = $request->wcoins . " Wcoins";
        $item1->quantity =  1;
        $item1->unit_price = $request->wcoins*2;
        $preference->items = array($item1);             
        $payer->name = Auth::user()->memb___id;
        $payer->email = Auth::user()->memb_addr;
        $preference->payer = $payer;
        $preference->back_urls = array(
            "success" => "http://localhost:8000/success",
            "failure" => "http://localhost:8000/failure",
            "pending" => "http://localhost:8000/pending"
        );
        $preference->auto_return = "approved";        
        $preference->save();        

        $preferencia = new Preferencia(); 
        $preferencia->preference_id = $preference->id; 
        $preferencia->wcoins = $request->wcoins; 
        $preferencia->estado = 1; 
        $preferencia->memb_id = Auth::user()->memb___id;
        $preferencia->plataforma = "Mercado Pago";
        $preferencia->save(); 

        return redirect($preference->init_point); 
    }

    public function downloads(){
        $chars = DB::table('Character')->count();
        $accs = DB::table('MEMB_INFO')->count();
        $online = DB::table('MEMB_STAT')->where('ConnectStat', '=', '1')->count();
        $clanes = DB::table('Guild')->count();
        return view('downloads', ['chars' => $chars, 'accs' => $accs, 'online' => $online, 'clanes' => $clanes]);
    }

    public function resetPassword(Request $request){
        $guests = User::where('mail_addr', '=', $request['email'])->get();
        foreach ($guests as $guest){
            $guid = $guest->memb_guid;
        }
        $user = User::find($guid);
        $user->memb__pwd = $request['password'];
        $user->save();
        return redirect()->back()->with('reset', 'true');                                       
    }

    public function guild(Request $request){
        $guild = Guild::where('G_Name', '=', $request->G_Name)->first();
        $members = Character::where('G_Name', '=', $request->G_Name)->join('GuildMember', 'Character.Name', '=', 'GuildMember.Name')->join('MasterSkillTree', 'GuildMember.name', '=', 'MasterSkillTree.name')->get();        
        $guilds = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->get();    
        return view('guild', ['guild' => $guild, 'chars' => $members, 'guilds' => $guilds]);
        
    }


    public function coins(){
        $preferencias = Preferencia::where('memb_id', '=', Auth::user()->memb___id)->get();
        $cuenta = DB::table('MEMB_INFO')->join('MEMB_STAT', 'MEMB_INFO.memb___id', '=', 'MEMB_STAT.memb___id')->where('MEMB_INFO.memb___id', '=', Auth::user()->memb___id)->first();
        return view('coins', ['preferencias' => $preferencias, 'cuenta' => $cuenta]);
    }

    public function dashboard(){
        return view('dashboard');
    }
    public function configuration(){
        return view('configuration');
    }
    public function players(Request $request){
        $name = $request->name; 
        $blood = DB::table('Character')->join('RankingBloodCastle', 'Character.Name', '=', 'RankingBloodCastle.Name')->where('RankingBloodCastle.Name','=', $name)->get();    
        $chaos = DB::table('Character')->join('RankingChaosCastle', 'Character.Name', '=', 'RankingChaosCastle.Name')->where('RankingChaosCastle.Name','=', $name)->get();    
        $devil = DB::table('Character')->join('RankingDevilSquare', 'Character.Name', '=', 'RankingDevilSquare.Name')->where('RankingDevilSquare.Name','=', $name)->get();    
        $illusion = DB::table('Character')->join('RankingIllusionTemple', 'Character.Name', '=', 'RankingIllusionTemple.Name')->where('RankingIllusionTemple.Name','=', $name)->get();    
        $duel = DB::table('Character')->join('RankingDuel', 'Character.Name', '=', 'RankingDuel.Name')->where('RankingDuel.Name','=', $name)->get();    
        return view('players', ['name' => $name, 'blood' => $blood, 'chaos' => $chaos, 'devil' => $devil, 'illusion' => $illusion, 'duel' => $duel]);
    }

    public function showChangeNameForm(Request $request){
        $name = $request['name'];
        $id = $request['memb___id'];        
        return view('changename', ['name' => $name, 'memb___id' => $id]);
    }

    public function changename(Request $request){        
        $name = $request['name'];
        $newname = $request['newname'];
        $id = $request['memb___id'];   
        $character = Character::find($id);
        $character->Name = $newname;         
        $character->save();
        $update = DB::table('AccountCharacter')->Where('GameID1', '=', $name)->update(['GameID1' => $newname]);
        $update = DB::table('AccountCharacter')->Where('GameID2', '=', $name)->update(['GameID2' => $newname]);
        $update = DB::table('AccountCharacter')->Where('GameID3', '=', $name)->update(['GameID3' => $newname]);
        $update = DB::table('AccountCharacter')->Where('GameID4', '=', $name)->update(['GameID4' => $newname]);
        $update = DB::table('AccountCharacter')->Where('GameID5', '=', $name)->update(['GameID5' => $newname]);

        return redirect()->back()->with('success', 'true');
    }

    public function inventory(){
              

        return view('inventory');
    }    
    public function launcher(){   
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    

        if(isset($request['newid'])){
            $new = News::find($request['newid']);
        }else{
            $new = News::latest('created_at')->first();
        }        
        $news = DB::table('news')->orderBy('created_at', 'desc')->get();
        $coments =  DB::table('comments')->orderBy('created_at', 'desc')->get();
        $users = DB::table('memb_info')->get();

        return view('launcher', ['chars' => $chars, 'guild' => $guild, 'new' => $new, 'news' => $news, 'coments' => $coments,'users' => $users]);        
    }    

    public function changeimage(Request $request){    

        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img-perfil/', $name);            
        }else{
            $name = 'avatar.jpg';
        }
        $user = User::find($request['memb_guid']);
        $user->img = $name;        
        $user->save();
        return redirect()->back()->with('success', 'true');      
    }

    public function addnews(){
        return view('addnews');
    }


}
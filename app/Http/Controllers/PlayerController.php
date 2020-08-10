<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Guild;
use App\GuildMember; 
use App\Character; 
use App\Account; 
class PlayerController extends Controller
{
    public function ranking(){
        $chars = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('MEMB_INFO', 'Character.AccountID', '=', 'MEMB_INFO.memb___id')->join('MEMB_STAT', 'Character.AccountID', '=', 'MEMB_STAT.memb___id')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        $guild = DB::table('Character')->join('MasterSkillTree', 'Character.name', '=', 'MasterSkillTree.name')->join('GuildMember', 'GuildMember.Name', '=', 'Character.Name')->join('Guild', 'GuildMember.G_Name', '=', 'Guild.G_Name')->where('ctlcode','!=', '32')->orderBy('MasterLevel', 'desc')->orderBy('cLevel','desc')->get();    
        return view('rankings', ['chars' => $chars, 'guild' => $guild]);
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

    public function information(){
        $chars = DB::table('Character')->count();
        $accs = DB::table('MEMB_INFO')->count();
        $online = DB::table('MEMB_STAT')->where('ConnectStat', '=', '1')->count();
        $clanes = DB::table('Guild')->count();
        return view('information', ['chars' => $chars, 'accs' => $accs, 'online' => $online, 'clanes' => $clanes]);
    }

    public function rules(){
        $chars = DB::table('Character')->count();
        $accs = DB::table('MEMB_INFO')->count();
        $online = DB::table('MEMB_STAT')->where('ConnectStat', '=', '1')->count();
        $clanes = DB::table('Guild')->count();
        return view('rules', ['chars' => $chars, 'accs' => $accs, 'online' => $online, 'clanes' => $clanes]);
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

    public function dashboard(){
        return view('dashboard');
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


}
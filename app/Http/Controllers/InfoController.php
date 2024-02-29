<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class InfoController extends Controller
{
    public function addinfo(Request $request){
        $info = new Info;
        $valorselect = $request['select'];        
                
        if($valorselect == 'info'){
            $info->info = $request['textbox'];
            $info->save();
        }
        if($valorselect == 'events'){
            $info->events = $request['textbox'];
            $info->save();
        }
        if($valorselect == 'spots'){
            $info->spots = $request['textbox'];
            $info->save();
        }
        if($valorselect == 'drops'){
            $info->drops = $request['textbox'];
            $info->save();
        }      
        if($valorselect == 'chaos'){
            $info->chaos = $request['textbox'];
            $info->save();
        }  
        if($valorselect == 'extra'){
            $info->extra = $request['textbox'];
            $info->save();
        }        
        return redirect()->back()->with('success', 'true');
    }
}

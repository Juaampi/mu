<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Coment;

class NewController extends Controller
{
    public function publicar(Request $request){
        $title = $request['title'];
        $category = $request['category'];
        $body = $request['body'];
        $subtitle = $request['subtitle'];
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img-news/', $name);                        
        }        
        $new = new News;
        $new->title = $title; 
        $new->body = $body; 
        $new->img = $name; 
        $new->category = $category;   
        $new->subtitle = $subtitle;      
        $new->save();
        return redirect()->back()->with('success', 'true');
    }

    public function news(Request $request){
        
        if(isset($request['newid'])){
            $new = News::find($request['newid']);
        }else{
            $new = News::latest('created_at')->first();
        }        
        $news = DB::table('news')->orderBy('created_at', 'desc')->get();
        $coments =  DB::table('comments')->orderBy('created_at', 'desc')->get();
        $users = DB::table('memb_info')->get();
        return view('news', ['new' => $new, 'news' => $news, 'coments' => $coments,'users' => $users]);
    }

    public function comentadd(Request $request){
        if(!empty($request['positive']) && !empty($request['coment'])){
            $coment = new Coment;
            $coment->comment = $request['coment'];
            if($request['positive'] == 'false'){
                $coment->positivo = 0;    
            }
            $coment->positivo = $request['positive'];
            $coment->id_notice = $request['id_notice'];
            $coment->memb___id = $request['memb___id'];
            $coment->save();        
            return redirect()->back()->with('response', 'success');
        }else{
            return redirect()->back()->with('noresponse', 'error');
        }
    }

}

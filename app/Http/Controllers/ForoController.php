<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Tema;
use App\User;
use App\Like;
use Auth;
use App\Respuesta;
use App\Character; 
use App\RespuestaVista; 
use Illuminate\Support\Facades\DB;

class ForoController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('forum', ['categorias' => $categorias]);
    }

    public function like(Request $request){
       $like = new Like(); 
       $like->id_usuario = $request->id_usuario; 
       $like->id_tema = $request->id_tema;
       $like->save();
       return redirect()->back()->with('successLike', 'successLike');                    
    }


    public function categoria(Request $request){
        $id = $request->id;
        $categoria = Categoria::where('id', '=', $id)->get();
        $categoria_datos = DB::table('categorias')->join('temas', 'categorias.id', '=', 'temas.id_categoria')->join('MEMB_INFO', 'temas.id_usuario', '=', 'MEMB_INFO.memb___id')->where('categorias.id', '=', $id)->orderBy('temas.created_at', 'DESC')->get();            
       
        return view('categoria', ['categoria_datos' => $categoria_datos, 'categoria' => $categoria]);
    }

    public function tema(Request $request){
        $id = $request->id;
        $tema = Tema::where('id', '=', $id)->first();
        $usuario = User::where('memb___id', '=', $tema->id_usuario)->first();
        $admin = Character::where('AccountID', '=', $tema->id_usuario)->where('CtlCode', '=', 32)->first();
        $gm = Character::where('AccountID', '=', $tema->id_usuario)->where('CtlCode', '=', 8)->first();

        if(Auth::user()){
            $vistas = RespuestaVista::where('id_tema', '=', $tema->id)->where('id_usuario', '=', Auth::user()->memb___id)->where('visto', '=', false)->get();
            foreach($vistas as $vista){
                $vista->visto = true; 
                $vista->save();
            }        
    }

        if($admin != null){
            $isadmin = true; 
        }else{
            $isadmin = false;
        }
        if($gm != null){
            $isgm = true; 
        }else{
            $isgm = false;
        }
       
        return view('tema', ['tema' => $tema, 'usuario' => $usuario, 'isadmin' => $isadmin, 'isgm' => $isgm]);
    }

    public function addrespuesta(Request $request){
        if($request->contenido == ''){
            return redirect()->back()->with('error', 'error');
        }
        $respuesta = new Respuesta();
        $respuesta->id_usuario = $request->id_usuario; 
        $respuesta->id_tema = $request->id_tema; 
        $respuesta->contenido = $request->contenido; 
        $respuesta->save(); 

        $tema = DB::table('temas')->where('id', '=', $request->id_tema)->first();

        $respuestaVisto = new RespuestaVista();
        $respuestaVisto->id_usuario = $tema->id_usuario;
        $respuestaVisto->id_tema = $request->id_tema;  
        $respuestaVisto->visto = false; 
        $respuestaVisto->save(); 

        return redirect()->back()->with('success', 'success');                    
    }

    public function addtema(Request $request){
        if($request->contenido == ''){
            return redirect()->back()->with('error', 'error');
        }

        $tema = new Tema();
        $tema->titulo = $request->titulo; 
        $tema->contenido = $request->contenido; 
        $tema->likes = 0; 
        $tema->id_categoria = $request->id_categoria; 
        $tema->id_usuario = $request->id_usuario; 
            
        $tema->save(); 
        return redirect()->back()->with('success', 'success');                    
    }

    public function agregarTemaRedirect(Request $request){
        $id_categoria = $request->id; 
        return view('addtema', ['id_categoria' => $id_categoria]);
    }

    public function editartemaredirect(Request $request){
        $tema = Tema::where('id', '=', $request->id)->first();
        return view('editartema', ['tema' => $tema]);
    }

    public function editartema(Request $request){

        $tema = Tema::where('id', '=', $request->id)->first();
        $tema->titulo = $request->titulo; 
        $tema->contenido = $request->contenido;         
        $tema->save();
        

        $usuario = User::where('memb___id', '=', $tema->id_usuario)->first();
       

        $admin = Character::where('AccountID', '=', $tema->id_usuario)->where('CtlCode', '=', 32)->first();
        $gm = Character::where('AccountID', '=', $tema->id_usuario)->where('CtlCode', '=', 8)->first();
        if($admin != null){
            $isadmin = true; 
        }else{
            $isadmin = false;
        }
        if($gm != null){
            $isgm = true; 
        }else{
            $isgm = false;
        }

        return view('tema', ['tema' => $tema, 'usuario' => $usuario, 'isadmin' => $isadmin, 'isgm' => $isgm]);    
    }
}

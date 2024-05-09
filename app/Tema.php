<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{    
    protected $table = 'Temas';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo','contenido', 'id_categoria', 'id_usuario', 'likes', 'updated_at', 'created_at'];
    
    public function user()
    {
      return $this->belongsTo('App\User', 'memb___id', 'id_usuario');
    }

    public function categoria()
    {
      return $this->belongsTo('App\Categoria', 'id', 'id_categoria');
    }

    public function respuestas()
    {
      return $this->hasMany('App\Respuesta', 'id_tema', 'id');
    }
    
}

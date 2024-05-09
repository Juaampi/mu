<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{    
    protected $table = 'Respuestas';
    protected $primaryKey = 'id';
    protected $fillable = ['contenido', 'id_tema', 'id_usuario', 'updated_at', 'created_at'];
    
    public function user()
    {
      return $this->belongsTo('App\User', 'memb___id', 'id_usuario');
    }
    public function tema()
    {
      return $this->belongsTo('App\Tema', 'id', 'id_tema');
    }
    
}

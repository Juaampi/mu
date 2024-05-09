<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{    
    protected $table = 'Categorias';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','subtitulo'];

    public function temas()
    {
        return $this->hasMany('App\Tema', 'id_categoria', 'id');
    }

    
}

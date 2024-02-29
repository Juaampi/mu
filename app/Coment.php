<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['comment','memb___id','id_notice', 'positivo'];

    public function User(){

        return $this->belongsTo('App\User');
    }
}

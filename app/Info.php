<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $primaryKey = 'id';
    protected $fillable = ['info','events', 'spots', 'drops', 'chaos', 'extra', 'updated_at', 'created_at'];
}

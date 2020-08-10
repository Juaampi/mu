<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'MEMB_STAT';
    protected $primaryKey = 'memb___id';
    protected $fillable = ['name','cLevel','class', 'experience','strength','energy'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUCore_Shop_Items extends Model
{
    protected $table = 'MUCore_Shop_Items';
    protected $primaryKey = 'name';
    protected $fillable = ['id','name','MasterLevel','MasterPoint','MasterExperience'];

    public function character()
    {
      return $this->belongsTo('App\Character', 'Name', 'Name');
    }

}

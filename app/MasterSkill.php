<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSkill extends Model
{
    protected $table = 'MasterSkillTree';
    protected $primaryKey = 'name';
    protected $fillable = ['name','MasterLevel','MasterPoint','MasterExperience'];

    public function character()
    {
      return $this->belongsTo('App\Character', 'Name', 'Name');
    }

}

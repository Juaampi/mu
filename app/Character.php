<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'Character';
    protected $primaryKey = 'name';
    protected $fillable = ['name','cLevel','class', 'experience','strength','energy'];

    public function masterskill() {
        return $this->hasOne('App\MasterSkill', 'Name', 'Name');
    }

    public function guildmember(){
        return $this->hasOne('App\GuildMembers', 'Name', 'Name');
    }


    
}

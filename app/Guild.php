<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $table = 'Guild';    
    protected $fillable = ['G_Mark','G_Score','G_Master'];

    public function members()
    {
        return $this->hasMany('App\GuildMembers', 'G_Name', 'G_Name');
    }
}

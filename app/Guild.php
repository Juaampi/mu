<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $table = 'Guild';
    protected $primaryKey = 'G_Name';
    protected $fillable = ['G_Mark','G_Score','G_Master'];

    public function members()
    {
        return $this->hasMany('App\GuildMember', 'G_Name', 'G_Name');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuildMembers extends Model
{
    protected $table = 'GuildMember';
    protected $primaryKey = 'Name';
    protected $fillable = ['G_Level','G_Status'];

    public function character()
    {
        return $this->belongsTo('App\Character', 'Name', 'Name');
    }
}

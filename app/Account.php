<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'AccountCharacter';
    protected $primaryKey = 'id';
    protected $fillable = ['GameID1', 'GameID2', 'GameID3', 'GameID4'];    

}

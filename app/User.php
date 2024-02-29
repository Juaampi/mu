<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'MEMB_INFO';
    protected $primaryKey = 'memb_guid';
    protected $fillable = ['memb___id','memb_name', 'sno__numb','bloc_code','ctl1_code', 'mail_addr', 'memb__pwd', 'img', 'security', 'country'];

    public function getAuthPassword()
    {
        return $this->memb__pwd;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function characters()
    {
        return $this->hasMany('App\Character', 'AccountID', 'memb___id');
    }

    public function shop() {
        return $this->hasOne('App\Shop', 'AccountID', 'memb___id');
    }

    public function getEmailForPasswordReset() {
        return $this->mail_addr;
    }
    public function coments()
    {
        return $this->hasMany('App\Coment');
    }


  
}

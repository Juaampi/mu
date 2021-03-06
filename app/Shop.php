<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'CashShopData';
    protected $primaryKey = 'AccoundID';
    protected $fillable = ['WCoinC', 'GoblinPoint'];

    public function user()
    {
      return $this->belongsTo('App\User', 'memb___id', 'AccountID');
    }
}

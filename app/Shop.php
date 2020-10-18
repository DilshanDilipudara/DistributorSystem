<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function invoices() {
        return $this->hasMany('App\Invoice');
    }
}

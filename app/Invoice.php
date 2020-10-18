<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * One Invoice has many Articles
     */
    public function articles(){
        return $this->belongsToMany('App\Article')
            ->withPivot('unit_price', 'sale_qty', 'discount', 'free_offer')
            ->withTimestamps();
    }

    public function shop() {
        return $this->belongsTo('App\Shop');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

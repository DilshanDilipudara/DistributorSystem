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
            ->withPivot('date', 'unit_price', 'sale_qty', 'discount', 'free_offer', 'total')
            ->withTimestamps();

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    /**
     * One warehouses has one articles
     */
    public function articles(){

        return $this->belongsTo('App\Article');

    }
}

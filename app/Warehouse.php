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

    /**
     * One warehouses has one supplier
     */
    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}

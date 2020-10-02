<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * One article has one article category
     */
    public function articleCategory(){

        return $this->belongsTo('App\ArticleCategory');

    }

    /**
     * One article has many warehouses
     */
    public function warehouses(){

        return $this->hasMany('App\Warehouse');

    }

    /**
     * One article has many invoices
     */
    public function invoices(){

        return $this->belongsToMany('App\Invoice')
            ->withPivot('date', 'unit_price', 'sale_qty', 'discount', 'free_offer', 'total')
            ->withTimestamps();

    }

    /**
     * One Article has one Metric
     */
    public function metric(){

        return $this->belongsTo('App\Metric');
    }
}

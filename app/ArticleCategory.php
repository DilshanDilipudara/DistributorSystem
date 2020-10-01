<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    /**
     * One ArticleCategory has many Articles
     */
    public function articles(){

        return $this->hasMany('App\Article');
    }

    /**
     * One ArticleCategory has many Suppliers
     */
    public function suppliers(){

        return $this->hasMany('App\Suppliers');
    }

    /**
     * One ArticleCategory has one Metric
     */
    public function metric(){

        return $this->belongsTo('App\Metric');
    }

}

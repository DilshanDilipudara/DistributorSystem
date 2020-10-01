<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    /**
     * One Metric has many ArticleCategories
     */
    public function articleCategories(){

        return $this->hasMany('App\ArticleCategory');
    }
}

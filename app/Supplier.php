<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * One suppler has many article category
     */
     public function articleCategories(){

        return $this->belongsToMany('App\ArticleCategory')
            ->withTimestamps();
    }
}

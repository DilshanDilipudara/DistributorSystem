<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    /**
     * One Metric has many Article
     */
    public function article(){

        return $this->hasMany('App\Article');
    }
}

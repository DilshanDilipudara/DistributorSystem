<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suppler extends Model
{
    /**
     * One suppler  has many artical category
     */

     public function articalcategory(){
      
        return $this->belongsToMany('App\articalcategory');

    }
}

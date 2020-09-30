<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artical extends Model
{
    /**
     * One artical  has one artical category
     */
    public function articalcategories(){
      
        return $this->belongsTo('App\articalcategory');

    }

  
}

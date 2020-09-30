<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articalcategory extends Model
{
    /**
     * One artical category has many artical
     */
    public function articals(){

        return $this->hasMany('App\artical');
    }

    /**
     * One suppler  has many artical category
     */
    public function supplers(){
        
        return $this->hasMany('App\artical');
    }

      /**
     * One artical category has many suppler
     */

     public function suppler(){
      
        return $this->belongsToMany('App\suppler');

    }
}

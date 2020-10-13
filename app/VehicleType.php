<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    /**
     * One VehicleType has many Expenses
     */
    public function expenses(){

        return $this->hasMany('App\Expense');
    }

}

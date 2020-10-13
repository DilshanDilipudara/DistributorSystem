<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * One expense has one vehicleType
     */
    public function vehicleType(){

        return $this->belongsTo('App\VehicleType');
    }

    /**
     * One expense has one expenseType
     */
    public function expenseType(){

        return $this->belongsTo('App\ExpenseType');
    }
}

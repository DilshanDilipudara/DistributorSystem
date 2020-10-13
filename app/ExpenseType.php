<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    /**
     * One ExpenseType has many Expenses
     */
    public function expenses(){

        return $this->hasMany('App\Expense');
    }

}

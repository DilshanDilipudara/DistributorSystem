<?php

namespace App\Http\Controllers;
use Auth;
use App\Expense;
use App\ExpenseType;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
        //view
    public function view(Request $req){

        $data = Expense::where('isTransport',false)->get();
        $ex_type = ExpenseType::where('isActive',true)->orderBy('name')->get();
        //dd($data);
        return view('/Expenses',compact('data','ex_type'));
    }
    //add
    public function add(Request $req){

       // dd($req);
        $data = new Expense;
        $data->date = $req->date;
        $data->expense_type_id  = $req->expense_type;
        $data->description = $req->description;
        $data->cost = $req->cost;
        $data->comment = $req->comment;
        $data->isTransport  = false;
        $data->save();
        return redirect('/Expenses');  
    }
  
    //update
    public function update(Request $req){
        //dd($req);
        $data =  Expense::find($req->id);
        $data->date = $req->date;
        $data->expense_type_id  = $req->expense_type;
        $data->description = $req->description;
        $data->cost = $req->cost;
        $data->comment = $req->comment;
        $data->isTransport  = false;
       $data->save();

       return redirect('/Expenses');
    }
}

<?php

namespace App\Http\Controllers;
use Auth;
use App\Expense;
use App\ExpenseType;
use App\VehicleType;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class TrasportExpensesController extends Controller
{
         //view
    public function view(Request $req){

        $data = Expense::where('isTransport',true)->get();
        $ex_type = ExpenseType::where('isActive',true)->orderBy('name')->get();
        $vehicle = VehicleType::where('isActive',true)->orderBy('name')->get();
        //dd($data);
        return view('/transportExpenses',compact('data','ex_type','vehicle'));
    }
    //add
    public function add(Request $req){

       // dd($req);
        $data = new Expense;
        $data->date = $req->date;
        $data->expense_type_id  = $req->expense_type;
        $data->vehicle_type_id = $req->trasport_type;
        $data->description = $req->description;
        $data->cost = $req->cost;
        $data->comment = $req->comment;
        $data->isTransport  = true;
        $data->save();
        return redirect('/transportExpenses');  
    }
  
    //update
    public function update(Request $req){
        //dd($req);
        $data =  Expense::find($req->id);
        $data->date = $req->date;
        $data->expense_type_id  = $req->expense_type;
        $data->vehicle_type_id = $req->trasport_type;
        $data->description = $req->description;
        $data->cost = $req->cost;
        $data->comment = $req->comment;
        $data->isTransport  = true;
       $data->save();

       return redirect('/transportExpenses');
    }
}

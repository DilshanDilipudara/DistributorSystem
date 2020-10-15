<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Auth;
use App\ExpenseType;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
class expenseTypeController extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }
     //view
    public function view(Request $req){
        $data = ExpenseType::all();
        //dd($data);
        return view('/ExpenseType',compact('data'));
    }
    //add
    public function add(Request $req){

        //dd($req);
        $data = new ExpenseType;
        $data->name = $req->name;
        $data->save();
        return redirect('/ExpenseType');  
    }
    //delete
    public function delete(Request $req){
        
        $data = ExpenseType::find($req->id);
        $data->isActive = false;
        $data->save();
        return redirect('/ExpenseType');
    }
    //active
    public function active(Request $req){
        $data = ExpenseType::find($req->id);
        $data->isActive = true;
        $data->save();
        return redirect('/ExpenseType');
    }
    //update
    public function update(Request $req){
        //dd($req);
       $data =  ExpenseType::find($req->id);
       $data->name = $req->name;
       $data->save();
       return redirect('/ExpenseType');
    }
}

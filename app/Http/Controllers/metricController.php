<?php

namespace App\Http\Controllers;
use Auth;
use App\Metric;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class metricController extends Controller
{
    //view
    public function view(Request $req){
        $data = Metric::all();
        //dd($data);
        return view('metrics',compact('data'));
    }
    //add
    public function add(Request $req){

        //dd($req);
        $metric = new Metric;
        $metric->name = $req->name;
        $metric->save();
        return redirect('/metrics');  
    }
    //delete
    public function delete(Request $req){
        
        $data = Metric::find($req->id);
        dd($data->id);
    }
    //update
    public function update(Request $req){
        //dd($req);
       $data =  Metric::find($req->id);
       $data->name = $req->name;
       $data->save();
       return redirect('/metrics');
    }

}

<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Auth;
use App\VehicleType;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class vehicleController extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }
       //view
    public function view(Request $req){
        $data = VehicleType::all();
        //dd($data);
        return view('/vehicle',compact('data'));
    }
    //add
    public function add(Request $req){

        //dd($req);
        $data = new VehicleType;
        $data->name = $req->name;
        $data->save();
        return redirect('/vehicle');  
    }
    //delete
    public function delete(Request $req){
        
        $data = VehicleType::find($req->id);
        $data->isActive = false;
        $data->save();
        return redirect('/vehicle');
    }
    //active
    public function active(Request $req){
        $data = VehicleType::find($req->id);
        $data->isActive = true;
        $data->save();
        return redirect('/vehicle');
    }
    //update
    public function update(Request $req){
        //dd($req);
       $data =  VehicleType::find($req->id);
       $data->name = $req->name;
       $data->save();
       return redirect('/vehicle');
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;


class roleChange extends Controller
{
    public function view(Request $req){
        
         $user = User::all();
       //  dd($user);
        return view('/rolechange',compact('user'));
    }

      //delete
    public function delete(Request $req){
        
        $data = User::find($req->id);
        $data->isActive = false;
        $data->save();
        return redirect('/rolechange');
    }
    //active
    public function active(Request $req){
        
        $data = User::find($req->id);
        $data->isActive = true;
        $data->save();
        return redirect('/rolechange');
    }

    //update
    public function update(Request $req){
      
       $data = User::find($req->id);
       $data->role = $req->role;
       $data->save();
       return redirect('/rolechange');
    }
}

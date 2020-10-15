<?php

namespace App\Http\Controllers;

use Auth;
use User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class profile extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }
    public function view(Request $req){
        
        $user = Auth::user();
        //dd($user);
        return view('/profile',compact('user'));
    }

    public function update(Request $req){
            //dd($req);
           $data = Auth::user();
           $data->name = $req->name;
           $data->email = $req->email;
           $data->mobile = $req->mobile;
           $data->username = $req->username;
           $data->save();
           return redirect('/profile');
    }
}

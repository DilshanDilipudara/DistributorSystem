<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class metric extends Controller
{
    public function add(Request $req){
        $name = $req->name;
        dd($name);
    }
}

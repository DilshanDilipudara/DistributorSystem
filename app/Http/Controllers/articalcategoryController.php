<?php

namespace App\Http\Controllers;

use Auth;
use App\ArticleCategory;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class articalcategoryController extends Controller
{
    //view
    public function view(Request $req)
    {
        $data = ArticleCategory::all();
        //dd($data);
        return view('/articalcategory', compact('data'));
    }
    //add
    public function add(Request $req)
    {

        //dd($req);
        $data = new ArticleCategory;
        $data->name = $req->name;
        $data->buying = $req->buying;
        $data->selling = $req->selling;
        $data->comments = $req->comments;
        $data->save();
        return redirect('/articalcategory');
    }
    //delete
    public function delete(Request $req)
    {

        $data = ArticleCategory::find($req->id);
        dd($data->id);
    }
    //update
    public function update(Request $req)
    {
        //dd($req);
        $data =  ArticleCategory::find($req->id);
        $data->name = $req->name;
        $data->buying = $req->buying;
        $data->selling = $req->selling;
        $data->comments = $req->comments;
        $data->save();
        return redirect('/articalCategorys');
    }

}

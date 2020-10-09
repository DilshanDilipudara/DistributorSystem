<?php

namespace App\Http\Controllers;
use Auth;
use App\Supplier;
use App\ArticleCategory;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class supplerController extends Controller
{
     //view
    public function view(Request $req){
        $artical_category  = ArticleCategory::where('isActive',true)->orderBy('name')->get();
        $suppler = Supplier::all();
        //dd($data);
        return view('/suppler', compact('artical_category','suppler'));
    }
    //add
    public function add(Request $req){

        //dd($req);
        $suppler = new Supplier;
        $suppler->name = $req->name;
        $suppler->article_category_id  = $req->categoryID;
        $suppler->street  = $req->street;
        $suppler->city = $req->city;
        $suppler->telephone = $req->tel;
        $suppler->mobile = $req->mob;
        $suppler->email = $req->email;
        $suppler->reg_no = $req->regno;
        $suppler->comments = $req->comments;
        $suppler->save();
        return redirect('/suppler');  
    }
    //delete
    public function delete(Request $req){
        
        $data = Supplier::find($req->id);
        $data->isActive = false;
        $data->save();
        return redirect('/suppler');
    }
    //active
    public function active(Request $req){
        $data = Supplier::find($req->id);
        $data->isActive = true;
        $data->save();
        return redirect('/suppler');
    }
    //update
    public function update(Request $req){
       // dd($req);
        $suppler =  Supplier::find($req->id);
        $suppler->name = $req->name;
        $suppler->article_category_id  = $req->categoryID;
        $suppler->street  = $req->street;
        $suppler->city = $req->city;
        $suppler->telephone = $req->tel;
        $suppler->mobile = $req->mob;
        $suppler->email = $req->email;
        $suppler->reg_no = $req->reg_no;
        $suppler->comments = $req->comments;
        $suppler->save();
       return redirect('/suppler');
    }

}

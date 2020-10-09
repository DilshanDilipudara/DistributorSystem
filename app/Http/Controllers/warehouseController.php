<?php

namespace App\Http\Controllers;

use Auth;
use App\ArticleCategory;
use App\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Metric;
use App\Warehouse;
use App\Supplier;

class warehouseController extends Controller
{
    //
     //view
    public function view(Request $req){
        $data = Metric::all();
        $warehouse = Warehouse::all();
        $category = ArticleCategory::where('isActive',true)->orderBy('name')->get();
        $artical  = Article::where('isActive',true)->orderBy('name')->get();
        $supplier  = Supplier::where('isActive',true)->orderBy('name')->get();
        //dd($data);
        return view('/warehouse',compact('data','warehouse','category','artical','supplier'));
    }
    //add
    public function add(Request $req){

        //dd($req);
        $data = new warehouse;
        $data->article_category_id = $req->categoryID;
        $data->article_id  = $req->articalID;
        $data->suppler_id  = $req->supplierID;
        $data->date  = $req->date;
        $data->order_number  = $req->bidID;
        $data->invoice_number = $req->invoice;
        $data->price = $req->total;
        $data->quantity  = $req->qty;
        $data->buying    = $req->input('buying') ? true : false;
        $data->selling   = $req->input('selling') ? true : false;
        $data->comment  = $req->comments;

        $data->save();
        return redirect('/warehouse');  
    }
    //delete
    public function delete(Request $req){
        
        $data = warehouse::find($req->id);
        $data->isActive = false;
        $data->save();
        return redirect('/warehouse');
    }
    //active
    public function active(Request $req){
        $data = warehouse::find($req->id);
        $data->isActive = true;
        $data->save();
        return redirect('/warehouse');
    }
    //update
    public function update(Request $req){
        //dd($req);
       $data =  warehouse::find($req->id);
       $data->name = $req->name;
       $data->save();
       return redirect('/warehouse');
    }
}

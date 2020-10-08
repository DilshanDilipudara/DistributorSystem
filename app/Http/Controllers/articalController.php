<?php

namespace App\Http\Controllers;

use Auth;
use App\ArticleCategory;
use App\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Metric;

class articalController extends Controller
{
    public function view(Request $req){
        $data  = ArticleCategory::where('isActive',true)->orderBy('name')->get();
        $metric = Metric::where('isActive',true)->orderBy('name')->get();
        $artcalData = Article::all();
        //dd($data);
        return view('/artical', compact('data','metric','artcalData'));
    }

    public function add(Request $req){
        //dd($req);
        $data = new Article;
        $data->name     = $req->name;
        $data->article_category_id  = $req->categoryID;
        $data->volume   = $req->volume;
        $data->metric_id = $req->metricID;
        $data->buy_price = $req->buyprice;
        $data->sell_price    = $req->sellprice;
        $data->min_sale_qty  = $req->minsale;
        $data->buying    = $req->input('buying') ? true : false;
        $data->selling   = $req->input('selling') ? true : false;
        $data->comments  = $req->comments;
        $data->save();
        return redirect('/artical');


    }

    public function getProdArticles(ArticleCategory $prod){
        $articles = $prod->articles()->with('metric')->get();

        return $articles;
    }
}

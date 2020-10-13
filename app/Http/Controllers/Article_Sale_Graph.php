<?php

namespace App\Http\Controllers;
use Auth;
use App\Article;
use App\ArticleCategory;
use App\Invoice;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class Article_Sale_Graph extends Controller
{
    public function view(){
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        return view('/month_artical_sales_graph',compact('category','artical'));
    }
}

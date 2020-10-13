<?php

namespace App\Http\Controllers;

use Auth;
use App\ArticleCategory;
use App\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Metric;
use App\Invoice;
use DB;


class staticController extends Controller
{
    public function view(Request $req){
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        $data = null;
        $metrics = null;
        return view('/saleStatic',compact('category','artical','data','metrics'));

    }

    public function showSale(Request $req){
    
        $startdate = $req->fromdate;
        $enddate = $req->todate;
        
        $data = DB::table('article_invoice as ai')
                ->join('invoices as a','ai.invoice_id','=','a.id')
                ->where('ai.article_id','=',$req->articalID)
                ->whereDate('a.date','>=',$startdate )
                ->whereDate('a.date','<=',$enddate )
                ->select('ai.unit_price', DB::raw('SUM(ai.sale_qty * ai.unit_price * (100 - ai.discount)/100) as total_sales'),DB::raw('SUM(ai.sale_qty) as total_qty'))
                ->groupBy('ai.unit_price')    
                ->get();
       
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        $metrics = Article::with('Metric')->find($req->articalID);
    
         return view('/saleStatic',compact('data','metrics','category','artical','startdate','enddate'));
    }


     public function viewmonth(Request $req){
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        $data = null;
        $metrics = null;
        return view('/monthlyStatic',compact('category','artical','data',));

    }


    public function showMonth(Request $req){
    
       $date = $req->date;
       $startDayofMonth =    \Carbon\Carbon::parse($date)->startOfMonth()->toDateString();
       $lastDayofMonth =    \Carbon\Carbon::parse($date)->endOfMonth()->toDateString();
       $month = date("F Y",strtotime($date));

        $data = DB::table('article_invoice as ai')
                ->join('invoices as a','ai.invoice_id','=','a.id')
                ->where('ai.article_id','=',$req->articalID)
                ->whereDate('a.date','>=',$startDayofMonth )
                ->whereDate('a.date','<=',$lastDayofMonth )
                ->select('ai.unit_price', DB::raw('SUM(ai.sale_qty * ai.unit_price * (100 - ai.discount)/100) as total_sales'),DB::raw('SUM(ai.sale_qty) as total_qty'))
                ->groupBy('ai.unit_price')    
                ->get();
       
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        $metrics = Article::with('Metric')->find($req->articalID);
    
         return view('/monthlyStatic',compact('data','metrics','category','artical','month'));
    }




    
}

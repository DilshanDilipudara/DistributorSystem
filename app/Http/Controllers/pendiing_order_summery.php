<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Invoice;
use App\Shop;
use Illuminate\Http\Request;
use DB;

class pendiing_order_summery extends Controller
{
    //add middleware
    public function __construct(){
        
        $this->middleware('auth');
    }

    //first page load
    public function view(){
        $data = null;
        $start_date = null;
        $end_date   = null;
        return view('/pending_order_summery',compact('data','start_date','end_date'));
    }
    
    //show pending order
    public function show_pending(Request $req){
        $start_date = $req->order_start_date;
        $end_date   =  $req->order_end_date;

        $data = DB::table('invoices as i')
                         ->join('article_invoice as ai','ai.invoice_id','=','i.id')
                         ->join('articles as a','ai.article_id','=','a.id')
                         ->join('shops as s','s.id','=','i.shop_id')
                         ->whereDate('i.date','>=',$start_date)
                         ->whereDate('i.date','<=',$end_date)
                         ->where('i.pending',true)
                         ->select('ai.article_id','a.name as article_name','s.name as shop_name','a.volume','ai.unit_price','ai.sale_qty','ai.free_offer',DB::raw('ai.sale_qty + ai.free_offer as total'))
                         ->get();
        
       
       return view('/pending_order_summery',compact('data','start_date','end_date')); 
    }            
}

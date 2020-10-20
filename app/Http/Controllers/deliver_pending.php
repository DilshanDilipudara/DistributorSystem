<?php

namespace App\Http\Controllers;
use Auth;
use App\Article;
use App\ArticleCategory;
use App\Invoice;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DateTime;
use DB;

class deliver_pending extends Controller
{
    public function view(){

        $data = null;
        $start_date = null;
        $end_date = null;
        return view('/deliver_pending',compact('data','start_date','end_date'));
    }

    public function show_pending(Request $request){
          //dd($req);
   
            $full_range = ($request->start_date && $request->end_date);
            $start_date = $request->start_date;
            $end_date =  $request->end_date;

           $data =  DB::table('invoices')
                    ->join('article_invoice', 'article_invoice.invoice_id', '=', 'invoices.id')
                    ->join('shops', 'shops.id', '=', 'invoices.shop_id')
                    ->join('users','users.id','=','invoices.user_id')
                    ->select(
                        'invoices.id',
                        'number',
                        'date',
                        'total',
                        DB::raw('(total - invoices.cash - invoices.cheque) as pending_amount'),
                        DB::raw('sum(article_invoice.sale_qty) as item_count'),
                        'cheque_date',
                        'deliver_date',
                        'closed',
                        'pending',
                        'comment',
                        'shops.name as shop_name',
                        'shops.city as city',
                        'users.name as user_name'
                    )
                    
                    ->when($full_range, function ($query) use ($request) {
                        return $query->whereBetween('date', [$request->start_date, $request->end_date]);
                    })
                    ->groupBy('invoices.id')
                    ->when($full_range, function ($query) { return $query;}, function ($query) use ($request) {
                        return $query->orderBy('date', 'desc')->limit(500);
                    })
                    ->get();
           // dd($data);    
        return view('/deliver_pending',compact('data','start_date','end_date'));
    }
}

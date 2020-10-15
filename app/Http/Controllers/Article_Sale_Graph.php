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


class Article_Sale_Graph extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }
    public function view(){

        $date =  \Carbon\Carbon::now();
        $printmonth = date("F-Y", strtotime($date));
       $startDayofMonth =   \Carbon\Carbon::parse($date)->startOfMonth()->toDateString();
       $lastDayofMonth =    \Carbon\Carbon::parse($date)->endOfMonth()->toDateString();
       $stdate = new DateTime($startDayofMonth);
       $datetime2 = new DateTime($lastDayofMonth);
       $ltdate = $stdate->diff($datetime2);
       $days = ((int)$ltdate->format('%a'))+1;
       $x_axis = array();
       
       for( $i = 1 ; $i<=$days; $i++){
           $x_axis[] = $i;
       }

       $data = DB::table('article_invoice as ai')
                ->join('invoices as a','ai.invoice_id','=','a.id')
                ->whereDate('a.date','>=',$startDayofMonth )
                ->whereDate('a.date','<=',$lastDayofMonth )
                ->select(DB::raw('DAY(a.date) as day'),DB::raw('SUM(ai.sale_qty) as total_qty'))    
                ->groupBy('a.date')
                ->orderBy('a.date')
                ->get();
    
      
       $y_axis = array();
       $val = -1;
       $key = -1;
       for( $i = 0 ; $i<$days; $i++){
            
            if(isset($data[$i]->day)){
                        $val = $data[$i]->day;
                        $key = $i;
                }
          if($val == $i+1){ 
            
            $y_axis[] = $data[$key]->total_qty;
               
           }
           else{
                $y_axis[] = 0;
           }
       }
   
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        
        return view('/month_artical_sales_graph',compact('category','artical','x_axis','y_axis','printmonth'));
    }

    public function show_graph(Request $req){
       
        $date = $req->date;
        $printmonth = date("F-Y", strtotime($date));
        $artical_id = $req->articalID;
        $category_id = $req->categoryID;
       
       $startDayofMonth =   \Carbon\Carbon::parse($date)->startOfMonth()->toDateString();
       $lastDayofMonth =    \Carbon\Carbon::parse($date)->endOfMonth()->toDateString();
       $stdate = new DateTime($startDayofMonth);
       $datetime2 = new DateTime($lastDayofMonth);
       $ltdate = $stdate->diff($datetime2);
       $days = ((int)$ltdate->format('%a'))+1;
       $x_axis = array();
        
       for( $i = 1 ; $i<=$days; $i++){
           $x_axis[] = $i;
       }

       $data = DB::table('article_invoice as ai')
                ->join('invoices as a','ai.invoice_id','=','a.id')
                ->where('ai.article_id','=',$artical_id)
                ->whereDate('a.date','>=',$startDayofMonth )
                ->whereDate('a.date','<=',$lastDayofMonth )
                ->select(DB::raw('DAY(a.date) as day'),DB::raw('SUM(ai.sale_qty) as total_qty'))    
                ->groupBy('a.date')
                ->orderBy('a.date')
                ->get();
    
      
       $y_axis = array();
       $val = -1;
       $key = -1;
       for( $i = 0 ; $i<$days; $i++){
            
            if(isset($data[$i]->day)){
                        $val = $data[$i]->day;
                        $key = $i;
                }
          if($val == $i+1){ 
            
            $y_axis[] = $data[$key]->total_qty;
               
           }
           else{
                $y_axis[] = 0;
           }
       }
   
    $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
    $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');

     return view('/month_artical_sales_graph',compact('category','artical','x_axis','y_axis','printmonth'));

    }


    public function view_year(){

        $date =  \Carbon\Carbon::now();    
        $year =  date("Y", strtotime($date));
        $printmonth = date("Y", strtotime($date));
       
       $startDayofYear =   \Carbon\Carbon::parse($date)->startOfYear()->toDateString();
       $lastDayofYear =    \Carbon\Carbon::parse($date)->endOfYear()->toDateString();
  
      
       $data = DB::table('article_invoice as ai')
                ->join('invoices as a','ai.invoice_id','=','a.id')
                ->whereDate('a.date','>=',$startDayofYear )
                ->whereDate('a.date','<=',$lastDayofYear )
                ->select(DB::raw('Month(a.date) as month'),DB::raw('SUM(ai.sale_qty) as total_qty'))    
                ->groupBy('month')           
                ->get();
    
       $y_axis = array();
       $mon = 12;
       $val = -1;
       $key = -1;
       for( $i = 0 ; $i<$mon; $i++){
            
            if(isset($data[$i]->month)){
                        $val = $data[$i]->month;
                        $key = $i;
                }
          if($val == $i+1){ 
            
            $y_axis[] = $data[$key]->total_qty;
               
           }
           else{
                $y_axis[] = 0;
           }
       }
   
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');
        
        return view('/year_artical_sale_graph',compact('category','artical','y_axis','printmonth'));
    }

    public function show_graph_year(Request $req){
       
        $date = $req->date;
        $printmonth = date("Y", strtotime($date));
        $year =  date("Y", strtotime($date));
        $artical_id = $req->articalID;
        $category_id = $req->categoryID;
       
       $startDayofYear =   \Carbon\Carbon::parse($date)->startOfYear()->toDateString();
       $lastDayofYear =    \Carbon\Carbon::parse($date)->endOfYear()->toDateString();
  
      
       $data = DB::table('article_invoice as ai')
                ->join('invoices as a','ai.invoice_id','=','a.id')
                ->where('ai.article_id','=',$artical_id)
                ->whereDate('a.date','>=',$startDayofYear )
                ->whereDate('a.date','<=',$lastDayofYear )
                ->select(DB::raw('Month(a.date) as month'),DB::raw('SUM(ai.sale_qty) as total_qty'))    
                ->groupBy('month')           
                ->get();
    
       $y_axis = array();
       $mon = 12;
       $val = -1;
       $key = -1;
       for( $i = 0 ; $i<$mon; $i++){
            
            if(isset($data[$i]->month)){
                        $val = $data[$i]->month;
                        $key = $i;
                }
          if($val == $i+1){ 
            
            $y_axis[] = $data[$key]->total_qty;
               
           }
           else{
                $y_axis[] = 0;
           }
       }
   
        $category  = ArticleCategory::where('isActive',true)->orderBy('name')->get()->unique('name');
        $artical  = Article::where('isActive',true)->orderBy('name')->get()->unique('name');

     return view('/year_artical_sale_graph',compact('category','artical','y_axis','printmonth'));

    }

}

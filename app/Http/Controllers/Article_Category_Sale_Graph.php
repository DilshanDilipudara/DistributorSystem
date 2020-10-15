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
use stdClass;

class Article_Category_Sale_Graph extends Controller
{
    public function month_view(){

       $date =  \Carbon\Carbon::now();
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
    
         $artical_category =  ArticleCategory::all();
         //dd(  $artical_category );
         $obj[] = new stdClass;       
         foreach($artical_category as $val){

            $arr  = array();
            $data =  DB::table('article_invoice as ai')
                        ->join('invoices as i','ai.invoice_id','=','i.id')
                        ->join('articles as a','ai.article_id','=','a.id')
                        ->join('article_categories as ac','ac.id','=','a.article_category_id')
                        ->where('ac.id',$val->id)
                        ->whereDate('i.date','>=',$startDayofMonth )
                        ->whereDate('i.date','<=',$lastDayofMonth )
                        ->select(DB::raw('DAY(i.date) as day'),DB::raw('SUM(ai.sale_qty) as total_qty'))    
                        ->groupBy('i.date')
                        ->orderBy('i.date')
                        ->get();
            //dd($data);
            $y_axis = array();
            $value = -1;
            $key = -1;
            for($i = 0;$i < $days ;$i++){
               
                if(isset($data[$i]->day)){
                        $value = $data[$i]->day;
                        $key = $i;
                 }
                if($value == $i+1){ 
                    
                     $y_axis[] = $data[$key]->total_qty;
                    
                }
                else{
                     $y_axis[] = 0;
                }
            }
            $obj[$val->id] = $y_axis;  
         }
         //dd($data);
         unset($obj[0]) ;
         //dd($obj);
        return view ('/month_artical_category_graph',compact('obj','x_axis','artical_category'));
    }
    public function month_show_graph(Request $req){
       
       $date = $req->date;
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
    
         $artical_category =  ArticleCategory::all();
         //dd(  $artical_category );
         $obj[] = new stdClass;       
         foreach($artical_category as $val){

            $arr  = array();
            $data =  DB::table('article_invoice as ai')
                        ->join('invoices as i','ai.invoice_id','=','i.id')
                        ->join('articles as a','ai.article_id','=','a.id')
                        ->join('article_categories as ac','ac.id','=','a.article_category_id')
                        ->where('ac.id',$val->id)
                        ->whereDate('i.date','>=',$startDayofMonth )
                        ->whereDate('i.date','<=',$lastDayofMonth )
                        ->select(DB::raw('DAY(i.date) as day'),DB::raw('SUM(ai.sale_qty) as total_qty'))    
                        ->groupBy('i.date')
                        ->orderBy('i.date')
                        ->get();
            //dd($data);
            $y_axis = array();
            $value = -1;
            $key = -1;
            for($i = 0;$i < $days ;$i++){
               
                if(isset($data[$i]->day)){
                        $value = $data[$i]->day;
                        $key = $i;
                 }
                if($value == $i+1){ 
                    
                     $y_axis[] = $data[$key]->total_qty;
                    
                }
                else{
                     $y_axis[] = 0;
                }
            }
            $obj[$val->id] = $y_axis;  
         }
         //dd($data);
         unset($obj[0]) ;
         //dd($obj);

         return view ('/month_artical_category_graph',compact('obj','x_axis','artical_category'));
    }
}

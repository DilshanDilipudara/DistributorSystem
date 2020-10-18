<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Invoice;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPoolData(Request $request) {
        $full_range = ($request->minDate && $request->maxDate);

        $shops = DB::table('invoices')
            ->join('article_invoice', 'article_invoice.invoice_id', '=', 'invoices.id')
            ->join('shops', 'shops.id', '=', 'invoices.shop_id')
            ->select(
                'invoices.id',
                'number',
                'date',
                'total',
                DB::raw('(total - invoices.cash - invoices.cheque) as pending_amount'),
                DB::raw('sum(article_invoice.sale_qty) as item_count'),
                'closed',
                'pending',
                'comment',
                'shops.name as shop_name'
            )
            ->where('invoices.user_id', auth()->user()->id)
            ->when($full_range, function ($query) use ($request) {
                return $query->whereBetween('date', [$request->minDate, $request->maxDate]);
            })
            ->groupBy('invoices.id')
            ->when($full_range, function ($query) { return $query;}, function ($query) use ($request) {
                return $query->orderBy('date', 'desc')->limit(100);
            })
            ->get();
        return $shops;
    }

    public function showView()
    {
        $shops = Shop::select('id', 'name', 'cash', 'credit', 'cheque')->where([
            ['isActive', 1],
            ['approved', 1]
        ])->get();
        $prod_cat = ArticleCategory::select('id', 'name')->where('isActive', '1')->get();

        return view('ui-sec-2/add-new-sale', compact('shops', 'prod_cat'));
    }

    public function addNewSale(Request $request) {
//        dd($request);
        $inv = new Invoice;
        $inv->number = $request->invNum;
        $inv->date = $request->invDate;
        $shop =  json_decode($request->shop);
        $inv->shop_id =  $shop->id;
        $inv->user_id = auth()->user()->id;
        $inv->total = $request->total;
        $inv->discount = $request->discount;
        $inv->deliver_date = $request->deliverDate;
        $inv->cash = $request->cashTaken ? $request->cashAmount : 0.0;
        $inv->cheque = $request->chequeTaken ? $request->chequeAmount : 0.0;
        $inv->cheque_date = $request->chequeDate;
        $inv->credit = $request->creditTaken ? 1 : 0;
        $inv->comment = $request->comments;
        $inv->pending = 1;
        $inv->closed = 0;
        $inv->save();

        $articles = [];
        $artIDs = $request->artID;
        for ($i = 0; $i < count($artIDs); $i++) {
            $articles[$artIDs[$i]] = [
                'unit_price' => $request->unitPrice[$i],
                'sale_qty' => $request->saleQt[$i],
                'discount' => $request->discounts[$i],
                'free_offer' => $request->freeOffer[$i]
            ];
        }

        $inv->articles()->attach($articles);

        return redirect()->route('view-new-sale');
    }
}

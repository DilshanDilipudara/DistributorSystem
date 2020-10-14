<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Invoice;
use App\Shop;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shops = Shop::select('id', 'name', 'cash', 'credit', 'cheque')->where([
            ['isActive', 1],
            ['approved', 1]
        ])->get();
        $prod_cat = ArticleCategory::select('id', 'name')->where('isActive', '1')->get();

        return view('ui-sec-2/add-new-sale', compact('shops', 'prod_cat'));
    }

    public function addNewSale(Request $request) {
        //dd($request);
        $inv = new Invoice;
        $inv->number = $request->invNum;
        $inv->date = $request->invDate;
        $inv->shop_id = $request->shop->id;
        $inv->user_id = auth()->user()->id;
        $inv->total = $request->total;
        $inv->discount = $request->discount;
        $inv->deliver_date = $request->deliverDate;
        $inv->cash = $request->cashTaken ? $request->cashAmount : 0.0;
        $inv->cheque = $request->chequeTaken ? $request->chequeAmount : 0.0;
        $inv->cheque_date = $request->chequeDate;
        $inv->credit = $request->creditTaken ? 1 : 0;
        $inv->comment = $request->comments;
        $inv->pending = "1";
        $inv->closed = "0";
        $inv->save();

        $articles = [];
        $artIDs = $request->artID;
        for ($i = 0; $i < count($artIDs); $i++) {
            $articles[$artIDs[$i]] = [
                'unit_price' => $request->unitPrice[$i],
                'sale_qty' => $request->saleQt[$i],
                'discount' => $request->discount[$i],
                'free_offer' => $request->freeOffer[$i]
            ];
        }

        $inv->articles()->attach($articles);

        return redirect()->route('view-new-sale');
    }
}

<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Invoice;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPoolData(Request $request)
    {
        $full_range = ($request->minDate && $request->maxDate);

        $invoices = DB::table('invoices')
            ->join('article_invoice', 'article_invoice.invoice_id', '=', 'invoices.id')
            ->join('shops', 'shops.id', '=', 'invoices.shop_id')
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
                'shops.name as shop_name'
            )
            ->where('invoices.user_id', auth()->user()->id)
            ->when($full_range, function ($query) use ($request) {
                return $query->whereBetween('date', [$request->minDate, $request->maxDate]);
            })
            ->groupBy('invoices.id')
            ->when($full_range, function ($query) {
                return $query;
            }, function ($query) use ($request) {
                return $query->orderBy('date', 'desc')->limit(100);
            })
            ->get();
        return $invoices;
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

    public function addNewSale(Request $request)
    {
//        dd($request);
        $inv = new Invoice;
        $inv->number = $request->invNum;
        $inv->date = $request->invDate;
        $shop = json_decode($request->shop);
        $inv->shop_id = $shop->id;
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

        if(!$request->creditTaken){
            $inv->closed = 1;
        } else {
            $inv->closed = 0;
        }

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


    public function showToBeCollected(Request $request)
    {
        $invoices =  $this->getToBeCollected($request->minDate, $request->maxDate, $request->invoiceNumber);

        return response()->view('ui-sec-2.to-be-collected', compact('invoices'));
    }

    public function getFilteredToBeCollected(Request $request) {
        $invoices = $this->getToBeCollected($request->minDate, $request->maxDate, $request->invoiceNumber);

        return response()->view('ui-sec-2.to-be-collected-filtered', compact('invoices'));

    }

    public function update(Request $request, Invoice $invoice) {
        if($request->cashTaken) {
            $invoice->cash = $invoice->cash + $request->amount;
        }
        elseif ($request->chequeTaken){
            $invoice->cheque = $invoice->cheque + $request->amount;
        }

        if($invoice->total <= $invoice->cash + $invoice->cheque) {
            $invoice->closed = 1;
        }

        $invoice->save();

        return redirect()->route('view-to-be-collected');
    }


    public function getToBeCollected($minDate, $maxDate, $invoice_number)
    {
        $full_range = ($minDate && $maxDate);
        $user = auth()->user();

        $invoices = DB::table('invoices')
            ->join('article_invoice', 'article_invoice.invoice_id', '=', 'invoices.id')
            ->join('shops', 'shops.id', '=', 'invoices.shop_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->select(
                'invoices.id',
                'number',
                'date',
                'total',
                DB::raw('(total - invoices.cash - invoices.cheque) as pending_amount'),
                DB::raw('sum(article_invoice.sale_qty) as item_count'),
                'cheque_date',
                'closed',
                'pending',
                'comment',
                'shops.cash as cash_allowed',
                'shops.cheque as cheque_allowed',
                'shops.name as shop_name',
                'users.name as sales_by'
            )
            ->where('invoices.closed', 0)
            ->when( ($user->role === 'admin' || $user->role === 'manager'), function ($query) {
                return $query;
            }, function ($query) use ($user) {
                return $query->where('invoices.user_id', $user->id);
            })
            ->when($invoice_number, function ($query) use ($invoice_number) {
                $query->where( 'invoices.number', $invoice_number);
            })
            ->when($full_range, function ($query) use ($minDate, $maxDate) {
                return $query->whereBetween('date', [$minDate, $maxDate]);
            }, function ($query) use ($minDate, $maxDate) {
                if($minDate) return $query->where('date', '>=', $minDate);
                elseif($maxDate) return $query->where('date', '<=', $maxDate);
            })
            ->groupBy('invoices.id')
            ->when($full_range, function ($query) {
                return $query;
            }, function ($query) {
                return $query->orderBy('date', 'desc')->limit(100);
            })
            ->get();
        return $invoices;
    }

}

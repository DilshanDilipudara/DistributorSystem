<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Shop::where([
            ['approved', '=',  1],
            ['isActive', '=', 1]
        ])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function getReviewShops()
    {
        $shops =  Shop::where([
            ['approved', '=',  0],
            ['isActive', '=', 0]
        ])->get();

        return view('ui-sec-2.review-shop', compact('shops'));
    }

    public function approveShop(Request $request) {
//        dd($request);
        $shop_id = $request->shopID;
        $appr = 'approval_' . $shop_id;
        $approval = $request->$appr;

        $shop = Shop::find($shop_id);
        $shop->approved = $approval;
        $shop->save();
        return redirect()->route('view-review-shops');

    }
}

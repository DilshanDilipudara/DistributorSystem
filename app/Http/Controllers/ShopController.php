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
     * @param \App\Shop $shop
     * @return \Illuminate\View\View
     */
    public function edit(Shop $shop)
    {
        return view('ui-sec-2.shop-profile', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->name = $request->name;
        $shop->owner_name = $request->ownerName;
        $shop->civil_status = $request->status;
        $shop->nic = $request->nic;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->city = $request->city;
        $shop->tel_mobile = $request->mobile;
        $shop->tel_business = $request->mobBis;
        $shop->business_id_num = $request->businessID;
        $shop->isActive = $request->activeState;


        if( request('owner_image')) {
            $ownerImagePath = request('owner_image')->store('shop_profile');
            $shop->photo = $ownerImagePath;
        }
        if( request('shop_image') ) {
            $shopImagePath = request('shop_image')->store('shop_profile');
            $shop->owner_photo = $shopImagePath;
        }

        $shop->save();

        return redirect()->route('add-new-sale');
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

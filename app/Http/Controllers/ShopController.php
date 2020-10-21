<?php

namespace App\Http\Controllers;

use App\Shop;
use http\Env\Response;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $shops =  Shop::where('approved', '<>',  1)
            ->orWhere('isActive', '<>', 0)
            ->get();

        return $shops;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('ui-sec-2.shop-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
//        dd($request);
        $shop = new Shop;
        $shop->name = $request->name;
        $shop->user_id = auth()->user()->id;
        $shop->owner_name = $request->ownerName;
        $shop->civil_status = $request->status;
        $shop->nic = $request->nic;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->city = $request->city;
        $shop->tel_mobile = $request->mobile;
        $shop->tel_business = $request->mobBis;
        $shop->business_id_num = $request->businessID;
        $shop->cash = $request->cashAllowed ? 1 : 0 ;
        $shop->cheque = $request->chequeAllowed ? 1 : 0;
        $shop->credit = $request->creditAllowed ? 1 : 0;
        $shop->isActive = 0;


        if( request('owner_image')) {
            $ownerImagePath = request('owner_image')->store('shop_profile');
            $shop->photo = $ownerImagePath;
        }
        if( request('shop_image') ) {
            $shopImagePath = request('shop_image')->store('shop_profile');
            $shop->owner_photo = $shopImagePath;
        }

        $shop->save();

        return redirect()->route('shops.create');

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
     * @param \Illuminate\Http\Request $request
     * @param \App\Shop $shop
     * @return \Illuminate\Http\RedirectResponse
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
        $shop->cash = $request->cashAllowed ? 1 : 0 ;
        $shop->cheque = $request->chequeAllowed ? 1 : 0;
        $shop->credit = $request->creditAllowed ? 1 : 0;
        $shop->isActive = $request->activeState ? 1 : 0;


        if( request('owner_image')) {
            $ownerImagePath = request('owner_image')->store('shop_profile');
            $shop->photo = $ownerImagePath;
        }
        if( request('shop_image') ) {
            $shopImagePath = request('shop_image')->store('shop_profile');
            $shop->owner_photo = $shopImagePath;
        }

        $shop->save();

        return redirect()->route('shops.create');
    }

    public function submit(Shop $shop) {
        $shop->isActive = 1;
        $shop->save();

        return redirect()->route('shops.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     */
    public function destroy(Shop $shop)
    {
        if($shop->approved) {
            $shop->isActive = 0;
            $shop->save();
        }
        else {
            try {
                $shop->delete();
            }
            catch (\Exception $e) {
                return \response($e->getMessage(), 500);
            }
        }

        return redirect()->route('shops.create');
    }

    public function getShopsToReview()
    {
        $shops =  Shop::where([
            ['approved', '=',  0],
            ['isActive', '=', 1]
        ])->get();

        return view('ui-sec-2.review-shop', compact('shops'));
    }

    public function approve(Request $request, Shop $shop) {
//        dd($request);

        $appr = 'approval_' . $shop->id;
        $approval = $request->$appr;

        if($approval == '0') {
            $shop->isActive = 0;
        }
        else {
            $shop->approved = $approval;
        }

        $shop->save();

        return redirect()->route('view-review-shops');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\store;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $store=store::paginate(20);

        $search=$request['search'];

        if($request['search']!=null) {
            $items = store::where('name', 'like', '%' . $search . '%')
                ->orderBy('name')
                ->paginate(20);
            $store = $items;
        }


        return view('market.market',compact('store'));

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
     * ItemAdded a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        market::create([
            'user_name' => $request->user_name,
            'user_address' => $request->user_address,
            'phone' => $request->Phone,
            'item_id' => $request->id,
        ]);
        session()->flash('Add', 'Order Added');


        return redirect('/market');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        //
    }
}

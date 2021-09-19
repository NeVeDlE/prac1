<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\Orders;
use App\Models\OrdersArchive;
use Illuminate\Http\Request;

class OrdersArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $market=Orders::onlyTrashed()->paginate(20);
        return view('orders.archive_orders',compact('market'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdersArchive  $ordersArchive
     * @return \Illuminate\Http\Response
     */
    public function show(OrdersArchive $ordersArchive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdersArchive  $ordersArchive
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdersArchive $ordersArchive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdersArchive  $ordersArchive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $flight = Orders::withTrashed()->where('id', $id)->restore();
        session()->flash('restore');
        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdersArchive  $ordersArchive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
       $item=Orders::withTrashed()->where('id',$request->id)->first();
       $item->forceDelete();
        session()->flash('delete');
        return redirect('/archive');
    }
}

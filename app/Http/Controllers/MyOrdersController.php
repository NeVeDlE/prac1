<?php

namespace App\Http\Controllers;

use App\Models\myOrders;
use App\Models\Orders;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MyOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $store = Orders::where('user_id', Auth::user()->id)->paginate(20);
        return view('user.myorders', compact('store'));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\myOrders $myOrders
     * @return \Illuminate\Http\Response
     */
    public function show(myOrders $myOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\myOrders $myOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(myOrders $myOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\myOrders $myOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, myOrders $myOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\myOrders $myOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $item = Orders::where('id', $request->id);

        $item->update([
            'status'=>'3',

        ]);
        $user = User::where('role','user')->get();

        $added =Orders::where('id', $request->id)->get()->first();

        Notification::send($user, new \App\Notifications\OrderCancelled($added));
        return back();
    }
}

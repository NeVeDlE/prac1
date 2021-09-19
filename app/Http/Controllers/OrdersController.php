<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Market;
use Illuminate\Support\Facades\Notification;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $market = Orders::paginate(20);
        return view('orders.orders', compact('market'));
        //
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

        $user = User::find($request->user_id);

        Orders::create([
            'name' => $user->name,
            'user_id'=>$user->id,
            'address' => $user->address,
            'phone' => $user->phone,
            'email' => $user->email,
            'role' => $user->role,
            'status' => '2',
            'item_price' => $request->price,
            'item_name' => $request->name,
            'item_id' => $request->id,
        ]);
        session()->flash('Add', 'Order Added');
        $old=$user;
        $user = User::where('id',$old->user_id)->orWhere('role','user')->get();

        $added = Orders ::latest()->first();
        Notification::send($user, new \App\Notifications\TaskComplete($added));
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Orders::where('id', $id)->first();
        return view('orders.status_update', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Orders::where('id', $id)->first();
        return view('orders.edit_order', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $order = Orders::find($request->id);
        $order->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'item_price' => $request->item_price,
            'item_name' => $request->item_name,

        ]);
        session()->flash('Add', 'Order Updated');
        return redirect('/orders');
    }

    public function status_update(Request $request)
    {
        //
        $status = Orders::find($request->id);


        $status->update([
            'status' => $request->Status,

        ]);
        return redirect('/orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        $item = Orders::where('id', $id)->first();

        if ($request->type == '2') {

            $item->delete();
            session()->flash('archive');
        } else {

            $item->forceDelete();
            session()->flash('delete');
        }

        session()->flash('archive');
        return redirect('/orders');
    }

    public function success()
    {
        $market = Orders::where('status', 1)->paginate(20);
        return view('orders.successful_orders', compact('market'));
    }

    public function pending()
    {
        $market = Orders::where('status', 2)->paginate(20);
        return view('orders.pending_orders', compact('market'));
    }

    public function cancel()
    {
        $market = Orders::where('status', 3)->paginate(20);
        return view('orders.cancel_orders', compact('market'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class Orders_Report extends Controller
{
    //
    public function index()
    {
        return view('reports.orders_report');
    }

    public function Search(Request $request)
    {
        if ($request->rdio == 1) {
            if ($request->type && $request->start_at == '' && $request->end_at == '') {

                $market = Orders::select('*')->where('Status', '=', $request->type)->get();
                $type = $request->type;
                return view('reports.orders_report', compact('type'))->withDetails($market);
            } else {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;

                $market = Orders::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
                return view('reports.invoices_report',compact('type','start_at','end_at'))->withDetails($market);
            }
        }
        else{
            $market = Orders::select('*')->where('id','=',$request->id3)->get();
            return view('reports.orders_report')->withDetails($market);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Images;
use Image;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store=store::paginate(20);

        return view('store.store',compact('store'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     //  $path = $request->file('file')->store('public/images');

         $ex= $request->file->getClientOriginalExtension();
         $img_name=time().'.'.$ex;
        $request->file->move(public_path('images'), $img_name);
                store::create([
                    'name' => $request->name,
                    'size' => $request->size,
                    'description' => $request->description,
                    "file_path" => $img_name,
                ]);
        session()->flash('Add', 'T-Shirt Added');

        return redirect('/store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $old=store::find($request['id']);
        $bol=0;

        if($old['file_path']==$request['file']||$request['file']==null)$bol=0;
        else $bol++;


        $img_name=$old['file_path'];

       if($bol>0){
            $ex= $request->file->getClientOriginalExtension();
            $img_name=time().'.'.$ex;
            $request->file->move(public_path('images'), $img_name);
        }

        $old->update([
            'name' => $request->name,
            'size' => $request->size,
            'description' => $request->description,
            "file_path" => $img_name,
        ]);
        session()->flash('Edit', 'T-Shirt Edited');
        $store=store::all();
        return redirect('/store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        store::find($id)->delete();
        session()->flash('delete','T-Shirt Deleted');
        return redirect('/store');

    }
}

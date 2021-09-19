<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.user');
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name,' . $request->id,

            'email' => 'required|email|unique:users,email,'.$request->id,
        ], [
            'name.required' => 'Name is required',
            'email.unique'=>'cant have 2 accounts with same email',

        ]);
        $old=User::find($request['id']);
        $bol=0;

        if($old['file_path']==$request['file']||$request['file']==null)$bol=0;
        else $bol++;


        $img_name=$old['file_path'];

        if($bol>0){
            $ex= $request->file->getClientOriginalExtension();
            $img_name=time().'.'.$ex;
            $request->file->move(public_path('User_Photos'), $img_name);
        }

        $old->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            "file_path" => $img_name,
        ]);
        session()->flash('Edit', 'Profile Edited');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserAdminController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.EditUser')->with('user', $user);
        // dd('SHOW');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user-> name = $request->name;
        $user-> first_name = $request->first_name;
        $user-> middle_name = $request->middle_name;
        $user-> last_name = $request->last_name;
        $user-> email = $request['email'];
        $user-> provinces = $request['provinces'];
        $user-> date_of_birth = $request->date_of_birth;

        $user->save();
        return redirect('/admin/users')->with('success','User Credentials Updated');
        // dd($request);
    }


}

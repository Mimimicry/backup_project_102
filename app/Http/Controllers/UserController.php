<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    //Controlls all the user profile functions

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $users = User::find(Auth::user()->id);
                if($users){
                
                return view ('users.profile')->withUser($users);
                }else{
                    return redirect()->back();
                }
    }else{
        return redirect()->back();
    }

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(Auth::user()){
                $users = User::find(Auth::user()->id);
                    if($users){
                    return view('users.edituser')->withUser($users);
                    }else{
                        return redirect()->back();
                    }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user){
            
            $user-> name = $request['name'];
            $user-> email = $request['email'];
            $user-> provinces = $request['provinces'];
            $user-> first_name = $request['first_name'];
            $user-> middle_name = $request['middle_name'];
            $user-> last_name = $request['last_name'];
            $user-> date_of_birth = $request['date_of_birth'];

            $user->save();
            return redirect('/profile');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy($id)
    {
        // $user = User::findOrFail($id);
        // $user->delete();
        // return redirect('/users')->with('success','User Deleted');
    }

    public function showUsers(){
        $users = User::paginate(10);   
        return view('users.users', compact('users'));
    }

    public function viewUsers($id){
        $users = User::findOrFail($id);
        return view('users.viewuser', compact('users'));
    } 
}

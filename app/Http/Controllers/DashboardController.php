<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class DashboardController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    //Where the User goes after Log-in
    public function index()
    {
        $user_id= auth()->user()->id;
        $user = User::find($user_id); 
        return view('Dashboard')->with('posts', $user->posts);
    }
}

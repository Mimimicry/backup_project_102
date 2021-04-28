<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    //For the Home, About, and Service Pages
    //Currently no functionality in these pages

    public function index(){
        
        if(Auth::user()->hasAnyRole('admin')){
            return view('pages.admin');
       }elseif(Auth::user()->hasAnyRole('author')){
            return view('pages.author');
       }elseif(Auth::user()->hasAnyRole('user')){
        return view('pages.user');
       }elseif(Auth::user()){
           return view('pages.index');
       }
    }
    
    
    
}

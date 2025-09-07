<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function login()
    {
        if(Auth::check())
        {
            if(Auth::user()->user_type=="user")
            {
                return view('user.main');
            }
            else if(Auth::user()->user_type=="admin")
            {
                return view('backend.main');
            }
        }
    }
}

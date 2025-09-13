<?php

namespace App\Http\Controllers;

use App\Models\addtoCart;
use App\Models\productList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{
    public function cart($id)
    {
        $product=productList::find($id);
        $product_cart=new addtoCart();
        $product_cart->user_id=Auth::id();
        $product_cart->product_id=$product->id;
        $product_cart->save();
        return redirect()->back();
        

        
    }
    public function cartlists()
    {
        if(Auth::check())
        {
            $cart=addtoCart::where('user_id',Auth::id())->get();
            return view('user.list',compact('cart'));
        }
        return redirect()->route('login');
    }
    public function cartdelete($id)
    {
       addtoCart::destroy($id);
       return redirect()->back();
    }
}
